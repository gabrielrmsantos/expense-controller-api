<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        try {
            $this->authorize('viewAny', User::class);

            $users = User::all();

            return response()->json([
                'status' => true,
                'data' => $users
            ]);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $this->authorize('create', User::class);

            User::create([
                'is_admin' => $request->is_admin,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User created successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(User $user)
    {
        try {
            $this->authorize('view', $user);

            return response()->json([
                'status' => true,
                'data' => $user
            ], 200);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $this->authorize('update', $user);

            if($request->password) {
                $request->replace([
                    'password' => Hash::make($request->password)
                ]);
            }

            User::find($user->id)->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'User updated successfully'
            ], 200);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $this->authorize('delete', $user);

            User::find($user->id)->delete();

            return response()->json([
                'status' => true,
                'message' => 'User removed successfully'
            ], 200);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
