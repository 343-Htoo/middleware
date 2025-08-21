<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClassroomService;

class ClassroomController extends Controller
{
    protected $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    // List all classrooms
    public function index()
    {
        $classrooms = $this->classroomService->getAll();
        return view('classroom.index', compact('classrooms'));
    }

    // Show create form
    // public function create()
    // {
    //     return view('classroom.create');
    // }

    // Store new classroom
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->classroomService->create($request->all());
        return redirect()->route('class.index');
    }

    // Show classroom details
    public function show($id)
    {
        $classroom = $this->classroomService->getById($id);
        return view('classroom.view', compact('classroom'));
    }

    // Show edit form
    public function edit($id)
    {
        $classroom = $this->classroomService->getById($id);
        return view('classroom.edit', compact('classroom'));
    }

    // Update classroom
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->classroomService->update($request->all(), $id);
        return redirect()->route('class.index')->with('success', 'Classroom updated successfully.');
    }

    // Delete classroom
    public function destroy($id)
    {
        $this->classroomService->delete($id);
        return redirect()->route('class.index')->with('success', 'Classroom deleted successfully.');
    }
}
