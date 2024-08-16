<?php

namespace Modules\Task\Entities;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'task_category_id',
        'department_id',
        'status',
        'completed_on',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departman_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function taskCategory()
    {
        return $this->belongsTo(TaskCategory::class, 'task_category_id');
    }
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_task', 'task_id', 'employee_id');
    }
}
