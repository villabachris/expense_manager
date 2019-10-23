@extends('layouts.dash')
@section('content')
{{-- {{Auth::user()->id}} --}}
<div class="container-fluid row">
        <div class="col-md-6 h4">My Expenses </div>
        <div class="col-md-6 h5 text-right">Dashboard</div>
    </div>
    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <my-expenses></my-expenses>
                </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>
    </div>
@endsection