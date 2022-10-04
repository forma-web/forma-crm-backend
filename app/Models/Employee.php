<?php

namespace App\Models;

use App\Enums\SexEnum;
use App\Notifications\ProfileCreatedNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Employee extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'position_id',
        'department_id',
        'office_id',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'hire_date',
        'phone',
        'email',
        'sex',
        'password',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date',
        'hire_date' => 'date',
        'dismissal_date' => 'datetime',
        'sex' => SexEnum::class,
    ];

    public function sendEmailWithPassword(string $password): void
    {
        $this->notify(new ProfileCreatedNotification($password));
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
