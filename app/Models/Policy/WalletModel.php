<?php

namespace App\Models\Policy;

use CodeIgniter\Model;

class WalletModel extends Model
{
    protected $table = 'wallet_transaction';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'amount',
        'dealer_id',
        'amount',
        'transaction_no',
        'file_upload',
        'transaction_type',
        'status',
        'updated_by',
        'updated_date'

    ];
}