<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('student.list', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        Student::create($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('student.detail', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
