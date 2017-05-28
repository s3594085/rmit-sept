<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Business;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use URL;

class EmployeeController extends Controller
{
    //Only allow owner to access EmployeeController
    public function __construct()
    {
        $this->middleware('owner');
    }

    //Add new employee views
    public function index() {
      return view('addnewemp');
    }

    //Manage employee view
    public function manageEmployee() {
      $employees = DB::select('SELECT * FROM employees WHERE business_id = ?', [session('business')]);

      return view('manageemp', [
        'employees' => $employees,
      ]);
    }

    //Employee personal view
    public function employeePage(Request $data, $id) {
      $employees = Employee::find($id);
      $availability = DB::select('SELECT * FROM employee_times WHERE employee_id = ?', [$id]);

      return view('employee', [
        'employees' => $employees,
        'availability' => $availability,
      ]);
    }

    //Create employee function
    public function createEmployee(Request $data) {
      $valid = Employee::validator($data->all());

      if ($valid->passes()) {
        Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'street' => $data['street'],
            'city' => $data['city'],
            'business_id' => session('business'),
        ]);

        Session::flash('success', $data['name'] . " successful created!");
        return redirect(route('add_employee'));
      } else {
        return redirect(route('add_employee'))->withErrors($valid)->withInput();
      }

    }

    //Delete employee function
    public function deleteEmployee(Request $data, $id) {
      $deleted = DB::delete('DELETE FROM employees WHERE id = ?', [$id]);

      Session::flash('deleted', "Employee " . $id . " successful deleted!");
      return redirect(route('manage_employee'));
    }

    //Create employee availability function
    public function createAvailability(Request $data) {
      $availabilityExist = TRUE;
      $business = Business::find(session('business'));
      $existingTimes = DB::select('SELECT * FROM employee_times WHERE employee_id = ?', [$data['employee_id']]);

      if ((strtotime($data['start']) < strtotime($business->start) || strtotime($data['end']) > strtotime($business->end))) {

          Session::flash('fail', "Business Operating Hour : " . $business->start . " to " .$business->end . " !");

      } else {
        foreach ($existingTimes as $key => $existingTime) {

          if ((strtotime($data['start']) > strtotime($existingTime->start) && strtotime($data['start']) < strtotime($existingTime->end))
              || (strtotime($data['end']) > strtotime($existingTime->start) && strtotime($data['end']) < strtotime($existingTime->end))
              || strtotime($data['start']) == strtotime($existingTime->start) && strtotime($data['end']) == strtotime($existingTime->end)) {

            if ($existingTime->day == $data['day']) {
              $availabilityExist = FALSE;
              break;
            }
          }

        }

        if ($availabilityExist) {
          $employee = Employee::find($data['employee_id']);

          $employee->workingTime()->create([
            'day' => $data['day'],
            'start' => $data['start'],
            'end' => $data['end'],
          ]);

          Session::flash('success', "Time : " . $data['start'] . " to " . $data['end'] . " successful added!");
        } else {
          Session::flash('fail', "Time : " . $data['start'] . " to " . $data['end'] . " range already exist!");
        }
      }

      return redirect(URL::previous());
    }

    //Delete employee availability function
    public function deleteAvailability(Request $data, $id) {
      $deleted = DB::delete('DELETE FROM employee_times WHERE id = ?', [$id]);

      Session::flash('deleted', "Time successful deleted!");
      return redirect(URL::previous());
    }
}
