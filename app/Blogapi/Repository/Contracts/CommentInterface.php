<?php

namespace App\Blogapi\Repository\Contracts;


interface CommentInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function findByID($id);

    public function delete($id);
}