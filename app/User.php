<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets(){
        return $this->hasMany(Tweet::class);
    }


    /**
     * gets the logged in users time line
     * @return mixed
     */
    public function timeline()
    {
        // All the users tweets and their followers tweets
        // Return them newest first

        $friends = $this->follows()->pluck('id');

        return Tweet::wherein('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->get();
    }

    /**
     * gets the users avatar
     * @return string
     */
    public function getAvatarAttribute($value)
    {
//        dd(asset($value));
        return asset('storage/'.$value);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

}
