<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(\App\Models\Project_user::class, 'users_id');
    // }
    public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\project::class, 'projects_user' ,'users_id', 'projects_id');
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // return $this->belongsToMany(\App\Models\Ticket::class, 'users_has_tickets');
        return $this->belongsToMany(\App\Models\Todo::class, 'users_has_tickets', 'tickets_id', 'users_id');
    }
    public function projects()
    {
        return $this->belongsToMany(\App\Models\Project::class, 'users_id', 'projects_id');
    }
}
