<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    public function LoginUser($email, $password)
    {
        return $this->where('email', $email)
            ->where('password', $password)
            ->first();
    }
}
