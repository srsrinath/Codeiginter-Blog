<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{

    protected $table            = 'categories';
    protected $primaryKey       = 'c_id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['name','created_at'];
    protected $createdField  = 'created_at';

    // Callbacks
    protected $allowCallbacks = true;
}
