<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    // List all students
    public function index()
    {
        $students = $this->studentService->getAll();
        $classrooms = $this->studentService->getClass();

        return view('student.index', compact('students', 'classrooms'));
    }

    // Show form to create a student
    public function create()
    {
        $classrooms = $this->studentService->getClass();
        return view('student.create', compact('classrooms'));
    }

    // Store new student
    public function store(Request $request)
    {
        // Validate the input
       $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'classroom_id' => 'required|exists:classrooms,id'
        ]);


        $data = $this->studentService->create($request->all());

        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    // Edit student
    public function edit($id)
    {
        $student = $this->studentService->getId($id);
        $classrooms = $this->studentService->getClass();

        return view('student.edit', compact('student', 'classrooms'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'classroom_id' => 'required|exists:classrooms,id'
        ]);

        $this->studentService->update($request->all(), $id);

        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    // Delete student
    public function destroy($id)
    {
        $this->studentService->delete($id);
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
