<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Blogapi\Repository\Contracts\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;
use App\Blogapi\Repository\Eloquent\CategoryRepository;

// use Illuminate\Http\Request;
// use App\Http\Requests\PostRequest;
// use App\Http\Requests\CategoryRequest;
// use App\Blogapi\Models\Category;
// use App\Http\Resources\CategoryResource;
// use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    private $categoryRepository;
  
   public function __construct(CategoryRepositoryInterface $categoryRepository)
   {
       $this->categoryRepository = $categoryRepository;
   }

   public function index()
   {
       $categories = $this->categoryRepository->all();
       
       return CategoryResource::collection($categories);     
   }
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         return categoryResource::collection(Category::get());
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(CategoryRequest $request)
//     {
//         $category = Category::create(['name' => $request->get('name')]);
        
//         return response()->json(['data' => new CategoryResource($category)], 200);
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Category  $category
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Category $category)
//     {
//         return response()->json(['data' => new CategoryResource($category)], 200);
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(CategoryRequest $request,Category $category)
//     {   
//         // $category = Category::findOrFail($id);
//         $category->update($request->all());
    
//         return response()->json(['data' => new CategoryResource($category)], 200);
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Category $category)
//     {
//         $category->delete();

//         return response()->json(['data' => null ], 200);
//     }
 }
