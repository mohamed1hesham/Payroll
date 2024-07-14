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
                    <form action="{{ route('report') }}" method="post">
                        @csrf
                        Date
                        <input type="month" id="date" name="date">
                        <button class="btn btn-secondary">Report</button>
                    </form>
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
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                                <th scope="col">Add Salary</th>
                                <th scope="col">History</th>
                                <th scope="col">send email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (count($employee) > 0)

                                @foreach ($employee as $employee)
                                    <tr>
                                        <td>
                                            {{ $employee['id'] }}
                                        </td>
                                        <td>
                                            {{ $employee['name'] }}
                                        </td>
                                        <td>
                                            {{ $employee['email'] }}
                                        </td>
                                        <td>
                                            {{ $employee['number'] }}
                                        </td>



                                        <td><a href="{{ route('edit', $employee->id) }}"><button
                                                    class="btn btn-warning">Edit
                                                    Salary</button></a></td>


                                        <td><a href="{{ route('history', $employee->id) }}"><button
                                                    class="btn btn-success ">History
                                                </button></a></td>

                                        <td><a href="{{ route('send_email', $employee->id) }}"><button
                                                    class="btn btn-info ">send Message
                                                </button></a></td>
                                    </tr>
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
