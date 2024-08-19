<?php

namespace Modules\Task\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskCategory;
use Modules\Task\Enums\Status;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('employees')->get();
        return view('task::pages.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $departments = Department::all();
        $taskCategories = TaskCategory::all();
        return view('task::pages.tasks.ajax.create', compact("departments", "taskCategories"));
    }

    public function store(Request $request)
    {
        $task = Task::findOrNew($request->id);
        $task->company_id = 1;
        $task->user_id = 3;
        $task->department_id = $request->department_id;
        $employees = $request->employee_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->start_date = parseDateOrNull($request->start_date, $task->start_date, 'd-m-Y', true);
        $task->end_date = parseDateOrNull($request->end_date, $task->end_date, 'd-m-Y', true);
        $task->task_category_id = $request->task_category_id;
        $task->save();
        if (!empty($employees)) {
            $task->employees()->attach($employees);
        }
        return redirect()->route('tasks.index')->with('success', 'Veri Tabanına Kaydedildi')->with('alert-type', 'success');
    }

    public function show($id)
    {
        $task = Task::with('employees', 'user', 'taskCategory')->findOrFail($id);
        return view('task::pages.tasks.ajax.show', compact('task'));
    }

    public function edit($id)
    {

        $categories = TaskCategory::all();
        $task = Task::with('taskCategory', 'employees', 'department')->findOrFail($id);
        $departments = Department::all();
        $departmentId = $task->department_id;
        $employees = Employee::where('departman_id', $departmentId)->get();
        $statuses = Status::cases();

        return view('task::pages.tasks.ajax.edit', compact("departments", "task", "categories", "employees", "statuses"));
    }
    public function update(Request $request, $id)
    {
        $task = Task::findOrNew($request->id);
        $task->company_id = 1;
        $task->user_id = 3;
        $task->department_id = $request->department_id;
        $employees = $request->employee_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->start_date = parseDateOrNull($request->start_date, null, 'd-m-Y', true);
        $task->end_date = parseDateOrNull($request->end_date, null, 'd-m-Y', true);
        $task->task_category_id = $request->task_category_id;
        $task->status = $request->status;
        $task->save();
        if (!empty($employees)) {
            $task->employees()->sync($employees);
        }
        return redirect()->route("tasks.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route("tasks.index")->with("success", "Delete Task")->with("alert-type", "success");
    }
    public function getEmployeesByDepartment(Request $request)
    {
        $departmentId = $request->department_id;
        $employees = Employee::where('departman_id', $departmentId)->get(['id', 'name']);
        return response()->json(['employees' => $employees]);
    }
}
