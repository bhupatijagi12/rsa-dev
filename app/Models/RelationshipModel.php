<?php

namespace App\Models;

use CodeIgniter\Model;

class RelationshipModel extends Model
{
	protected $table = 'relationship_master';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'relationship_name',
        'status'
        ];
}

?>