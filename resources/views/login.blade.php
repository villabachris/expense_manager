<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/467bd4462d.js" crossorigin="anonymous"></script>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> window.Laravel = { csrfToken : '{ csrf_token() }'}</script>
    <title>Login</title>
</head>
<body>

    <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="register" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/register">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                                <input type="text" class="form-control" name="name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                                <input type="text" class="form-control" name="email">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Username</span>
                            </div>
                                <input type="text" class="form-control" name="username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Password</span>
                            </div>
                                <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

    <div class="card col-md-5 mx-auto mt-5 p-0 shadow-lg">
        <div class="card-header bg-light mb-5">
            <h2 class="card-title text-center text-secondary mt-2">
                ExpenseMan
            </h2>
        </div>
        <div class="card-body mt-5 mb-5">

            <form action="/login" method="post">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light px-4 border border-secondary"><i class="fas fa-user-tie fa-l"></i></label>
                    </div>
                    <input type="text" name="username" class="form-control border border-secondary" placeholder="Username" id="uname">
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text bg-info text-light px-4 border border-secondary"><i class="fas fa-lock"></i></label>
                    </div>
                    <input type="password" name="password" class="form-control border border-secondary" placeholder="Password" id="pass">
                </div>
                <div>
                    <button class="btn btn-block btn-success mt-5 mb-5 mx-auto col-md-8" type="submit">
                        <span>Login</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer bg-light">
            <div class="col-md-8 mx-auto text-center"> 
                <label for="register" class="text-secondary">Don't have an account yet?</label>
            </div>
            <br>
            <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#register">Register</button>
        </div>
    </div>
</body>
</html>