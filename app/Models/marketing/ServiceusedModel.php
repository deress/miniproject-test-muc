<?php

namespace App\Models\marketing;

use Carbon\Carbon;
use App\Models\activity\TimesheetModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceusedModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql_marketing';
    protected $table = 'serviceused'; // atau nama table yang sesuai

    protected $fillable = [
        'proposal_id',
        'service_name',
        'status'
    ];

    public function proposal()
    {
        return $this->belongsTo(ProposalModel::class, 'proposal_id');
    }

    public function timesheets()
    {
        return $this->hasMany(TimesheetModel::class, 'serviceused_id');
    }

    public function getTotalTimespentAttribute()
    {
        $totalSeconds = 0;

        foreach ($this->timesheets as $timesheet) {
            try {
                $start = Carbon::parse($timesheet->timestart);
                $end = Carbon::parse($timesheet->timefinish);

                $totalSeconds += $start->diffInSeconds($end);
            } catch (\Throwable $th) {
                continue;
            }
        }

        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds / 60) % 60);

        return sprintf('%02d:%02d', $hours, $minutes);
    }
}
