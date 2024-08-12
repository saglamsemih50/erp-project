<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        return view("pages.employee.index");
    }

    public function create()
    {
        return view("pages.employee.ajax.create");
    }


    public function store(Request $request)
    {
        dd($request->all());
        return redirect()->route("employee.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }


    public function show(string $id)
    {
        return view("pages.employee.ajax.show");
    }


    public function edit(string $id)
    {
        return view("pages.employee.ajax.edit");
    }


    public function update(Request $request, string $id)
    {
        dd($request->all());
        return redirect()->route("employee.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete(string $id)
    {
        return redirect()->route("employee.index")->with("success", "Delete Employee")->with("alert-type", "success");
    }
}
