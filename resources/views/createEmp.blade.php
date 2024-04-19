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
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Employee</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add-employee') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Emp Id</label>
                                <input type="text" name="emp_no" class="form-control">
                                @error('emp_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for=""> Email</label>
                                <input type="text" name="email" class="form-control">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for=""> Work Depart</label>
                                <input type="text" name="workdept" class="form-control">
                                @error('workdept')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Contact No</label>
                                <input type="text" name="phone_no" class="form-control">
                                @error('phone_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Gender</label>
                                <select class="form-select mb-3" name="sex" aria-label=".form-select-lg example">
                                    <option selected>Select Gender</option>
                                    <option value="M">male</option>
                                    <option value="F">female</option>
                                </select>
                                @error('sex')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Employee</button>
                                <a type="button" href="{{ url('user/employee') }}" class="btn btn-primary ">Employee
                                    List</a>
                                <a type="button" href="{{ route('logout') }}" class="btn btn-primary ">Logout</a>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>