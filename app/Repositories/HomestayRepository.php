<?php
namespace App\Repositories;

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

	public function create($attributes = [])
	{
		try {
			$result = DB::transaction(function() use($attributes){
				$data = $this->model->create($attributes);
				if($attributes['category_id']){
					$this->model->find($data['id'])->categories()->attach($attributes['category_id']);
				}
				return $this->find($data['id']);
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

	public function find($id){
		$result = $this->model->with('categories')->find($id);
		return $result;
	}
}
