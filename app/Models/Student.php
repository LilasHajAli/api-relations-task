<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'age'])]
class Student extends Model
{
    public function medicalFile(){
        return $this->hasone(MedicalFile::class);
    }
}
