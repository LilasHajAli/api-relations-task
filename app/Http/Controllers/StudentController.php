<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\MedicalFile;
use App\Models\Student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
       $student= Student::create([
        'name'=> $request->name,
        'age'=>$request ->age ,
       ]);
        return response()->json( $student);
    }

    public function show($id){
    $student = Student::with('medicalFile')->find($id);
    return response()->json($student);
    }
}
