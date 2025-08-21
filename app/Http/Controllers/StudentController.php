<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Services\ClassroomService;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    protected $studentService;
    protected $classroomService;

    public function __construct(StudentService $studentService, ClassroomService $classroomService)
    {
        $this->studentService = $studentService;
        $this->classroomService = $classroomService;
    }
    // List students
    public function index()
    {

         Gate::authorize('view-teacher');
        $students = $this->studentService->getAll();
         $classrooms = Classroom::all();
        return view('student.index', compact('students' , 'classrooms'));
    }

    // Show create form
    public function create()
    {
         Gate::authorize('create-teacher');
        $classrooms = $this->classroomService->getAll();
        return view('student.create', compact('classrooms'));
    }

    // Store new student
    public function store(Request $request)
    {
         Gate::authorize('store-teacher');
        $request->validate([
            'name'     => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'class_id' => 'required|exists:classrooms,id',
        ]);

        $this->studentService->create($request->all());
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    // Show student details
    public function show($id)
    {
         Gate::authorize('view-teacher');
        $student = $this->studentService->getById($id);
        return view('student.view', compact('student'));
    }

    // Show edit form
    public function edit($id)
    {
         Gate::authorize('edit-teacher');
        $student = $this->studentService->getById($id);
        $classrooms = $this->classroomService->getAll();
        return view('student.edit', compact('student', 'classrooms'));
    }

    // Update student
    public function update(Request $request, $id)
    {
         Gate::authorize('update-teacher');
        $request->validate([
            'name'     => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'class_id' => 'required|exists:classrooms,id',
        ]);

        $this->studentService->update($request->all(), $id);
        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    // Delete student
    public function destroy($id)
    {
         Gate::authorize('destory-teacher');
        $this->studentService->delete($id);
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
