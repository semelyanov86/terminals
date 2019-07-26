<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Traits\Orderable;

class Terminal extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens, Orderable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'auth_date', 'password', 'active', 'cashmashine', 'category', 'description', 'display_name', 'inkasso_pass', 'log_path', 'modem', 'notifications_sub', 'printer', 'tmp_pass', 'user_id'
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

    public function getFirstRoleAttribute()
    {
        return $this->getRoleNames()[0];
    }

    public function filial()
    {
        return $this->belongsTo('App\Filial');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the payments for the terminal.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment')->latestFirst();
    }

    public function getActiveDisplayAttribute()
    {
        if ($this->active > 0) {
            return 'Да';
        } else {
            return 'Нет';
        }
    }

    public function getNotificationsSubDisplayAttribute()
    {
        if ($this->notifications_sub > 0) {
            return 'Да';
        } else {
            return 'Нет';
        }
    }
    public function findForPassport($username) {
        return $this->where('name', $username)->first();
    }
}
