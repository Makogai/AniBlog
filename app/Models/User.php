<?php

namespace App\Models;

use App\Traits\FileHandling;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\FileHelpers;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, FileHandling;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_path'
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

    public function post(){
        return $this->HasMany(Post::class);
    }

    public function getImagePathAttribute($value){
        return strpos($value, "http") === false ? asset($value) : $value;
        // return $value;
    }

    public function setImagePathAttribute($value)
    {
        if($value)
            $this->attributes["image_path"] = is_string($value) ? $value : User::storeFile($value, "users");
    }
}
