
<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
</head>
<body>

    <h1>Courses</h1>

    <a href="/course/create">Create Course</a>

    <br><br>

    @if($courses->count())
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }} weeks</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="/courses/{{ $course->id }}">View</a> |

                        <a href="/courses/{{ $course->id }}/edit">Edit</a> |

                        <form action="/courses/{{ $course->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this course?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No courses found.</p>
    @endif

</body>
</html>

