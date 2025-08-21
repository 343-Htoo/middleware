<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Classroom;

class StudentService
{
    public function getAll()
    {
        return Student::with('classroom')->get();
    }
    public function getClass(){
        return Classroom::all();
    }

    public function getById($id)
    {
        return Student::with('classroom')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Student::create([
            'name'    => $data['name'],
            'address' => $data['address'],
            'phone'   => $data['phone'],
            'class_id'=> $data['class_id'],
        ]);
    }

    public function update(array $data, $id)
    {
        $student = Student::findOrFail($id);
        $student->update([
            'name'    => $data['name'],
            'address' => $data['address'],
            'phone'   => $data['phone'],
            'class_id'=> $data['class_id'],
        ]);
        return $student;
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return $student->delete();
    }
}
