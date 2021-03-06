<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RenderServiceResource;
use App\Models\RenderServices;
use Illuminate\Http\Request;

class RenderServiceController extends Controller
{

    public function index()
    {
        return response()->json([
            'Render' => RenderServiceResource::collection(RenderServices::all())
        ],200);
    }

    public function OrderBy()
    {
        $posts = RenderServices::orderBy('id', 'DESC')->get();
        return response()->json([
            'Render' => RenderServiceResource::collection($posts)
        ],200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'Animal_card_id' => 'required|string',
            'Service_id' => 'required|string',
            'Doctor_id' => 'required|string',
            'Time_Of_Receipts_id' => 'required|string',
        ]);

        $store = RenderServices::create([
            'Animal_card_id' => $fields['Animal_card_id'],
            'Service_id' => $fields['Service_id'],
            'Doctor_id' => $fields['Doctor_id'],
            'Time_Of_Receipts_id' => $fields['Time_Of_Receipts_id'],
        ]);
        return response()->json(
            [
                'message' => 'add Render Service!',
                'Render' => $store
            ],201);
    }

    public function show($id)
    {
        return new RenderServiceResource(RenderServices::findOrFail($id));
    }


    public function destroy($id)
    {
        RenderServices::findOrFail($id)->delete();
        return [
            'message' => 'Delete Render Services'
        ];
    }

    public function restore($id)
    {
        RenderServices::onlyTrashed()->find($id)->restore();
        return [
            'message' => 'Restore Render Services'
        ];
    }
}
