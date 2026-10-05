<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
</head>
<body>

    <h1>Students List</h1>

    @if(session('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif

    <a href="/student/create">Create New Student</a>

    <br><br>

    @forelse($students as $student)

        <hr>

        <h3>{{ $student->name }}</h3>

        <p>Email: {{ $student->email }}</p>
        <p>Phone: {{ $student->phone }}</p>

        <!-- VIEW -->
        <a href="/students/{{ $student->id }}">
            View
        </a>

        |

        <!-- EDIT -->
        <a href="/students/{{ $student->id }}/edit">
            Edit
        </a>

        |

        <!-- DELETE -->
        <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">

            @csrf

            @method('DELETE')

            <button type="submit">
                Delete
            </button>

        </form>

        <br><br>

    @empty

        <p>No students found.</p>

    @endforelse

</body>
</html>