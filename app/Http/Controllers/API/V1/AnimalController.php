<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnimalResouce;
use App\Models\AnimalCard;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        return response()->json([
            'Animal' => AnimalResouce::collection(AnimalCard::all())
        ],200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'Nickname_Animal' => 'required|string',
            'Type_Animal' => 'required|string',
            'Age_Animal' => 'required|string',
            'User_id' => 'required|string'
        ]);

        $animal = AnimalCard::create([
            'Nickname_Animal' => $fields['Nickname_Animal'],
            'Type_Animal' => $fields['Type_Animal'],
            'Age_Animal' => $fields['Age_Animal'],
            'User_id' => $fields['User_id']
        ]);
        return response()->json(
            [
                'message' => 'add animal!',
                'Animal' => $animal
            ],201);
    }

    public function show($id)
    {
        return new AnimalResouce(AnimalCard::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $animal_update = AnimalCard::findOrFail($id);

        $fields = $request->validate([
            'nickname' => 'required|string',
            'type_animal' => 'required|string',
            'age_animal' => 'required|string'
        ]);

        $animal_update->update([
            'nickname' => $fields['nickname'],
            'type_animal' => $fields['type_animal'],
            'age_animal' => $fields['age_animal']
        ]);

        return response()->json([
            'Animal' => $animal_update
        ], 201);
    }

    public function destroy($id)
    {
        AnimalCard::findOrFail($id)->delete();
        return [
            'message' => 'Delete Animal'
        ];
    }

    public function restore($id)
    {
        AnimalCard::onlyTrashed()->find($id)->restore();
        return [
            'message' => 'Restore Animal'
        ];

    }
}
