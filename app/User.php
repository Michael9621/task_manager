<?php

namespace App;

use App\Notifications\verifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }
     public function clients()
    {
        return $this->hasMany(Client::class);
    }
     public function job()
    {
        return $this->hasMany(Job::class);
    }
     public function verified()
    {
        return $this->token === null;
    }

    public function sendVerificationEmail()
    {
        $this->notify(new verifyEmail($this));
    }
}
