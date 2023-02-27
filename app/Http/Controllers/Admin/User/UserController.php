<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeUnit\FunctionUnit;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){

        return view('admin.users.create');
    }
    public function store(StoreRequest $request){

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']],$data);
        return redirect()->route('admin.user.index');
    }
    public function show(User $user){

        return view('admin.users.show',compact('user'));
        
    }
    public function edit(User $user){
        
        return view('admin.users.edit',compact('user'));

    }
    public function update(UpdateRequest $request,User $user){
       
        $data = $request->validated();
    
        $user->update($data);

        return view('admin.users.show',compact('user'));
    }
    public function delete(User $user){
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
