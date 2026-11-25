
<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>

    <h1>Create Student</h1>

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

    <form action="/student" method="POST">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}" required>
        <br><br>

        <label>Address:</label><br>
        <textarea name="address">{{ old('address') }}</textarea>
        <br><br>

        <label>Date of Birth:</label><br>
        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
        <br><br>

        <button type="submit">Create Student</button>
    </form>

    <br>
    <a href="/students">Back to Students</a>

</body>
</html>

