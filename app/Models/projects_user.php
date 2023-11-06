<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class projects_user extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','updated_at','created _at','deleted_at','users_id','projects_id'];

    public function owner(): BelongsTo
    {

        return $this->belongsTo(users::class,"users_id");
    }
    
    public function Projects(): BelongsTo
    {

        return $this->belongsTo(project::class,"projects_id");
    }

}
