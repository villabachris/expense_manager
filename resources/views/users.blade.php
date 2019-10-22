@extends('layouts.dash')
@section('content')
    <div class="container-fluid row">
        <div class="col-md-6 h4">User</div>
        <div class="col-md-6 h5 text-right">User Management > Users</div>
    </div>
    <div>
        <div class="container col-md-6 mt-5">
        <all-users></all-users>
        <add-user></add-user>
        </div>
    </div>
@endsection