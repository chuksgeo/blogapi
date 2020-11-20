<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

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
        'customer', 'text', 'likes', //'post_id'
    ];

    public function Posts(){

        return $this->belongsTo(Post::class);
        
    }
}
