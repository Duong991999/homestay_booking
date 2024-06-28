<?php
namespace App\Repositories;

use App\File;
use App\Homestay;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
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
							'fileable_type' => Homestay::class,
							'fileable_id' => $id
						]);
						$files->push($upload);
					}
					$this->model->find($id)->files()->saveMany($files);
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
				if($attributes['category_id'] ?? false){
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

	public function findDetailRoom($id){
		$result = $this->model->with('categories', 'files', 'room_types.files')->find($id);
		return $result;
	}

	public function paginateSearch($attributes)
	{
		$name = $attributes['name'] ?? '';
		$categories = $attributes['categories'] ?? '';
		$address = $attributes['address'] ?? '';
		$rating = $attributes['rating'] ?? '';
		$minPrice = $attributes['min_price'] ?? null;
		$maxPrice = $attributes['max_price'] ?? null;
		$cityCode = $attributes['city_code'] ?? null;
		$districtCode = $attributes['district_code'] ?? null;
		$wardCode = $attributes['ward_code'] ?? null;
		$query = $this->model->query()->with(['categories:name', 'files']);
		if ($name) {
			$query = $query->where('name', 'LIKE', "%$name%");
		}
		if ($address) {
			$query = $query->where('address', 'LIKE', "%$address%");
		}
		if ($rating) {
			$query = $query->where('rating', '>=', $rating);
		}
		if ($cityCode) {
			$query = $query->where('city_code', '=', $cityCode);
		}
		if ($districtCode) {
			$query = $query->where('district_code', '=', $districtCode);
		}
		if ($wardCode) {
			$query = $query->where('ward_code', '=', $wardCode);
		}
		if ($minPrice && $maxPrice) {
			$query = $query->where(function ($que) use ($minPrice, $maxPrice) {
				return $que->where('min_price', '<=', $maxPrice)
				->where('max_price', '>=', $minPrice);
			});
		}
		if ($categories) {
			$query = $query->whereHas('categories', function($q) use ($categories){
				$q->whereIn('id', $categories);
			});
		}
		return $query->paginate(10)->appends(Request::query());
	}

	public function updatePriceToHomeStay($id){
		$data = $this->model->leftJoin('room_types', 'homestays.id', '=', 'room_types.homestay_id')
		->select(DB::raw('MIN(price) as min_price_value'), DB::raw('MAX(price) as max_price_value'))
		->groupBy('homestays.id')
		->find($id);
		$this->model->find($id)->update(['min_price' => $data['min_price_value'], 'max_price' => $data['max_price_value']]);
	}

}
