<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicResource;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{

    public function index()
    {
        return response()->json([
            'Clinic' => ClinicResource::collection(Clinic::all())
        ],200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'Name_Clinic' => 'required|string',
            'Address' => 'required|string',
            'URL_Picture' => 'required|string',
        ]);

        $store = Clinic::create([
            'Name_Clinic' => $fields['Name_Clinic'],
            'Address' => $fields['Address'],
            'URL_Picture' => $fields['URL_Picture'],
        ]);
        return response()->json(
            [
                'message' => 'add Clinic!',
                'Clinic' => $store
            ],201);
    }

    public function show($id)
    {
        return new ClinicResource(Clinic::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $update = Clinic::findOrFail($id);

        $fields = $request->validate([
            'Name_Clinic' => 'required|string',
            'Address' => 'required|string',
            'URL_Picture' => 'required|string'
        ]);

        $update->update([
            'Name_Clinic' => $fields['Name_Clinic'],
            'Address' => $fields['Address'],
            'URL_Picture' => $fields['URL_Picture']
        ]);

        return response()->json([
            'message' => 'update Clinic!',
            'Clinic' => $update
        ], 201);
    }

    public function destroy($id)
    {
        $update = Clinic::findOrFail($id);
        $update->delete();
        return [
            'message' => 'Delete Clinic'
        ];
    }
}
