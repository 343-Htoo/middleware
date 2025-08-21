<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teachertService;

    public function __construct(TeacherService $studentService)
    {
        $this->teacherService = $teacherService;
    }

    // List all students
    public function index()
    {
        $teachers = $this->teacherService->getAll();
        $classrooms = $this->teacherService->getClass();

        return view('teacher.index', compact('teachers', 'classrooms'));
    }

    // Show form to create a student
    public function create()
    {
        $classrooms = $this->teacherService->getClass();
        return view('teacher.create', compact('classrooms'));
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


        $data = $this->teacherService->create($request->all());

        return redirect()->route('teacher.index');
    }

    // Edit student
    public function edit($id)
    {
        $teacher = $this->teacherService->getId($id);
        $classrooms = $this->teacherService->getClass();

        return view('teacher.edit', compact('teacher', 'classrooms'));
    }

    // Update teacher
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'classroom_id' => 'required|exists:classrooms,id'
        ]);

        $this->teacherService->update($request->all(), $id);

        return redirect()->route('teacher.index');
    }

    // Delete teacher
    public function destroy($id)
    {
        $this->teacherService->delete($id);
        return redirect()->route('teacher.index');
    }
}
