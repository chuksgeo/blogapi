<?php

namespace App\Blogapi\Repository\Eloquent;

use App\Blogapi\Repository\Eloquent\BaseRepository;
use App\Blogapi\Models\Category;
use App\Blogapi\Repository\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $model;

   /**
    * UserRepository constructor.
    *
    * @param Category $model
    */
   public function __construct(Category $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }
}