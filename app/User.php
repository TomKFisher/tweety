<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function follow(User $user){
        return $this->follows()->save($user);
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
    public function getAvatarAttribute(){
        return 'https://i.pravatar.cc/200?u='.$this->email;
    }

    public function getRouteKeyName()
    {
        return 'name';
    }


}
