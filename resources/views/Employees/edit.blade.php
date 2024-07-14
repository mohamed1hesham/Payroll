@extends('layout')

@section('content')

    <div class="card">

        <div class="card-header">New Employee</div>

        <div class="card-body">

            <div class="div_btns">
                @if (auth()->user())
                    <a href="{{ route('show_all') }}"><button class="btn btn-dark">back</button></a>
                    <a href="{{ route('logout') }}"><button class="btn btn-danger">LogOut</button></a>
                @else
                    <a href="{{ route('login') }}" class="btns"><button class="btn btn-primary">Login</button></a>
                    <a href="/reg" class="btns"><button class="btn btn-dark">Signup</button></a>
                @endif

            </div>
            <br><br>
            <div>

                <div class="card-body">
                    <h1>Create or Edit On Salary</h1>
                    <br>
                    <h3>
                        <h3>{{ $employee->name }} </h3>
                        @if ($employee->salary)
                            <h4>{{ $employee->salary->salary }}</h4>
                        @endif
                        <form action="{{ route('add_salary', $employee->id) }}" method="post">
                            @csrf
                            Basic Salary
                            <input type="text" name="basic_salary">

                            Absence
                            <input type="text" name="absence">

                            OverTime
                            <input type="text" name="overtime">

                            Date
                            <input type="month" id="date" name="date">

                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </h3>

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

                </div>

            </div>

        </div>
    </div>
    <script>
        function updateDate(input) {
            var selectedDate = new Date(input.value);
            var year = selectedDate.getFullYear();
            var month = selectedDate.getMonth() + 1; // JavaScript months are 0-based

            // Set the value of the input to the selected year and month
            input.value = year + '-' + (month < 10 ? '0' : '') + month;
        }
    </script>
@stop
