<?php

namespace App\Models;

use CodeIgniter\Model;

class DealerDocsModel extends Model
{
    protected $table = 'dealers_doc';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'dealer_id',
        'agreement',
        'pan',
        'msme',
        'gst',
        'cancelled_cheque'
    ];
}