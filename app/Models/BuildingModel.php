<?php

namespace App\Models;

use CodeIgniter\Model;

class BuildingModel extends Model
{
    protected $table      = 'tb_buildings';
    protected $primaryKey = 'building_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['building_id', 'building_code', 'building_name', 'total_floor', 'total_room'];
}
