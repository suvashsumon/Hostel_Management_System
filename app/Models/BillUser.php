<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillUser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function bill()
    {
        return $this->hasOne('App\Models\Bill', 'id', 'bill_id');
    }
}
