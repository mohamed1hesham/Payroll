@extends('layout')
<link rel="stylesheet" href="app.css">
@section('content')
    <div class="card">

        <div class="card-header">New Employee</div>

        <div class="card-body">

            <div class="div_btns">
                @if (auth()->user())
                    <a href="{{ route('home') }}"><button class="btn btn-dark">back</button></a>
                    <a href="{{ route('logout') }}"><button class="btn btn-danger">LogOut</button></a>
                    <a href="{{ route('report') }}"><button class="btn btn-secondary ">Report</button></a>
                @else
                    <a href="{{ route('login') }}" class="btns"><button class="btn btn-primary">Login</button></a>
                    {{-- <a href="/reg" class="btns"><button class="btn btn-dark">Signup</button></a>  --}}
                @endif

            </div>
            <br><br>
            <div>

                <div class="card-body">
                    <h1>Employees Data</h1>
                    <table class="table table-dark table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total Salary</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (count($employees) > 0)

                                @foreach ($employees as $employee)
                                    {{-- @dd($employee->salaries->first()->total_salary)  --}}

                                    <tr>
                                        <td>
                                            {{ $employee['id'] }}
                                        </td>
                                        <td>
                                            {{ $employee['name'] }}
                                        </td>
                                        <td>
                                            @if ($employee->salary)
                                                {{ $employee->salaries->first()->total_salary ?? 0 }}
                                            @else
                                                No salaries for this Employee
                                            @endif
                                        </td>
                                @endforeach
                            @else
                                <p>There are no Employees to display</p>
                            @endif
                        </tbody>
                    </table>


                </div>

            </div>

        </div>
        <div>

        </div>
    </div>
@stop
