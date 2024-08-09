<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {

        return view("pages.department.index");
    }


    public function create()
    {
        return view("pages.department.ajax.create");
    }

    public function store(Request $request)
    {

        return redirect()->route("department.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }

    public function show(string $id)
    {
        return view("pages.department.ajax.show");
    }

    public function edit(string $id)
    {
        return view("pages.department.ajax.edit");
    }


    public function update(Request $request, string $id)
    {
        return redirect()->route("department.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete(string $id)
    {
        return redirect()->route("department.index")->with("success", "Delete Notice")->with("alert-type", "success");
    }
}
