<?php
namespace App\Service;

use App\Models\Category;
class CategoryService 
{
	/**
	 * [save description]
	 * @param  array  $data [$data key: name]
	 * @param  [int] $id   [|null]
	 * @return [type]       [description]
	 */
	public function save(array $data, $id = null)
	{
		return Category::updateOrCreate(
			[
				'id'=> $id
			],
			[
				'name' => $data['name'],
			]
		);
	}

	public function getAll($orderBys = [],$limit = 10)
	{
		$query = Category::query();
			if($orderBys) {
				$query->orderBy($orderBys['column'], $orderBys['sort']);
			}
		return Category::paginate();
	}
	
	public function findById($id)
	{
		return Category::find($id);
	}

	public function delete($ids = [])
	{
		return Category::destroy($ids);
	}
}