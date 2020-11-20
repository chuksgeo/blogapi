<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    // protected $attributes = [
    //     'user_id' => null,
    // ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'summary', 'content', 'user_id'
    ];

        
    public function categories(){

        return $this->belongsToMany(Category::class)->withTimestamps();
        
    }

    public function comments() {

        return $this->hasMany(Comment::class);

    }
}
