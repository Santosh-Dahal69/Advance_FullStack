
<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>

    <h1>Create Course</h1>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Please fix these errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/courses" method="POST">
        @csrf

        <label>Course Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br><br>

        <label>Description:</label><br>
        <textarea name="description" required>{{ old('description') }}</textarea>
        <br><br>

        <label>Duration (Weeks):</label><br>
        <input type="number" name="duration" value="{{ old('duration') }}" required>
        <br><br>

        <label>Fee:</label><br>
        <input type="number" step="0.01" name="fee" value="{{ old('fee') }}" required>
        <br><br>

        <label>Difficulty:</label><br>
        <select name="difficulty" required>
            <option value="">Select Difficulty</option>
            <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
            <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>Hard</option>
        </select>
        <br><br>

        <label>
            <input type="checkbox" name="is_active" value="1" checked>
            Active
        </label>
        <br><br>

        <button type="submit">Create Course</button>
    </form>

    <br>
    <a href="/courses">Back to Courses</a>

</body>
</html>

