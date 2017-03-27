<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::select('SELECT * FROM users');
        $employees = DB::select('SELECT * FROM employees');
        $employeeTimes = DB::select('SELECT * FROM employee_times');

        return view('debug', [
          'users' => $users,
          'employees' => $employees,
          'employeeTimes' => $employeeTimes,
        ]);
    }

    public function swapRole(Request $request, $id) {

        $affected = DB::update('UPDATE users SET owner = (owner-1)*-1 where id = ?', [$id]);

        return redirect('/debug');
    }


}
