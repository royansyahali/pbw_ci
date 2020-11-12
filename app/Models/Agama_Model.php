<?php namespace App\Models;

use CodeIgniter\Model;

class Agama_Model extends Model
{
    protected $table      = 'agama';
    protected $primaryKey = 'kode_agama';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['agama'];

}