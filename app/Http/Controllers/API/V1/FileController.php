<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\file;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function show($id)
    {
        return file::findOrFail($id);
    }

    public function ChangeFileUser(Request $request, $id)
    {
        if(!$request->file())
            return response(null,500);

        $file = $request->file('file');
        $user = User::findOrFail($id);

        $originalName = $file->getClientOriginalName();
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);

        $hashName = Str::random(40);
        $path = 'uploads/' . now()->format('Y-m-d');
        $user_path = $path.'/User/' . $id;
        $hashFilename = $hashName . (empty($extension) ? '' : '.' . $extension);
        $relpath = $file->storeAs($user_path, $hashFilename, ['disk' => 'public']);

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

        $photoURL = url('/'.$filename);
        return response()->json([
            'status' => true,
            'message' => 'File is uploaded!',
            'path'=>$relpath
        ]);
    }
    public function DownLoadFileUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $change_photo_id = $user->photo_id;
        $file = file::findOrFail($change_photo_id);
        $relpath = $file->relpath;
        $path = Storage::disk('public')->path($relpath);

        return Response()->download($path);
    }

    public function ChangeFileClinic(Request $request, $id){
        if(!$request->file())
            return response(null,500);

        $file = $request->file('file');
        $user = Clinic::findOrFail($id);

        $originalName = $file->getClientOriginalName();
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);

        $hashName = Str::random(40);
        $path = 'uploads/' . now()->format('Y-m-d');
        $user_path = $path.'/Clinic/' . $id;
        $hashFilename = $hashName . (empty($extension) ? '' : '.' . $extension);
        $relpath = $file->storeAs($user_path, $hashFilename, ['disk' => 'public']);

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
            "uploadable_type" => Clinic::class,
            "file_id" => $file->getRouteKey()
        ]);

        $user->photo_id = $upload->getRouteKey();
        $user->save();
        $user->fresh();

        $photoURL = url('/'.$filename);
        return response()->json([
            'status' => true,
            'message' => 'File is uploaded!',
            'path'=>$relpath
        ]);
    }
    public function DownLoadFileClinic(Request $request, $id)
    {
        $user = Clinic::findOrFail($id);
        $change_photo_id = $user->photo_id;
        $file = file::findOrFail($change_photo_id);
        $relpath = $file->relpath;
        $path = Storage::disk('public')->path($relpath);

        return Response()->download($path);
    }



}
