<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\RoomTypeRepositoryInterface;
use App\RoomType;
use App\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomTypeRepository extends BaseRepository implements RoomTypeRepositoryInterface
{
    public function getModel()
    {
        return RoomType::class;
    }

	public function createDetail($attributes = [])
	{
		try {
			$result = DB::transaction(function() use($attributes){
				$data = $this->model->create($attributes);
				if($attributes['files'] ?? false){
					$files = collect([]);
					foreach ($attributes['files'] as $file) {
						$name = "/roomtype" .'/'. uniqid() . '.' . $file->extension();
						$file->storePubliclyAs('public/assets', $name);
						$upload = File::make([
							'file_name' => $file->getClientOriginalName(),
							'file_path' => "/storage/assets$name",
							'fileable_type' => $this->getModel()
						]);
						$files->push($upload);
					}
					$this->model->find($data['id'])->files()->saveMany($files);
				}
				app(HomestayRepository::class)->updatePriceToHomeStay($data['homestay_id']);
				return $this->findDetail($data['id']);
			});
			return $result;
		} catch(QueryException $e){
			throw new HttpResponseException(
				response()->json([
					'success'   => false,
					'message'   => 'Query errors',
					'errors'    => $e->getMessage()
				], Response::HTTP_BAD_REQUEST)
			);
		}
	}

	public function updateDetail($id, $attributes = [])
	{
		try {
			$result = DB::transaction(function() use($attributes, $id){
				$this->model->find($id)->update($attributes);
				if($attributes['delete_file_id'] ?? false){
					File::destroy($attributes['delete_file_id']);
				}
				if($attributes['files'] ?? false){
					$files = collect([]);
					foreach ($attributes['files'] as $file) {
						$name = "/homestay" .'/'. uniqid() . '.' . $file->extension();
						$file->storePubliclyAs('public/assets', $name);
						$upload = File::make([
							'file_name' => $file->getClientOriginalName(),
							'file_path' => "/storage/assets$name",
							'fileable_type' => $this->getModel(),
							'fileable_id' => $id
						]);
						$files->push($upload);
					}
					$this->model->find($id)->files()->saveMany($files);
				}
				$data = $this->findDetail($id);
				app(HomestayRepository::class)->updatePriceToHomeStay($data['homestay_id']);
				return $data;
			});
			return $result;
		} catch(QueryException $e){
			throw new HttpResponseException(
				response()->json([
					'success'   => false,
					'message'   => 'Query errors',
					'errors'    => $e->getMessage()
				], Response::HTTP_BAD_REQUEST)
			);
		}
	}

	public function update($id, $attributes = [])
	{
		try {
			$result = DB::transaction(function() use($attributes, $id){
				$this->model->find($id)->update($attributes);
				if($attributes['category_id']){
					$this->model->find($id)->categories()->sync($attributes['category_id']);
				}

			});
			return $this->find($id);
		} catch(QueryException $e){
			throw new HttpResponseException(
				response()->json([
					'success'   => false,
					'message'   => 'Query errors',
					'errors'    => $e->getMessage()
				], Response::HTTP_BAD_REQUEST)
			);
		}
	}

	public function myRoomType($itemPerPage = 10){
		$myHomeStayId = Auth::user()->homestays()->first()->id ?? -1;
		return $this->model->where('homestay_id', $myHomeStayId)->paginate($itemPerPage);
	}

	public function findDetail($id){
		$result = $this->model->with('files')->find($id);
		return $result;
	}

}
