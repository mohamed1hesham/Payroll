@extends('layout')
@section('content')
  
    <div class="card">
    @if(isset($user))
        <p>1</p>
        @endif
        <div class="card-header">Contact Form</div>
        <div class="card-body"> 
        <h2>Welcome, {{ $userName }}</h2>
        </div>
    </div>

@stop