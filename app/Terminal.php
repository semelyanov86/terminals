<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Terminal extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens, Orderable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'auth_date', 'password', 'active', 'cashmashine', 'category', 'description', 'display_name', 'inkasso_pass', 'log_path', 'modem', 'notifications_sub', 'printer', 'tmp_pass', 'user_id',
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
        return $this->belongsTo(\App\Filial::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    /**
     * Get the payments for the terminal.
     */
    public function payments()
    {
        return $this->hasMany(\App\Payment::class)->latestFirst();
    }

    public function getActiveDisplayAttribute()
    {
        if ($this->active > 0) {
            return 'Да';
        } else {
            return 'Нет';
        }
    }

    public function getPrinterDisplayAttribute()
    {
        if ($this->printer_state > 0) {
            return 'OK';
        } else {
            return 'ERR';
        }
    }

    public function getCashmashineDisplayAttribute()
    {
        if ($this->cashmashine_state > 0) {
            return 'OK';
        } else {
            return 'ERR';
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

    public function findForPassport($username)
    {
        return $this->where('name', $username)->first();
    }
}
