<?php

namespace App\Models;

use App\Traits\HasPackages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageStatus extends Model
{
    use HasFactory;
    use HasPackages;

    protected $table = 'package_statuses';

    protected $fillable = ['name'];


}
