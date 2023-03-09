<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeUnit\FunctionUnit;


class CategoryPostController extends Controller
{
    public function index(Category $category){

        $posts = $category->posts()->paginate(6);

        return view('category.post.index',compact('posts'));

    }


}


