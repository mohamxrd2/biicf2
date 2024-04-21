<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consommation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_prov',
        'cond_cons',
        'format_cons',
        'qte',
        'prix_cons',
        'frqce_conse',
        'jourAch_cons',
        'qualif_serv',
        'specialite',
        'description',
        'zoneAct',
        'villeCons',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
