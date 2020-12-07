<?php

namespace App\Blogapi\Repository\Contracts;


use Illuminate\Database\Eloquent\Model;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface EloquentRepositoryInterface
{
   /**
     * Get all 
     * 
     * @method  GET api/model
     * @access  public
     */
    public function getAll() : Model;


   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
}
