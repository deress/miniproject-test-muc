<?php

namespace App\Models\activity;

use App\Models\hrd\EmployeesModel;
use App\Models\marketing\ServiceusedModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql_activity';
    protected $table = 'timesheet';

    protected $fillable = [
        'employees_id',
        'serviceused_id',
        'date',
        'timestart',
        'timefinish',
        'description'
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeesModel::class, 'employees_id');
    }

    public function serviceused()
    {
        return $this->belongsTo(ServiceusedModel::class, 'serviceused_id');
    }

    public function getTotalHoursAttribute()
    {
        $start = Carbon::parse($this->timestart);
        $end = Carbon::parse($this->timefinish);

        return $start->diff($end)->format('%H:%I');
    }
}
