<?php

namespace Modules\Task\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{

    public function index()
    {
        return view('task::pages.tasks.index');
    }

    public function create()
    {

        $departments = Department::all();
        return view('task::pages.tasks.ajax.create', compact("departments"));
    }

    public function store(Request $request)
    {
        dd($request->all());
        return redirect()->route('tasks.index')->with('success', 'Veri Tabanına Kaydedildi')->with('alert-type', 'success');
    }


    public function show($id)
    {
        return view('task::pages.tasks.ajax.show');
    }

    public function edit($id)
    {
        $departments = Department::all();
        return view('task::pages.tasks.ajax.edit', compact("departments"));
    }

    public function update(Request $request, $id)
    {
        dd($request->all());

        return redirect()->route("tasks.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete($id)
    {
        return redirect()->route("tasks.index")->with("success", "Delete Task")->with("alert-type", "success");
    }
    public function getEmployeesByDepartment(Request $request)
    {
        $departmentId = $request->department_id;
        $employees = Employee::where('departman_id', $departmentId)->get(['id', 'name']);
        return response()->json(['employees' => $employees]);
    }
}
