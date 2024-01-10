<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Servicio;

class Negocio extends Model
{
    use HasFactory;
    protected $table = 'negocios';
    protected $fillable = [
        // Agrega los campos que corresponden a la tabla 'locales'
        'name',
        'adresse',
        'phone',
        'status'

    ];

    /* relacion mucho a muchos con Salones */
    public function users()
    {
        return $this->belongsToMany(User::class, 'negocio_users');
    }
    /* Relacion de uno a muchos con Servicios */
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
