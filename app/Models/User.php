<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute( $password )
    {
        $this->attributes['password'] = bcrypt( $password );
    }

    public function messages()
    {
        return $this->hasMany( Message::class );
    }


    public function rols()
    {
        return $this->belongsToMany( Rol::class );
        // return $this->belongsTo( Rol::class );
    }


    public function hasRoles( array $rols ) : bool
    {
        return $this->rols->pluck('name')->intersect( $rols )->count();
        // foreach ($rolss as $rol)
        // {
        //     return $this->rolss->pluck('name')->contains( $rol );
        //     // foreach ( $this->rols as $userRole )
        //     // {
        //     //     if ( $userRole->name === $rol )
        //     //     {
        //     //         return true;
        //     //     }
        //     // }
        // }
        // return false;
    }


    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }
}
