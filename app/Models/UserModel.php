<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user_tbl';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['lrn','lastname', 'firstname', 'middlename', 'email', 'password', 'token', 'reset_token', 'reset_timestamp', 'status', 'usertype'];


}
