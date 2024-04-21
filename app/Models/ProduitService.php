<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'condProd',
        'formatProd',
        'qteProd_min',
        'qteProd_max',
        'prix',
        'LivreCapProd',
        'photo',
        'desrip',
        'qalifServ',
        'sepServ',
        'qteServ',
        'PrixServ',
        'zonecoServ',
        'villeServ',
        'comnServ',
        'typeProdServ',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
