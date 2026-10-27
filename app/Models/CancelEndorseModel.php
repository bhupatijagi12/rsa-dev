<?php
namespace App\Models;

use App\Models\CustomizedDealerPlanModel;
use App\Models\GAAProductPlanModel;
use App\Models\Policy\PolicyModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\DealerModel;

use CodeIgniter\Model;
class CancelEndorseModel extends Model
{
    protected $table = 'endorse_cancel_details';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'dealer_id',
        'policy_id',
        'updated_by',
        'type',
        'details'
    ];

}

?>