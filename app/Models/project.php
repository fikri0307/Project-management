<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class project extends Model
{
    use HasFactory;
    
    public $table = 'projects';

    protected $fillable = [
    'name',
    'description',
    'owner_id',
    'project_statuses_id',
    'projects_user'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'projects_user' => 'array'
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'owner_id' => 'nullable',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'project_statuses_id' => 'required'
    ];

    public function projectStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Project_statuses::class, 'project_statuses_id');
    }

    // public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(\App\Models\projects_user::class, 'projects_id', 'users_id');
    // }
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

    
}