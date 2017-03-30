<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use URL;

class EmployeeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('owner');
    }

    public function index() {
     return view('addnewemp');
       }

       public function manage() {
         $employees = DB::select('SELECT * FROM employees');

         return view('manageemp', [
                'employees' => $employees,
           ]);
     }


    public function create(Request $data) {

      $messages = ['mobile.regex' => "Please enter a valid mobile number. Eg. 04********"];
      $this->validate($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:employees',
          'mobile' => 'required|regex:/^04[0-9]{8}$/',
          'street' => 'required|max:255',
          'city' => 'required|max:255',
     ],$messages);


      Employee::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'mobile' => $data['mobile'],
          'street' => $data['street'],
          'city' => $data['city'],
      ]);

      Session::flash('success', $data['name'] . " successful created!");
      return redirect(route('add_employee'));
    }


    public function page(Request $data, $id) {
       $employees = Employee::find($id);
       $availability = DB::select('SELECT * FROM employee_times WHERE employee_id = ?', [$id]);

       return view('employee', [
         'employees' => $employees,
         'availability' => $availability,
       ]);
     }

    public function delete(Request $data, $id) {
      $deleted = DB::delete('DELETE FROM employees WHERE id = ?', [$id]);

      Session::flash('deleted', "Employee " . $id . " successful deleted!");
         return redirect(route('manage_employee'));

    }

    public function createAvailability(Request $data) {
      $employee = Employee::find($data['employee_id']);

      $employee->workingTime()->create([
        'day' => $data['day'],
        'start' => $data['start'],
        'end' => $data['end'],
      ]);

      Session::flash('success', "Time : " . $data['start'] . " to " . $data['end'] . " successful added!");
       return redirect(URL::previous());
    }

    public function deleteAvailability(Request $data, $id) {
      $deleted = DB::delete('DELETE FROM employee_times WHERE id = ?', [$id]);

      Session::flash('deleted', "Time successful deleted!");
             return redirect(URL::previous());

    }
}
