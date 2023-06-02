<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'telefono',
        'datadinascita',
        'username',
        'cognome',
        'genere',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /*protected $hidden = [
        'password',
        'remember_token',
    ];*/

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public $timestamps = false;


    //This should firstly check to see if you User table has the field 'role' and then check your parameter $role against the role field.
    //Questo metodo servirà poi nel loginController per indirizzare la persona che è acceduta al sito in una determinata sezione,
    //a seconda del tipo di ruolo che ha


    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }


}
