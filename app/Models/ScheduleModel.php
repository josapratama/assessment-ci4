<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table      = 'tb_schedules';
    protected $primaryKey = 'schedule_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['schedule_id', 'room_code', 'location', 'capacity'];
}
