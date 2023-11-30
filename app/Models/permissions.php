<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class permissions extends \Spatie\Permission\Models\Permission
{
    // use HasFactory ,HasRoles;
    // protected $fillable = ['id','name','guard_name','updated_at','created _at'];
}
