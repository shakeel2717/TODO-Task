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
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="card-title">Add Task in TODO</h2>
                        <a href="{{ route('task.index') }}" class="btn btn-primary">Go Back</a>
                    </div>
                    <hr>
                    @if ($errors->any())
                        <div class="row">
                            @foreach ($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-12">
                                <label for="task">Enter Task</label>
                                <input type="text" name="task" id="task" class="form-control"
                                    value="{{ $task->task }}">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg mt-2">Update Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
