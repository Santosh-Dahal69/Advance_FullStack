
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

// Home
Route::get('/', function () {
    return view('welcome');
});

// STUDENT ROUTES

Route::get('/student/create', function () {
    return view('student.create');
});

Route::post('/student', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    Student::create($data);

    return redirect('/students');
});

Route::get('/students', function () {
    $students = Student::all();
    return view('student.list', compact('students'));
})->name('students.index');

Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.detail', compact('student'));
});

Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.edit', compact('student'));
});

Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($data);

    return redirect('/students');
});

Route::delete('/students/{id}', function ($id) {
    Student::findOrFail($id)->delete();
    return redirect('/students');
});

// COURSE ROUTES

Route::get('/course/create', function () {
    return view('course.create');
});

Route::get('/courses', function () {
    $courses = Course::all();
    return view('course.list', compact('courses'));
});

Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.detail', compact('course'));
});

Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.edit', compact('course'));
});

Route::post('/courses', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    $data['is_active'] = $request->boolean('is_active');

    Course::create($data);

    return redirect('/courses');
});

Route::put('/courses/{id}', function (Request $request, $id) {
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

    return redirect('/courses');
});

Route::delete('/courses/{id}', function ($id) {
    Course::findOrFail($id)->delete();
    return redirect('/courses');
});

