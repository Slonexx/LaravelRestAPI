<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResouce;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return response()->json([
            'User' => UserResouce::collection(User::all())
        ],200);
    }


    public function show($id)
    {
        return new UserResouce(User::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $update = User::findOrFail($id);

        $fields = $request->validate([
            'phone' => 'required|string',
            'name' => 'required|string',
            'URL_Picture' => 'required|string',
            'password' => 'required|string'
        ]);

        $update->update([
            'name' => $fields['name'],
            'phone' => $fields['phone'],
            'URL_Picture' => $fields['URL_Picture'],
            'password' => bcrypt($fields['password'])
        ]);

        return response()->json([
            'User' => $update
        ], 201);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return [
            'message' => 'Delete User'
        ];
    }

    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return [
            'message' => 'Restore User'
        ];
    }
}
