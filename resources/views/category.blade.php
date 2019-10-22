@extends('layouts.dash')
@section('content')
<div class="container-fluid row">
        <div class="col-md-6 h4">Expense Categories</div>
        <div class="col-md-6 h5 text-right">Expense Management > Expense Categories</div>
    </div>
    <div>
        <div class="container col-md-6 mt-5">
            <all-categories></all-categories>
            <add-category></add-category>
        </div>
    </div>
@endsection