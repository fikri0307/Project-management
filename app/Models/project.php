<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class project extends Model
{
    use HasFactory, SoftDeletes;
    
    public $table = 'projects';

    protected $fillable = [
    'name',
    'description',
    'owner_id',
    'project_statuses_id'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'projectUsers' => 'array'
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'owner_id' => 'nullable',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'project_statuses_id' => 'required',
        'projectUsers' => 'required'
    ];
    public static function boot() {
        
        parent::boot();

        static::saved(function (project $item) {
            if ($item->project_statuses_id) {
                $query = project::where('id', '<>', $item->id)
                    ->where('Done', true);
            }
        });

    }

    public function projectStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Project_statuses::class, 'project_statuses_id');
    }

    // public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(\App\Models\projects_user::class, 'projects_id', 'users_id');
    // }
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

    
}