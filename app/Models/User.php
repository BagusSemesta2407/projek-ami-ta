<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function auditee()
    {
        return $this->hasMany(Auditee::class);
    }

    public function auditor()
    {
        return $this->hasMany(Auditor::class);
    }

    public function dataInstrument()
    {
        return $this->hasMany(DataInstrument::class);
    }

    /**
     * Get all of the ppppmp for the User
     *
     */
    public function ppppmp()
    {
        return $this->hasMany(Ppppmp::class);
    }

    /**
     * Get all of the categoryUnit for the User
     *
     */
    public function categoryUnit()
    {
        return $this->hasMany(CategoryUnit::class);
    }

    // /**
    //  * Get the jurusan associated with the User
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function jurusan(): HasOne
    // {
    //     return $this->hasOne(Jurusan::class, 'id', 'user_id');
    // }

    // /**
    //  * Get the programStudi associated with the User
    //  *
    //  * @return \Illuminaatabase\Eloquent\Relations\HasOne
    //  */
    // public function programStudi(): HasOne
    // {
    //     return $this->hasOne(ProgramStudi::class, 'user_id', 'id');
    // }

    // /**
    //  * Get the unit associated with the User
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function unit(): HasOne
    // {
    //     return $this->hasOne(Unit::class, 'user_id', 'id');
    // }

}
