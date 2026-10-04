<?php

namespace App\Models;

use CodeIgniter\Model;

class DealerModel extends Model
{
    protected $table = 'dealers';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'dealer_code',
        'mobile',
        'email',
        'password',
        'otp',
        'otp_expiry',
        'status',
        'is_first_loggged_in',
        'pan_number',
        'rm_name',
        'referred_by',
        'account_holder_name',
        'account_number',
        'ifsc_code',
        'bank_name',
        'contact_person',
        'payment_mode',
        'dealer_payment'

    ];
}