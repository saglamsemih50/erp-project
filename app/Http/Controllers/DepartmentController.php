<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view("pages.department.index", compact("departments"));
    }

    public function create()
    {
        return view("pages.department.ajax.create");
    }

    public function store(Request $request)
    {
        $department = Department::findOrNew($request->id);
        $department->company_id = 1;
        $department->name = $request->department_name;
        $department->save();
        return redirect()->route("department.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }

    public function show(string $id)
    {
        $department = Department::findOrFail($id);

        return view("pages.department.ajax.show", compact("department"));
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view("pages.department.ajax.edit", compact("department"));
    }

    public function update(Request $request, string $id)
    {
        $department = Department::findOrNew($id);
        $department->company_id = 1;
        $department->name = $request->department_name;
        $department->save();
        return redirect()->route("department.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route("department.index")->with("success", "Delete Department")->with("alert-type", "success");
    }
}
