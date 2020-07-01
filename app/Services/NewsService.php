<?php

namespace App\Services;

use App\Models\News;

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
		return News::updateOrCreate(
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
		$query = News::query();
			if($orderBys) {
				$query->orderBy($orderBys['column'], $orderBys['sort']);
			}
		return News::paginate();
	}
	public function getListNews(){
		$query = Category::all()->toArray();
		return $query;
	}
	public function findById($id)
	{
		return News::find($id);
	}

	public function delete($ids = [])
	{
		return News::destroy($ids);
	}

}