<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_profile';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'email',
                                    'gender',
                                    'ip',
                                    'age',
                                    'religion',
                                    'birthday',
                                    'civil_status',
                                    'nationality',
                                    'birthplace',
                                    'street',
                                    'baranggay',
                                    'city',
                                    'prov_add',
                                    'zipcode',
                                    'contact',
                                    'father_name',
                                    'father_occupation',
                                    'father_address',
                                    'father_contact',
                                    'mother_name',
                                    'mother_occupation',
                                    'mother_address',
                                    'mother_contact',
                                    'guardian_name',
                                    'guardian_occupation',
                                    'guardian_contact',
                                    'guardian_address',
                                    'elem_school',
                                    'elem_address',
                                    'elem_year',
                                    'high_school',
                                    'high_address',
                                    'high_year',
                                    'senior_high_school',
                                    'senior_high_address',
                                    'senior_high_year',

                                ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


}
