<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>

<body>

<h1>Student CRUD</h1>

<h2>Add Student</h2>

<form action="{{ route('students.store') }}" method="POST">

    @csrf

    <input type="text" name="name" placeholder="Name">

    <input type="email" name="email" placeholder="Email">

    <input type="text" name="course" placeholder="Course">

    <button type="submit">Add Student</button>

</form>

<hr>

<h2>All Students</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

    @foreach($students as $student)

    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->course }}</td>

        <td>

            {{-- UPDATE --}}

            <form action="{{ route('students.update', $student->id) }}" method="POST">

                @csrf
                @method('PUT')

                <input type="text" name="name" value="{{ $student->name }}">

                <input type="email" name="email" value="{{ $student->email }}">

                <input type="text" name="course" value="{{ $student->course }}">

                <button type="submit">Update</button>

            </form>

            {{-- DELETE --}}

            <form action="{{ route('students.destroy', $student->id) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>

            </form>

        </td>
    </tr>

    @endforeach

</table>

</body>
</html>
