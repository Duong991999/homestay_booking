<?php
namespace App\Repositories;

use App\File;
use App\Homestay;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class HomestayRepository extends BaseRepository implements HomestayRepositoryInterface
{
    public function getModel()
    {
        return Homestay::class;
    }

	public function createDetail($attributes = [])
	{
		try {
			$result = DB::transaction(function() use($attributes){
				$data = $this->model->create($attributes);
				if($attributes['category_id']){
					$this->model->find($data['id'])->categories()->attach($attributes['category_id']);
				}
				if($attributes['files'] ?? false){
					$files = collect([]);
					foreach ($attributes['files'] as $file) {
						$name = "/homestay" .'/'. uniqid() . '.' . $file->extension();
						$file->storePubliclyAs('public/assets', $name);
						$upload = File::make([
							'file_name' => $file->getClientOriginalName(),
							'file_path' => "/storage/assets$name",
							'fileable_type' => Homestay::class
						]);
						$files->push($upload);
					}
					$this->model->find($data['id'])->files()->saveMany($files);
				}
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
				if($attributes['category_id']){
					$this->model->find($id)->categories()->sync($attributes['category_id']);
				}
				if($attributes['delete_file_id']){
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
							'fileable_type' => Homestay::class,
							'fileable_id' => $id
						]);
						$files->push($upload);
					}
				}
				return $this->findDetail($id);
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

	public function findDetail($id){
		$result = $this->model->with('categories', 'files')->find($id);
		return $result;
	}
}
