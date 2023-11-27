<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_statuses extends Model
{
    use HasFactory;

    public $table = 'project_statuses';

    public $fillable = [
        'name',
        'color',
        'is_default'
    ];

    protected $casts = [
        'name' => 'string',
        'color' => 'string',
        'is_default' => 'boolean'
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:255',
        'is_default' => 'nullable|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function projects(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\project::class, 'project_statuses_id');
    }
}
