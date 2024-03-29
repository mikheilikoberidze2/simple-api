<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests\UserStoreRequest;
use App\Http\Requests\UserRequests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return UserResource::collection($users);
    }
    public function show(User $user) {
        return new UserResource($user);
    }
    public function store (UserStoreRequest $request){
        $validatedData = $request->validated();
        User::create($validatedData);
        return response()->json('user created successfully', 201);
    }
    public function update(UserUpdateRequest $request, User $user){
        $validatedData = $request->validated();
        $user->update($validatedData);
        return response()->json('user updated successfully', 200);
    }
    public function destroy(User $user){
        $user->delete();
        return response()->json('user deleted successfully', 200);
    }
}
