<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Tests\Controller\Post;

class PostController extends Controller
{
    public $posts = [
        ['id' => 1 ,"title" => 'post01', 'description' => 'Animate Moview'],
        ['id' => 2 ,"title" => 'post02', 'description' => 'Chinese Moview'],
        ['id' => 3 ,"title" => 'post03', 'description' => 'Khmer Moview'],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post = new PostModel();
        return response() -> Json([
            "message" => "Request Successfully",
            "data" => $post::all(),
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)

    {
        //
        return response()->json([
 
            "message" =>  "Success",
            "data" => [
                "name"=> $request->name,
                "class" => $request->class
            ]
            ],200
            );
  
    }

    /**
     * Display the specified resource.
     */
    public function find(int $id)
    {
        //
        foreach($this->posts as $post) {

            if ($post["id"] == $id){
                return $post;
                
            }
        }
        return response()->json([
            "message" => ""
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post, $postModel)
    {
        //
            //
        return response()->json([
 
            "message" =>  "Success",
            "data" => [
                "title"=> $postModel->title,
                "description" => $postModel->description
            ]
            ],200
            );
  


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostModel $postModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostModel $postModel)
    {
        //
    }
}
