@extends('layout')
<link rel="stylesheet" href="app.css">
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="card">

        <div class="card-header">New Employee</div>

        <div class="card-body">

            <div class="div_btns">
                @if (auth()->user())
                    <a href="{{ route('show_all') }}"><button class="btn btn-dark">back</button></a>
                    <a href="{{ route('logout') }}"><button class="btn btn-danger">LogOut</button></a>
                @else
                    <a href="{{ route('login') }}" class="btns"><button class="btn btn-primary">Login</button></a>
                    {{-- <a href="/reg" class="btns"><button class="btn btn-dark">Signup</button></a>  --}}
                @endif

            </div>
            <br><br>
            <div>

                <div class="card-body">
                    <h1>Employees Data</h1>

                    @if (session()->has('message'))
                        <div class="alert alert-success">

                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <table class="table table-dark table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Basic Salary</th>
                                <th scope="col">Absence</th>
                                <th scope="col">Overtime</th>

                                <th scope="col">Total Salary</th>
                                <th scope="col">Date</th>

                                <th scope="col">Delete</th>

                            </tr>
                        </thead>



                        <tbody>
                            @if (count($salaries) > 0)

                                @foreach ($salaries as $salary)
                                    <tr>
                                        <td>
                                            {{ $salary['user_id'] }}
                                        </td>
                                        <td>
                                            {{ $salary->user->name }}
                                        </td>
                                        <td>

                                            {{ $salary->basic_salary }}

                                        </td>
                                        <td>
                                            {{ $salary->absence }}
                                        </td>
                                        <td>
                                            {{ $salary->overtime }}
                                        </td>
                                        <td>
                                            {{ $salary->total_salary }}

                                        </td>
                                        <td>
                                            {{ $salary->date }}

                                        </td>
                                        <td>
                                            <a href="{{ route('delete_salary', $salary->id) }}"
                                                class="btn btn-danger ">Delete</a>
                                        </td>


                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center; font-size: 30px">There are no Salaries To
                                        Display</td>
                                </tr>

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
