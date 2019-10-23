@extends('layouts.dash')
@section('content')
<div class="container-fluid row">
    <div class="col-md-6 h4">Expenses </div>
    <div class="col-md-6 h5 text-right">Expense Management > Expenses</div>
</div>
<div>
    <div class="container col-md-6 mt-5">
        <all-expenses></all-expenses>
        <add-expense></add-expense>
    </div>
</div>
@endsection