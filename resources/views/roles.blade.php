@extends('layouts.dash')
@section('content')
    <div class="container-fluid row">
        <div class="col-md-6 h4">Roles</div>
        <div class="col-md-6 h5 text-right">User Management > Roles</div>
    </div>
    <div>
        <user-roles></user-roles>
        <add-role></add-role>
    </div>
@endsection