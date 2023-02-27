<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        $roles = User::getRoles();
        return view('admin.users.create',compact('roles'));
    }
    public function store(StoreRequest $request){

        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make( $password );
       $user =  User::firstOrCreate(['email' => $data['email']],$data);
       event(new Registered($user));
        Mail::to($data['email'])->send(new PasswordMail($password));
        return redirect()->route('admin.user.index');
    }
    public function show(User $user){

        return view('admin.users.show',compact('user'));
        
    }
    public function edit(User $user){
        $roles = User::getRoles();
        return view('admin.users.edit',compact('user','roles'));

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
