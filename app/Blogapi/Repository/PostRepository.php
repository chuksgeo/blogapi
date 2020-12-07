<?php

namespace App\Blogapi\Repository;


use App\Blogapi\Models\Post;
use App\Blogapi\Repository\Contracts\PostInterface;

class PostRepository implements PostInterface
{
    private $model;
    
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function getModel()
    {
        return $this->model;
    }
}