<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class projects_user extends Model
{
    use HasFactory;

    public $table = 'projects_user';

    protected $fillable = [
        'users_id',
        'projects_id'
    ];

    public static array $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'users_id' => 'required',
        'projects_id' => 'required'
    ];

    public function projects(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
<<<<<<< HEAD
        return $this->belongsTo(\App\Models\project::class, 'projects_id');
=======
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
    }

    // public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->belongsTo(\App\Models\User::class, 'users_id');
    // }
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Users::class, 'users_id');
<<<<<<< HEAD
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Users::class, 'team_id', 'id');
    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'owner_id', 'id');
=======
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
    }

}
