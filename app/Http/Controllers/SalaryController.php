<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function create()
    {
        return view('Employees.create');
    }
    public function show()
    {

        return view('Employees.show', [
            'employee' => User::all(),
            'basic_salary' => Salary::all()
        ]);
    }

    public function edit(User $employee)
    {
        //$employee->salary ? dd(1) : dd(2);
        return view('Employees.edit', [
            'employee' => $employee,
            'salary' => $employee->salary ?? new Salary


            // $employee->salary ? :new Salary
        ]);
    }

    public function store(Request $request, User $employee)
    {

        $id = $employee->id;
        $data = $request->validate([
            'basic_salary' => ['required', 'numeric'],
            'absence' => ['nullable', 'numeric'],
            'overtime' => ['nullable', 'numeric'],
            'total_salary' => ['nullable', 'numeric'],
            'date' => ['required']
        ]);
        $data['total_salary'] = $data['basic_salary'];

        if ($data['absence'] > 0) {
            $data['total_salary'] -= $data['absence'];
        }
        if ($data['overtime'] > 0) {
            $data['total_salary'] += $data['overtime'];
        }
        Salary::updateOrCreate([
            'user_id' => $id,
            'date' => $data['date']
        ], [
            'user_id' => $id,
            'basic_salary' => $data['basic_salary'],
            'absence' => $data['absence'],
            'overtime' => $data['overtime'],
            'total_salary' => $data['total_salary'],
            'date' => $data['date']
        ]);
        //  dd($data['date']);
        return redirect()->route('show_all');
    }


    public function history(User $employee)
    {
        $salaries = Salary::where('user_id', $employee->id)->orderBy('date')->get();
        return view('Employees.history', ['salaries' => $salaries]);
    }

    public function delete_salary($id)
    {
        $salary = Salary::find($id);
        $salary->delete();
        return redirect()->back()->with('message', 'Salary deleted Successfully');
    }

    public function report(Request $request)
    {

        $date = $request->date;

        $employees = User::with(["salaries" => function ($q) use ($date) {
            $q->where("date", $date);
        }])->get();

        return view('Employees.report', [
            'employees' => $employees,  'date' => $date,
        ]);
    }
}
