<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'posts_id'=> function(){
                return Post::all()->random();
            },
            'customer' =>$this->faker->name,
            'text'=>$this->faker->paragraph,
            'likes'=>$this->faker->numberBetween(0,5)
        ];
    }
}
