<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

<h1>Students</h1>

<a href="{{ route('students.create') }}">Create Student</a>

<br><br>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if($students->count())
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>
                        <a href="/students/{{ $student->id }}">View</a>
|
<a href="/students/{{ $student->id }}/edit">Edit</a>
|
<form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">
        Delete
    </button>
</form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No students found.</p>
@endif

</body>
</html>
