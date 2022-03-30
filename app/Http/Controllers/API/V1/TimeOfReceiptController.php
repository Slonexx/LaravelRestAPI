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
            'Doctor' => TimeOfReceiptResource::collection(TimeOfReceipt::all())
        ],200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'Receipt_Date' => 'required|string',
            'Time' => 'required|string',
        ]);

        $store = TimeOfReceipt::create([
            'Receipt_Date' => $fields['Receipt_Date'],
            'Time' => $fields['Time'],
        ]);
        return response()->json(
            [
                'message' => 'add Time Of Receipt!',
                'Time Of Receipt' => $store
            ],201);
    }

    public function show($id)
    {
        return new TimeOfReceiptResource(TimeOfReceipt::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'Receipt_Date' => 'required|string',
            'Time' => 'required|string',
        ]);

        $store = TimeOfReceipt::update([
            'Receipt_Date' => $fields['Receipt_Date'],
            'Time' => $fields['Time'],
        ]);
        return response()->json(
            [
                'message' => 'update Time Of Receipt!',
                'Time Of Receipt' => $store
            ],201);
    }

    public function destroy($id)
    {
        $update = TimeOfReceipt::findOrFail($id);
        $update->delete();
        return [
            'message' => 'Delete animal'
        ];
    }
}
