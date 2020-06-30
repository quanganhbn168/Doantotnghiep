<?php

namespace App\Services;

use App\Models\Unit;

class NewsService 
{
	/**
	 * [save description]
	 * @param  array  $data [$data key: name]
	 * @param  [int] $id   [|null]
	 * @return [type]       [description]
	 */
	public function save(array $data, $id = null)
	{
		return Unit::updateOrCreate(
			[
				'id'=> $id
			],
			[
				'title' => $data['title'],
				'content' => $data['content']
				
			]
		);
	}
	public function getAll($orderBys = [],$limit = 10)
	{
		$query = Unit::query();
			if($orderBys) {
				$query->orderBy($orderBys['column'], $orderBys['sort']);
			}
		return Unit::paginate();
	}
	public function getListUnit(){
		$query = Category::all()->toArray();
		return $query;
	}
	public function findById($id)
	{
		return Unit::find($id);
	}

	public function delete($ids = [])
	{
		return Unit::destroy($ids);
	}

}