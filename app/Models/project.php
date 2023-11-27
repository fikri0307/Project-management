<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class project extends Model
{
<<<<<<< HEAD
    use HasFactory, SoftDeletes;
=======
<<<<<<< HEAD
    use HasFactory, SoftDeletes;
=======
    use HasFactory;
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    
    public $table = 'projects';

    protected $fillable = [
    'name',
    'description',
    'owner_id',
<<<<<<< HEAD
    'project_statuses_id'
=======
<<<<<<< HEAD
    'project_statuses_id'
=======
    'project_statuses_id',
    'projects_user'
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
<<<<<<< HEAD
        'projectUsers' => 'array'
=======
<<<<<<< HEAD
        'projectUsers' => 'array'
=======
        'projects_user' => 'array'
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'owner_id' => 'nullable',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
<<<<<<< HEAD
        'project_statuses_id' => 'required',
        'projectUsers' => 'required'
=======
<<<<<<< HEAD
        'project_statuses_id' => 'required',
        'projectUsers' => 'required'
=======
        'project_statuses_id' => 'required'
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    ];

    public function projectStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Project_statuses::class, 'project_statuses_id');
    }

    // public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(\App\Models\projects_user::class, 'projects_id', 'users_id');
    // }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Users::class, 'projects_user' ,'projects_id', 'users_id');
    }

    public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\project::class, 'projects_user', 'projects_id', 'users_id');
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\tickets::class, 'projects_id', 'id');
    }
    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Users::class, 'owner_id', 'id');
    }

<<<<<<< HEAD
=======
=======
    // public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    // {
    //     return $this->belongsToMany(\App\Models\Users::class, 'projects_user' ,'projects_id', 'users_id');
    // }
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Users::class, 'users_id' ,'projects_id');
    }
    public function projectusers(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\projects_user::class, 'users_id' ,'projects_id');
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        // return $this->hasMany(\App\Models\Ticket::class, 'projects_id');
        return $this->hasMany(\App\Models\Todo::class, 'projects_id');
    }
    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'owner_id', 'id');
    }

>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    
}