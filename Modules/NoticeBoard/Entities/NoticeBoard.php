<?php

namespace Modules\NoticeBoard\Entities;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoticeBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'departman_id',
        'title',
        'description'

    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departman_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class, 'employee_notice', 'notice_id', 'employee_id');
    }
}
