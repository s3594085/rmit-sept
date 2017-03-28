<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('owner');
    }

    public function create(Request $data) {
      Employee::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'mobile' => $data['mobile'],
          'street' => $data['street'],
          'city' => $data['city'],
      ]);

      return redirect('/debug');
    }

    public function delete(Request $data, $id) {
      $deleted = DB::delete('DELETE FROM employees WHERE id = ?', [$id]);


      return redirect('/debug');
    }

    public function createTime(Request $data) {
      $employee = Employee::find($data['employee_id']);

      return $employee->workingTime()->create([
        'day' => $data['day'],
        'start' => $data['start'],
        'end' => $data['end'],
      ]);

      return redirect('/debug');
    }

    public function deleteTime(Request $data, $id) {
      $deleted = DB::delete('DELETE FROM employee_times WHERE id = ?', [$id]);


      return redirect('/debug');
    }
}
