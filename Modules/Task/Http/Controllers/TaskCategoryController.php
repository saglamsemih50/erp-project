<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\TaskCategory;

class TaskCategoryController extends Controller
{

    public function index()
    {
        $taskCategories = TaskCategory::all();
        return view('task::pages.task-category.index', compact("taskCategories"));
    }

    public function create()
    {
        return view('task::pages.task-category.ajax.create');
    }

    public function store(Request $request)
    {
        $taskCategory = TaskCategory::findOrNew($request->id);
        $taskCategory->company_id = 1;
        $taskCategory->user_id = 3;
        $taskCategory->category_name = $request->category_name;

        $taskCategory->save();
        return redirect()->route("task-category.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }


    public function show($id)
    {
        $taskCategory = TaskCategory::findOrFail($id);

        return view('task::pages.task-category.ajax.show', compact('taskCategory'));
    }


    public function edit($id)
    {

        $taskCategory = TaskCategory::findOrFail($id);

        return view('task::pages.task-category.ajax.edit', compact('taskCategory'));
    }

    public function update(Request $request, $id)
    {
        $taskCategory = TaskCategory::findOrNew($request->id);
        $taskCategory->company_id = 1;
        $taskCategory->user_id = 3;
        $taskCategory->category_name = $request->category_name;
        $taskCategory->save();
        return redirect()->route("task-category.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }


    public function delete($id)
    {
        $taskCategory = TaskCategory::findOrFail($id);
        $taskCategory->delete();
        return redirect()->route("task-category.index")->with("success", "Delete Task Category")->with("alert-type", "success");
    }
}
