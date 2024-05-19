<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table      = 'tb_rooms';
    protected $primaryKey = 'room_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['room_id', 'room_code', 'room_name', 'room_floor', 'building_code', 'room_capacity'];
}
