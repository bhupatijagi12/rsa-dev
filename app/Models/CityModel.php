<?php
namespace App\Models;

use CodeIgniter\Model;
class CityModel extends Model
{
    protected $table = 'city_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'city_name',
        'state_id',
        'pincode'
    ];

    public function getCityDetails($cityId)
    {
        return $this->db->table('city_master')
                ->select('city_master.*, states.state_name')
                ->join('states', 'states.id = city_master.state_id')
                ->where('city_master.id', $cityId)
                ->get()
                ->getRowArray();
    }
}

?>