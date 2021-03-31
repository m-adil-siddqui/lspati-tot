<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, LogsActivity, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected static $ignoreChangedAttributes = ['password', 'updated_at'];
    protected static $logAttributes = ['name', 'email', 'password'];

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created', 'updated'];
    protected static $logName = 'user';
    
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Customizing the description
    public function getDescriptionForEvent(string $eventName): string
    {
        // return "This {$this->name} has been {$eventName}";
        // return "new user has been created on ". now();
        if($eventName == 'created'){

            return "new User {$eventName}, details below email = {$this->email}";

        }
        if($eventName == 'updated')
        {
            return "User updated, {$this->email}, {$this->name}";
        }
    }

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
}
