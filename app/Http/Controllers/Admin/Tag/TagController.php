<?php

namespace App\Http\Controllers\Admin\tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class TagController extends Controller
{
    public function index(){

        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    public function create(){

        return view('admin.tags.create');
    }
    public function store(StoreRequest $request){

        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
    public function show(Tag $tag){

        return view('admin.tags.show',compact('tag'));
        
    }
    public function edit(Tag $tag){
        
        return view('admin.tags.edit',compact('tag'));

    }
    public function update(UpdateRequest $request,Tag $tag){

        $data =$request->validated();
        $tag->update($data);

        return view('admin.tags.show',compact('tag'));
    }
    public function delete(Tag $tag){
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
