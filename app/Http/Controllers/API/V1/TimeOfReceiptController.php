<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TimeOfReceiptResource;
use App\Models\TimeOfReceipt;
use Illuminate\Http\Request;

class TimeOfReceiptController extends Controller
{

    public function index()
    {
        return response()->json([
            'Time' => TimeOfReceiptResource::collection(TimeOfReceipt::all())
        ],200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'Receipt_Date' => 'required|string',
            'Time' => 'required|string',
            'Doctor_id' => 'required|string',

        ]);

        $store = TimeOfReceipt::create([
            'Receipt_Date' => $fields['Receipt_Date'],
            'Time' => $fields['Time'],
            'Doctor_id' => $fields['Doctor_id'],
        ]);
        return response()->json(
            [
                'message' => 'add Time Of Receipt!',
                'Time Of Receipt' => $store
            ],201);
    }

    public function show($id)
    {
        return response()->json(
            [
                'Time' =>new TimeOfReceiptResource(TimeOfReceipt::findOrFail($id))
        ],201);

    }

    public function update(Request $request, $id)
    {
        $update = TimeOfReceipt::findOrFail($id);
        $fields = $request->validate([
            'Receipt_Date' => 'required|string',
            'Time' => 'required|string',
        ]);

        $update->update([
            'Receipt_Date' => $fields['Receipt_Date'],
            'Time' => $fields['Time'],
        ]);
        return response()->json(
            [
                'message' => 'update Time Of Receipt!',
                'Time Of Receipt' => new TimeOfReceiptResource($update)
            ],201);
    }

    public function destroy($id)
    {
        TimeOfReceipt::findOrFail($id)->delete();
        return [
            'message' => 'Delete Time Of Receipt'
        ];
    }

    public function restore($id)
    {
        TimeOfReceipt::onlyTrashed()->find($id)->restore();
        return [
            'message' => 'Restore Time Of Receipt'
        ];
    }
}
