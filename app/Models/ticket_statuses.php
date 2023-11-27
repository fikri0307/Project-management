<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket_statuses extends Model
{
    use HasFactory;

    public $table = 'ticket_statuses';

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
        'updated_at' => 'nullable',
    ];

    public static function boot() {
        
        parent::boot();

        static::saved(function (ticket_statuses $item) {
            if ($item->is_default) {
                $query = ticket_statuses::where('id', '<>', $item->id)
                    ->where('is_default', true);
            }
        });

    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        // return $this->hasMany(\App\Models\Ticket::class, 'ticket_statuses_id');
        return $this->hasMany(\App\Models\tickets::class, 'ticket_statuses_id', 'id');
    }
}
