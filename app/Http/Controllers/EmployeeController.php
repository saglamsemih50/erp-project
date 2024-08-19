<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view("pages.employee.index", compact("employees"));
    }

    public function create()
    {
        $this->departments = Department::all();
        $this->genders = Gender::cases();
        $this->martialStatus = MaritalStatus::cases();
        return view("pages.employee.ajax.create", $this->data);
    }


    public function store(Request $request)
    {
        $employee = Employee::findOrNew($request->id);
        $employee->company_id = 1;
        $employee->user_id = 3;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->departman_id = $request->departman;
        $employee->country = $request->country;
        $employee->mobile = $request->mobile;
        $employee->gender = $request->gender;
        $employee->date_of_birth = parseDateOrNull($request->date_of_birth, $employee->date_of_birth, 'd-m-Y', false);
        $employee->joining_date = parseDateOrNull($request->joining_date, $employee->joining_date, 'd-m-Y', false);
        $employee->martial_status = $request->martial_status;
        $employee->about = $request->about;
        $employee->address = $request->address;
        $employee->status = $request->status;
        if ($request->hasFile('image')) {
            $file_name = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/img', $file_name);
            $imagePath = 'img/' . $file_name;
            $employee->img = $imagePath;
        }
        $employee->save();

        return redirect()->route("employee.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }


    public function show(string $id)
    {
        $employee = Employee::with('department', 'user')->findOrFail($id);
        $employee->date_of_birth = $employee->date_of_birth ? Carbon::parse($employee->date_of_birth) : null;
        $employee->joining_date = $employee->joining_date ? Carbon::parse($employee->joining_date) : null;
        return view("pages.employee.ajax.show", compact("employee"));
    }


    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);

        $departments = Department::all();

        return view("pages.employee.ajax.edit", compact("employee", "departments"));
    }


    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrNew($request->id);
        $employee->company_id = 1;
        $employee->user_id = 3;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = $request->password ? bcrypt($request->password) : $employee->password;
        $employee->departman_id = $request->departman;
        $employee->country = $request->country;
        $employee->mobile = $request->mobile;
        $employee->gender = $request->gender;
        $employee->date_of_birth = parseDateOrNull($request->date_of_birth, $employee->date_of_birth, 'd-m-Y', false);
        $employee->joining_date = parseDateOrNull($request->joining_date, $employee->joining_date, 'd-m-Y', false);
        $employee->martial_status = $request->martial_status;
        $employee->about = $request->about;
        $employee->address = $request->address;
        $employee->status = $request->status;
        if ($request->hasFile('image')) {
            if ($employee->img && Storage::disk('public')->exists($employee->img)) {
                Storage::disk('public')->delete($employee->img); //Degistirilen fotograf siliniyor
            }
            $file_name = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/img', $file_name);
            $imagePath = 'img/' . $file_name;
            $employee->img = $imagePath;
        }
        $employee->save();
        return redirect()->route("employee.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete(string $id)
    {
        $employee = Employee::findOrFail($id);
        $photoPath = ltrim($employee->img, '/');
        $employee->delete();
        if ($photoPath && Storage::disk('public')->exists($photoPath)) {
            Storage::disk('public')->delete($photoPath);
        } else {
            return redirect()->route("employee.index")->with("error", "Profil fotoğrafı bulunamadı.");
        }
        return redirect()->route("employee.index")->with("success", "Delete Employee")->with("alert-type", "success");
    }
}
