<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\NoticeBoard\Entities\NoticeBoard;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_id',
        'name',
        'email',
        'password',
        'img',
        'departman_id',
        'country',
        'mobile',
        'date_of_birth',
        'gender',
        'joining_date',
        'martial_status',
        'about',
        'address',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, "departman_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function notices()
    {
        return $this->belongsToMany(NoticeBoard::class, 'employee_notice', 'employee_id', 'notice_id');
    }
    public function tasks()
    {
        return $this->belongsToMany(NoticeBoard::class, 'employee_task', 'employee_id', 'task_id');
    }
}
