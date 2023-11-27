<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\Contracts\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Users extends Model
{
    use HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name','email','updated_at','password'];

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

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    public function owner(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(project::class, 'owner_id', 'id');
    }

    public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\project::class, 'projects_user', 'users_id', 'projects_id' );
    }

    public function ticketsOwned(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(tickets::class, 'owner_id', 'id');
    }

    public function ticketsResponsible(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(tickets::class, 'team_id', 'id');
    }

    public function projects()
    {
        return $this->belongsToMany(\App\Models\project::class, 'users_id', 'projects_id');
    }

    public function users()
    {
        return $this->belongsToMany(\App\Models\project::class, 'users_id', 'projects_id');
    }
    // public function tickets(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    // {
    //     // return $this->belongsToMany(\App\Models\Ticket::class, 'users_has_tickets');
    //     return $this->belongsToMany(\App\Models\Todo::class, 'users_has_tickets', 'tickets_id', 'users_id');
    // }
    
    // public function team(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    // {
    //     return $this->belongsToMany(tickets::class, 'users_id');
    // }
<<<<<<< HEAD
=======
=======
    // public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(\App\Models\Project_user::class, 'users_id');
    // }
    // public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(\App\Models\project::class, 'projects_user' ,'users_id', 'projects_id');
    // }
    public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\projects_user::class, 'users_id');
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
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
   
         // public function projectsUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(\App\Models\Project_user::class, 'users_id');
    // }

}

