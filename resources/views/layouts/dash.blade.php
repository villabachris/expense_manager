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
    <title>Dashboard</title>
</head>
<body>
    <div class="row" style="height:100vh;">
        <div class="col-md-2" id="side-dash">

            <div class="mt-5 mb-5">
                <img class="img-fluid" src="{{url('/images/user-logo.png')}}">
            </div>
            <div class="container text-center">
                <h6 class="">Welcome!</h6>
                <span class="text-light h5">
                    {{ucfirst(trans(Auth::user()->name))}}
                </span>
            </div>
            <div class="container mt-5">
                <div class="container mb-5 mt-5 text-center">
                    <a href="/dashboard">
                        <span class="h3">Dashboard<span>
                    </a>
                </div>

                <div class="container mt-5 mb-5">
                    <h5>User Management</h5>
                    <ul>
                        <li><a href="/user/roles" class="{{ (request()->is('user/roles')) ? 'text-success' : '' }}">Roles</a></li>
                        <li><a href="/all/users" class="{{ (request()->is('/all-users')) ? 'text-success' : '' }}">Users</a></li>
                    </ul>
                </div>

                <div class="container"> 
                    <h5>Expense Management</h5>
                    <ul>
                        <li><a href="/expense/management">Expense Categories</a></li>
                        <li><a href="#">Expenses</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10 p-0" id="app">
                <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                        <h5 class="my-0 mr-md-auto font-weight-normal">Welcome In Expense Manager</h5>
                        <nav class="my-2 my-md-0 mr-md-3">
                            <a class="p-2 text-dark" href="/logout">Logout</a>
                        </nav>
                        </div>
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
<style>
    #side-dash{
        background-color: #37aad7;
    }
    ul{
        list-style-type: none;
    }
    li>a{
        text-decoration: none;
        color: white;
    }
    li>a:hover{
        text-decoration: none;
        color: coral;
        
    }
    a{
        text-decoration: none;
        color: white;
    }
    a:hover{
        text-decoration: none;
        color: white;
        
    }
</style>