<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentaireLitige extends Model
{
    protected $table = 'commentaires_litiges';

    protected $fillable = ['litige_id', 'utilisateur_id', 'commentaire'];

    public function litige()
    {
        return $this->belongsTo(Litige::class, 'litige_id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}
