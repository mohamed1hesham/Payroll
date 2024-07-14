@extends('layout')

@section('content')
    <div class="card">

        <div class="card-header">New Employee</div>

        <div class="card-body">

            <div class="div_btns">

                @if (auth()->user())
                    <a href="{{ route('home') }}"><button class="btn btn-dark">back</button></a>
                    <a href="{{ route('logout') }}"><button class="btn btn-danger">LogOut</button></a>
                @else
                    <a href="{{ route('login') }}" class="btns"><button class="btn btn-primary">Login</button></a>
                    {{-- <a href="/reg" class="btns"><button class="btn btn-dark">Signup</button></a>  --}}
                @endif

            </div>

            <div class="first_page">

                <div class="card-body">

                    <form action="{{ route('register') }}" method="post">

                        {!! csrf_field() !!}
                        <label>Employee Name</label>
                        <input type="text" name="name" id="name" class="form-control"> </br>

                        <label>Employee Number</label>
                        <input type="text" name="number" id="number" class="form-control"> <br>

                        <label>Employee Address</label>
                        <input type="text" name="address" id="address" class="form-control"> <br>

                        <label>Employee Email</label>
                        <input type="email" name="email" id="email" class="form-control"> </br>

                        <label>Employee Password</label>
                        <input type="password" name="password" id="password" class="form-control"> </br>
                        @csrf
                        <input type="submit" value="Submit" class="btn btn-success">

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

                    </form>
                </div>

            </div>

        </div>
        <div>

        </div>
    </div>
@stop
