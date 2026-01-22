<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Litige extends Model
{
    protected $table = 'litiges';

    protected $fillable = ['titre', 'description', 'statut', 'attribue_a', 'cree_par'];

    public function createur()
    {
        return $this->belongsTo(Utilisateur::class, 'cree_par');
    }

    public function responsable()
    {
        return $this->belongsTo(Utilisateur::class, 'attribue_a');
    }

    public function commentaires()
    {
        return $this->hasMany(CommentaireLitige::class, 'litige_id');
    }
}
