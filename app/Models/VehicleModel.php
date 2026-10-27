<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicle_variants';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function getAllVehicles()
    {
        return $this->db->table('vehicle_variants vv')
            ->select('
                vv.id,
                vmk.make_name,
                vmd.model_name,
                vv.variant_name,
                vv.fuel_type,
                vv.transmission
            ')
            ->join('vehicle_models vmd', 'vmd.id = vv.model_id')
            ->join('vehicle_makes vmk', 'vmk.id = vmd.make_id')
            ->orderBy('vmk.make_name', 'ASC')
            ->orderBy('vmd.model_name', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getMakes($vehicleType = null)
    {
        $builder = $this->db->table('vehicle_makes');

        if (!empty($vehicleType)) {
            $builder->where('vehicle_type', $vehicleType);
        }

        return $builder->get()->getResultArray();
    }

    public function getModels($makeId)
    {
        return $this->db->table('vehicle_models')
            ->where('make_id', $makeId)
            ->get()
            ->getResultArray();
    }

    public function getVariants($modelId)
    {
        return $this->db->table('vehicle_variants')
            ->where('model_id', $modelId)
            ->get()
            ->getResultArray();
    }

    public function getVehicleDetails($variantId)
    {
        return $this->db->table('vehicle_variants vv')
            ->select('
                vv.*,
                vmd.model_name,
                vmk.make_name,
                vmk.vehicle_type
            ')
            ->join('vehicle_models vmd', 'vmd.id = vv.model_id')
            ->join('vehicle_makes vmk', 'vmk.id = vmd.make_id')
            ->where('vv.id', $variantId)
            ->get()
            ->getRowArray();
    }

    public function getVehicleCategory()
    {
         return $this->db->table('vehicle_makes')
            ->distinct('vehicle_type')
            ->groupBy('vehicle_type')
            ->get()
            ->getResultArray();
    }
}