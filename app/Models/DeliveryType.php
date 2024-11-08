<?php

namespace App\Models;

use App\Traits\HasPackages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    use HasFactory;
    use HasPackages;

    protected $table = 'delivery_types';

    protected $fillable = ['name'];


}
