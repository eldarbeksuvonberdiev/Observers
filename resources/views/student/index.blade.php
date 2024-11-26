<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Students</h1>
                <form action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label mt-2">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name..." value="{{ old('name') }}">
                        @error('name')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="birth_day" class="form-label mt-2">Birth Date</label>
                        <input type="date" class="form-control" name="birth_day" id="birth_day">
                        @error('birth_day')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label mt-2">Age</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Age..." value="{{ old('age') }}">
                        @error('age')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="field" class="form-label mt-2">Field</label>
                        <input type="text" class="form-control" name="field" id="field" placeholder="Field Name..." value="{{ old('field') }}">
                        @error('field')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>

            <div class="col-12 mt-4">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Birth date</th>
                            <th>Age</th>
                            <th>Field</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->birth_day }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->field }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
