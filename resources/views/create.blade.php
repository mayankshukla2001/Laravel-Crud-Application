<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                          <h4>Add Student</h4>
                      </div>
                      <div class="card-body">
      
                          <form action="{{ url('add-student') }}" method="POST">
                              @csrf
      
                              <div class="form-group mb-3">
                                  <label for="">Student Name</label>
                                  <input type="text" name="name" class="form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Student Email</label>
                                  <input type="text" name="email" class="form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Student Course</label>
                                  <input type="text" name="course" class="form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Student Section</label>
                                  <input type="text" name="section" class="form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <button type="submit" class="btn btn-primary">Save Student</button>
                                  <a type="button" href="{{ url('user/students') }}" class="btn btn-primary ">Student List</a>
                                  <a type="button" href="{{ route('logout') }}" class="btn btn-primary ">Logout</a>

                              </div>

                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
