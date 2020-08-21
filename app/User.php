<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'avatar', 'provider',];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function discussion()
    {
        return $this->hasMany('App\Discussion');
    }

    public function reply()
    {
        return $this->hasMany('App\Reply');
    }

    public function watcher()
    {
        return $this->hasMany('App\Watcher');
    }

    public function channel()
    {
        return $this->hasMany('App\Channel');
    }

    /*public function playlist()
    {
        return $this->hasMany('App\Playlist');
    }*/


    public function subscriber()
    {
        return $this->hasMany('App\Subscriber');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->first();
    }

    public function hasAnyRole()
    {
        return $this->roles()->where('name', 'admin')->first();
    }

    public function isInstructor(array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->first();
    }


}
