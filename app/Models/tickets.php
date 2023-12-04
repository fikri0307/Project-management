<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class tickets extends Model
{
    use HasFactory;

    public $table = 'tickets';

    public $fillable = [
        'name',
        'content',
        'owner_id',
        'ticket_statuses_id',
        'projects_id',
        'team_id',
        'created_at',
        'complete_at'
        // 'code',
    ];

    protected $casts = [
        'name' => 'string',
        'content' => 'string',
        // 'code' => 'string'
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'content' => 'nullable|string',
        'owner_id' => 'nullable',
        'team_id' => 'nullable',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'complete_at' => 'nullable',
        'updated_at' => 'nullable',
        // 'code' => 'nullable|string|max:255',
        'ticket_statuses_id' => 'required',
        'projects_id' => 'required'
    ];

    public static function boot() {
        
        parent::boot();

        static::saved(function (tickets $item) {
            if ($item->ticket_statuses_id) {
                $query = tickets::where('id', '<>', $item->id)
                    ->where('Done', true);
            }
        });

    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Users::class, 'owner_id', 'id');
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Users::class, 'team_id', 'id');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\ticket_statuses::class, 'ticket_statuses_id', 'id');
    }

    public function projects(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\project::class, 'projects_id', 'id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Users::class, 'users_id');
    }
    
    // public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    // {
    //     return $this->belongsToMany(\App\Models\User::class, 'tickets_id', 'users_id');
    // }
    
}
