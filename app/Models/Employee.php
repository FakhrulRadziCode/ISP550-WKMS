<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'is_admin',
        'hire_date',
        'employment_type',
        'password',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
