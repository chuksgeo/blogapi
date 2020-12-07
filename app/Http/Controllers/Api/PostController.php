<?php

namespace App\Http\Controllers\Api;

use App\Blogapi\Repository\Contracts\PostInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostInterface $postRepository)
    {
        $this->postRepository = $postRepository;    
    }


    public function index()
    {
        return PostCollection::collection($this->postRepository->all());   
    }

    public function show($post)
    {
        return response()->json(['data' => new PostResource($this->postRepository->findById($post))], 200);
    }

    public function store(PostRequest $request)
    {
        return response()->json($this->postRepository->create($request->all()), 200);
    }

    public function update(Request $request,$post)
    {       
        $update = $this->postRepository->update($request->all(), $post);

        return response()->json(['data' => new PostResource($this->postRepository->findById($post))], 200);   
    }
    
    public function destroy($post)
    {
      return  $this->postRepository->delete($post);
    }

}