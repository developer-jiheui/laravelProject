<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'USER'; // Custom table name

    protected $primaryKey = 'USER_ID'; // Custom primary key

    public $timestamps = false; // Disable created_at and updated_at columns

    protected $fillable = [
        'EMAIL',
        'PW',
        'USER_TYPE',
        'FIRST_NAME',
        'LAST_NAME',
        'REGISTER_TYPE',
        'REGISTER_DT',
        'ADDRESS',
        'PHONE_NUM',
        'BIO',
        'JOB_TITLE',
        'BIRTHDAY',
        'INSTAGRAM_URL',
        'LINKEDIN_URL',
        'GITHUB_URL',
        'AVATAR'
    ];

    protected $hidden = [
        'PW',
    ];

    /**
     * Laravel expects `password` column. So override it to use `PW`.
     */
    public function getAuthPassword()
    {
        return $this->PW;
    }

    /**
     * Set email as the identifier for login.
     */
    public function getAuthIdentifierName()
    {
        return 'EMAIL';
    }
}
