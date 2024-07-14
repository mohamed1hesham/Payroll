@extends('layout')
@section('content')

    <div class="card">
        <div class="card-header">Register Form</div>
        <div class="card-body">

            <form action="{{ route('register') }}" method="post">

                {!! csrf_field() !!}
                <label>First Name</label>
                <input type="text" name="name" id="name" class="form-control"> </br>

                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control"> </br>

                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control"> </br>

                <input type="submit" value="Sign Up" class="btn btn-success">
                @if ($errors->any())
                    <br><br>
                    <div class="alert alert-danger">

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
                <a href="/"><button type="button" class="btn btn-secondary" style="float: right;">Back</button></a>
            </form>
        </div>
    </div>

@stop
