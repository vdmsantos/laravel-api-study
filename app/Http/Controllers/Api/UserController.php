<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getAll()
    {
        try {
            return response()->json(
                [
                    'status' => 201,
                    'users' =>  User::orderBy('id', 'desc')->paginate(10),
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 404,
                    'error' => 'Users not found',
                    'message' => $e->getMessage(),
                ]
            );
        }
    }
    public function getById($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(
                    [
                        'status' => 404,
                        'error' => 'User not found',
                    ],
                    404
                );
            }
            return response()->json(
                [
                    'status' => 201,
                    'user' =>  $user,
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 404,
                    'error' => 'User not found',
                    'message' => $e->getMessage(),
                ],
                404
            );
        }
    }

    public function create(UserRequest $request)
    {
        try {
            $user = User::create($request->all());
            return response()->json(
                [
                    'status' => 201,
                    'user' =>  $user,
                ],
                201

            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 500,
                    'error' => 'User creation failed',
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(
                    [
                        'status' => 404,
                        'error' => 'User not found',
                    ],
                    404
                );
            }
            $user->update($request->all());
            return response()->json(
                [
                    'status' => 200,
                    'user' =>  $user,
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 500,
                    'error' => 'User update failed',
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    public function delete($id)
    {
        try {
            User::destroy($id);
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'User deleted successfully',
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 500,
                    'error' => 'User deletion failed',
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }
}
