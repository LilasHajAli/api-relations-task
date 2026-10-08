<?php

namespace App\Http\Controllers;

use App\Models\MedicalFile;
use App\Models\Student;
use Illuminate\Http\Request;

class MedicalFileController extends Controller
{
    public function store(Request $request, $student_id)
    {
        $student = Student::find($student_id);

        if (!$student) {
            return response()->json(['message'=>'Student not found'],404);
        }


        if ($student->medicalFile) {
            return response()->json(['message' =>'This student already has a medical file']);
        }

        $medicalFile = MedicalFile::create([
            'student_id' => $student_id,
            'blood_type' => $request->blood_type,
            'emergency_phone' => $request->emergency_phone,
        ]);

        return response()->json($medicalFile);
    }

    public function show($student_id)
    {
        $medicalFile = MedicalFile::where('student_id', $student_id)->first();

        return response()->json($medicalFile);
    }

    public function update(Request $request, $student_id)
    {
        $medicalFile = MedicalFile::where('student_id', $student_id)->first();
        $medicalFile->update([
            'blood_type' => $request->blood_type,
            'emergency_phone' => $request->emergency_phone,
        ]);

        return response()->json($medicalFile);
    }
}
