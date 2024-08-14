<?php

namespace Modules\NoticeBoard\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NoticeBoardController extends Controller
{

    public function index()
    {
        return view('noticeboard::pages.notice.index');
    }


    public function create()
    {
        $departments = Department::all();
        return view('noticeboard::pages.notice.ajax.create', compact("departments"));
    }
    public function store(Request $request)
    {

        return redirect()->route("notice")->with("succes", "Veri Tabanına Başarıyla kaydedildi")->with('alert-type', 'success');
    }


    public function show($id)
    {
        return view('noticeboard::pages.notice.ajax.show');
    }


    public function edit($id)
    {
        return view('noticeboard::pages.notice.ajax.edit');
    }


    public function update(Request $request, $id)
    {

        return redirect()->route("notice")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete($id)
    {
        return redirect()->route("notice")->with("success", "Delete Notice")->with("alert-type", "success");
    }
    public function getEmployeesByDepartment(Request $request)
    {
        $departmentId = $request->department_id;
        $employees = Employee::where("departman_id", $departmentId)->get(["id", "name"]);
        return response()->json(["employees" => $employees]);
    }
}
