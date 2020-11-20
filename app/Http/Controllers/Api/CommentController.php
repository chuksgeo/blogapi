<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        //
        if($post->comments->count() > 0){
            return CommentResource::collection($post->comments);
        }else{
            return response()->json(['data' => 'No Comment Yet'], 200,);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = Comment::create([
            'post_id'   => $request->get('post_id'),
            'customer'  => $request->get('customer'),
            'text'      => $request->get('text'),
            'likes'     => $request->get('like'),
        ]);
        return response()->json(['data' => new CommentResource($comment)], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,Comment $comment)
    {

        return response()->json(['data' =>  new CommentResource($comment)], 200);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post,Comment $comment)
    {
        $comment->update($request->all());
    
        return response()->json(['data' =>  new CommentResource($comment)], 200); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
