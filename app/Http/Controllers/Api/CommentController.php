<?php

namespace App\Http\Controllers\Api;

use App\Blogapi\Repository\Contracts\CommentInterface;
use App\Blogapi\Repository\Contracts\PostInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentRepository;
    private $postRepository;

    public function __construct(CommentInterface $commentRepository, PostInterface $postRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->postRepository = $postRepository;
    }

    public function index($post)
    {
        $post = $this->postRepository->findByID($post);

        if ($post->comments->count() > 0){
            return CommentResource::collection($post->comments);
        }
        else{
            return response()->json(['data' => 'No Comment Yet'], 200,);
        }
                
    }

    public function show($post,$comment)
    {
        $post = $this->postRepository->findByID($post);

        return response()->json(['data' => new CommentResource($this->commentRepository->findByID($comment))], 200);
    }

    public function store($post, CommentRequest $request)
    {   
        return response()->json($this->commentRepository->create($request->all()), 200);
    }

    public function update($post, Request $request,$comment)
    {
        $post = $this->postRepository->findByID($post);

        $update = $this->commentRepository->update($request->all(), $comment);

        return response()->json(['data' => new CommentResource($this->commentRepository->findById($comment))], 200);       
    }

    public function destroy($post)
    {
        $post = $this->commentRepository->delete($post);
        
        return 'Deleted successfully';
    }
}
