<?php
namespace App\Services;

use App\Models\Project;
class ProjectService 
{
	/**
	 * [save description]
	 * @param  array  $data [$data key: name]
	 * @param  [int] $id   [|null]
	 * @return [type]       [description]
	 */
	public function save(array $data, $id = null)
	{
		return Project::updateOrCreate(
			[
				'id'=> $id
			],
			[
				'name' => $data['name'],
				'timeStart'=>$data['timeStart'],
		        'timeEnd'=>$data['timeEnd'],
		        'category_id'=>$data['category_id'],
		        'tenderer_id'=>$data['tenderer_id']
			]
		);
	}

	public function getAll($orderBys = [],$limit = 10)
	{
		$query = Project::query();
			if($orderBys) {
				$query->orderBy($orderBys['column'], $orderBys['sort']);
			}
		return Project::paginate();
	}

	public function findById($id)
	{
		return Project::find($id);
	}

	public function delete($ids = [])
	{
		return Project::destroy($ids);
	}

	public function findContractor($id)
	{
		
		$query = Project::join('contractor_project','contractor_project.project_id','projects.id')
		->join('contractors','contractors.contractor_id','contractors.id')
		->where('contractor_project.project_id',$id)
		->select('contractors.name');
		return $query->get();
	}
}