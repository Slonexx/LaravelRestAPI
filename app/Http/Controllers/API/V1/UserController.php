<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResouce;
use App\Models\file;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

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

    public function userChangePhoto(Request $request)
    {
        if(!$request->file())
            return response(null,500);

        $file = $request->file('file');
        $user = $this->getUser();

        $originalName = $file->getClientOriginalName();
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);

        $hashName = Str::random(40);
        $path = 'uploads/' . now()->format('Y-m-d');
        $hashFilename = $hashName . (empty($extension) ? '' : '.' . $extension);
        $relpath = $file->storeAs($path, $hashFilename, ['disk' => 'public']);

        $fields = [
            "mime_type" => $file->getMimeType(),
            "filename" => Str::slug($filename),
            "relpath" => $relpath,
            "extension" => $extension,
            "size" => $file->getSize()
        ];

        /** @var file $file */
        $file = file::create($fields);

        /** @var Upload $upload */
        $upload = Upload::create([
            "uploadable_id" => $user->getRouteKey(),
            "uploadable_type" => User::class,
            "file_id" => $file->getRouteKey()
        ]);

        $user->photo_id = $upload->getRouteKey();
        $user->save();
        $user->fresh();

        return response()->json([
            "url" => route('protected.storage', ['file' => $user->photo->file->getRouteKey()])
        ]);
    }
}
