<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'name_en',
        'name_cn',
        'email_2',
        'phone_1',
        'phone_2',
        'jobtitle',
        'tax_code',
        'folder',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function Localization()
    {
        return $this->hasOne('App\Models\Localization','usr_id');
    }

    public function Account()
    {
        return $this->hasOne('App\Models\Account','usr_id');
    }

    public function Products()
    {
        return $this->hasMany('App\Models\Products','usr_id')->orderBy('created_at','DESC');
    }

    public function RFQ($role)
    {
        if($role == 'seller'){
            return $this->hasMany('App\Models\RFQ','seller_id')->orderBy('created_at','DESC');
        }

        if($role == 'buyer'){
            return $this->hasMany('App\Models\RFQ','buyer_id')->orderBy('created_at','DESC');
        }

    }
}
