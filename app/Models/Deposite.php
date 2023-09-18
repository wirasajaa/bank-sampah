<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'type_id', 'qty', 'total'];

    public function type()
    {
        return $this->hasOne(TrashType::class, 'id', 'type_id');
    }
}
