<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * ユーザーの全ポストの取得
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Patient');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];
    protected $table = 'patients';
    protected $fillable = [
        'patient_id',
        'name',
        'birthday',
        'results',
    ];
}
