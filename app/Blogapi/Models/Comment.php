<?php

namespace App\Blogapi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Blogapi\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer', 'text', 'likes', 'post_id'
    ];

    public function Posts(){

        return $this->belongsTo(Post::class);
        
    }
}
