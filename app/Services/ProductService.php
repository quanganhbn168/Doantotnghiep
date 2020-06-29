<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * param array $data
     * $data key: content, questionId: integer, correct: boolean
     * int $id | null
     */
    public function save(array $data, int $id = null)
    {
        return Product::updateOrCreate(           
            [
                'id' => $id
            ],
            [
                'name'	=>$data['name'],
		        'unit_id'	=>$data['unit_id'],
		        'quantity'	=>$data['quantity'],
		        'description'=>$data['description'],
		        'project_id'	=>$data['project_id']
            ]
        );
    }

    public function deleteByQuestion($projectId)
    {
        return Product::where('project_id', $projectId)->delete();
    }

    public function delete($ids = [])
    {
        return Product::destroy($ids);
    }

    public function getByProjectId($id){
        $query = Product::where('project_id',$id)->get();

        return $query;
    }
}