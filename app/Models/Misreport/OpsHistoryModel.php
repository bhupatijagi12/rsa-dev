<?php

namespace App\Models\Misreport;

use CodeIgniter\Model;

class OpsHistoryModel extends Model
{
    protected $table = 'operations_history_detail';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'ops_id',
        'remarks',
        'status'
    ];

}

    ?>