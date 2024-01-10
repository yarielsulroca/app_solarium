<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Negocio;

class Servicio extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'servicios';
    protected $fillable = [
        'name',
        'description',
        'negocio_id',
        'status'
    ];
    /* Relacion muchos a uno de Servicios que pertenecen a un Negocio */
    public function negocio()
    {
        return $this->belongsTo(Negocio::class,'salon_id');
    }
}
