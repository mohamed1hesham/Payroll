@extends('layout')
@section('content')
    <div class="card">

        <div class="card-header">First Page</div>

        <div class="card-body">

            <div class="div_btns">

                @if (auth()->user())
                    <a href="{{ route('logout') }}" class="btn btn-dark"><button class="btn btn-dark">LogOut</button></a>
                @else
                    <a href="{{ route('login') }}" class="btns"><button class="btn btn-primary">Login</button></a>
                    {{-- <a href="/reg" class="btns"><button class="btn btn-dark">Signup</button></a>  --}}
                @endif

            </div>

            <div class="first_page">

                @if (auth()->user())

                    @if (auth()->user()->is_admin)

                        @if (auth()->user()->can('edit all'))
                            <h2> Welcome, {{ auth()->user()->name }} </h2>

                            <!--  <h2> Welcome, {{ $user }} </h2>-->

                            <a href="{{ route('create') }}"><button type="button" class="btn btn-outline-primary">New
                                    Employee</button></a>
                            <a href="{{ route('show_all') }}"><button type="button" class="btn btn-outline-secondary">Show
                                    All
                                    Employees</button></a>
                        @elseif (auth()->user()->can('edit salary'))
                            <h2> Welcome, {{ auth()->user()->name }} </h2>
                            <a href="{{ route('show_all') }}"><button type="button" class="btn btn-outline-secondary">Show
                                    All
                                    Employees</button></a>
                        @endif
                    @else
                        <h2> Welcome, {{ auth()->user()->name }} </h2>
                        <br>
                        @if (auth()->user()->salary)
                            <h4> Your Basic Salary this month is : {{ auth()->user()->latestSalary()->basic_salary }} </h4>
                            <br>
                            <h4> Your bonus this month is : {{ auth()->user()->latestSalary()->overtime }} </h4>
                            <br>
                            <h4> Your absence this month is : {{ auth()->user()->latestSalary()->absence }} </h4>
                            <br>
                            <h4> Your Total Salary this month Equal to : {{ auth()->user()->latestSalary()->total_salary }}
                            </h4>
                        @else
                            <h4> Your bonus this month is : 0 </h4>
                            <br>
                            <h4> Your absence this month is : 0</h4>
                            <br>
                            <h4> Your salary this month Equal to : 0</h4>
                        @endif

                    @endif
                @else
                    <h2> Welcome Home </h2>


                @endif

            </div>

        </div>
        <div>

        </div>
    </div>

@stop
