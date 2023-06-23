<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>ยินดีต้อนรับ</h2>
            </div>
            <div class="div">
                <a href="{{ route('students.create') }}" class="btn btn-success my-3">Create student</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>คำนำหน้า</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>อีเมลล์</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->topic }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->surname }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $students->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</body>
</html>