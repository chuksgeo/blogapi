<?php

namespace App\Blogapi\Repository;

use App\Blogapi\Models\Comment;
use App\Blogapi\Repository\Contracts\CommentInterface;

class CommentRepository implements CommentInterface
{
    private $model;
    
    public function __construct(Comment $model)
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

}