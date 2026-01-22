<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
        'role',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    const CREATED_AT = 'cree_le';
    const UPDATED_AT = 'modifie_le';

    public $timestamps = true;

    /**
     * Override password attribute for Laravel auth
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
