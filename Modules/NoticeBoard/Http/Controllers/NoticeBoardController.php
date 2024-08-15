<?php

namespace Modules\NoticeBoard\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\NoticeBoard\Entities\NoticeBoard;

class NoticeBoardController extends Controller
{

    public function index()
    {

        $notices = NoticeBoard::with('department', 'employee')->get();

        return view('noticeboard::pages.notice.index', compact("notices"));
    }


    public function create()
    {
        $departments = Department::all();
        return view('noticeboard::pages.notice.ajax.create', compact("departments"));
    }
    public function store(Request $request)
    {
        $notices = NoticeBoard::findOrNew($request->id);
        $notices->company_id = 1;
        $notices->user_id = 3;
        $notices->departman_id = $request->departman_id;
        $notices->title = $request->title;
        $notices->description = $request->description;
        $employees = $request->employee_id;
        $notices->save();
        if (!empty($employees)) {
            $notices->employee()->attach($employees);
        }
        $employeeNames = Employee::whereIn('id', $employees)->pluck('name')->toArray();
        $employeeNamesString = implode(', ', $employeeNames);
        $message = $notices->title . ' konulu bildirim başarılı bir şekilde ';
        $message .= (count($employeeNames) === 1) ? $employeeNamesString . ' isimli çalışanına gönderildi' : $employeeNamesString . ' isimli çalışanlarına gönderildi';
        return redirect()->route("notice")->with("succes", "Veri Tabanına Başarıyla kaydedildi")->with('alert-type', 'success')->with('message', $message);
    }

    public function show($id)
    {
        $notice = NoticeBoard::with("employee", "department", "user")->findOrFail($id);


        return view('noticeboard::pages.notice.ajax.show', compact("notice"));
    }


    public function edit($id)
    {
        $notices = NoticeBoard::with('employee', 'department', 'user')->findOrFail($id);
        $departments = Department::all();
        $departmentId = $notices->departman_id;
        $employees = Employee::where('departman_id', $departmentId)->get();
        return view('noticeboard::pages.notice.ajax.edit', compact("notices", "departments", "employees"));
    }


    public function update(Request $request)
    {

        $notices = NoticeBoard::findOrNew($request->id);
        $notices->company_id = 1;
        $notices->user_id = 3;
        $notices->departman_id = $request->departman_id;
        $notices->title = $request->title;
        $notices->description = $request->description;
        $employees = $request->employee_id;
        $notices->save();
        if (!empty($employees)) {
            $notices->employee()->sync($employees);
        }

        return redirect()->route("notice")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete($id)
    {
        $notice = NoticeBoard::findOrFail($id);
        $notice->delete();
        return redirect()->route("notice")->with("success", "Delete Notice")->with("alert-type", "success");
    }
    public function getEmployeesByDepartment(Request $request)
    {
        $departmentId = $request->department_id;
        $employees = Employee::where("departman_id", $departmentId)->get(["id", "name"]);
        return response()->json(["employees" => $employees]);
    }
}
