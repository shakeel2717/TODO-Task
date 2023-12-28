<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-primary">
    <div class="row min-vh-100 justif-content-center align-items-center">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="card-title">All Task in TODO</h2>
                        <a href="{{ route('task.create') }}" class="btn btn-primary">Add new Task</a>
                    </div>
                    @if (session('success'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Task</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ $task->status ? 'Completed' : 'Pending' }}</td>
                                    <td>
                                        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
