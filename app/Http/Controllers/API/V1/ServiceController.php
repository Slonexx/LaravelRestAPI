<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        return response()->json([
            'Service' => ServiceResource::collection(Service::all())
        ],200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'Name_Service' => 'required|string',
            'Descriptions' => 'required|string',
        ]);

        $store = Service::create([
            'Name_Service' => $fields['Name_Service'],
            'Descriptions' => $fields['Descriptions'],
        ]);
        return response()->json(
            [
                'message' => 'add Service!',
                'Service' => $store
            ],201);
    }

    public function show($id)
    {
        return new ServiceResource(Service::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $update = Service::findOrFail($id);

        $fields = $request->validate([
            'Name_Service' => 'required|string',
            'Descriptions' => 'required|string',
        ]);

        $update->update([
            'Name_Service' => $fields['Name_Service'],
            'Descriptions' => $fields['Descriptions'],
        ]);

        return response()->json([
            'message' => 'update Service!',
            'Clinic' => $update
        ], 201);
    }

    public function destroy($id)
    {
        $update = Service::findOrFail($id);
        $update->delete();
        return [
            'message' => 'Delete Service'
        ];
    }
}
