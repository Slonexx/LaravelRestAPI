<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        return response()->json([
            'Doctor' => DoctorResource::collection(Doctor::all())
        ],200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'Name_Doctor' => 'required|string',
            'Speciality' => 'required|string',
            'URL_Picture' => 'required|string',
            'Clinic_id' => 'required|string'
        ]);

        $store = Doctor::create([
            'Name_Doctor' => $fields['Name_Doctor'],
            'Speciality' => $fields['Speciality'],
            'URL_Picture' => $fields['URL_Picture'],
            'Clinic_id' => $fields['Clinic_id']
        ]);
        return response()->json(
            [
                'message' => 'add Doctor!',
                'Doctor' => $store
            ],201);
    }

    public function show($id)
    {
        return new DoctorResource(Doctor::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'Name_Doctor' => 'required|string',
            'Speciality' => 'required|string',
            'URL_Picture' => 'required|string',
            'Clinic_id' => 'required|string'
        ]);

        $store = Doctor::update([
            'Name_Doctor' => $fields['Name_Doctor'],
            'Speciality' => $fields['Speciality'],
            'URL_Picture' => $fields['URL_Picture'],
            'Clinic_id' => $fields['Clinic_id']
        ]);
        return response()->json(
            [
                'message' => 'update Doctor!',
                'Doctor' => $store
            ],201);
    }

    public function destroy($id)
    {
        $pat_update = Doctor::findOrFail($id);
        $pat_update->delete();
        return [
            'message' => 'Delete animal'
        ];
    }
}