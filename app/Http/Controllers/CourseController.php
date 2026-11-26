<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('course.list', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        Course::create($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('course.detail', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $course->update($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
