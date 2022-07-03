<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'item',
        'driver_id',
        'Quantity',
        'states',
        'kind'
    ];



    public function getdrive(){
        return $this->belongsTo(Driver::class, 'driver_id', 'id');

    }
}
