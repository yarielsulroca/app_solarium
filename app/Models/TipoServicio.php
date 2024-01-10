<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Servicio;

class TipoServicio extends Model
{
    use HasFactory;
    protected $table = 'tipos_servicios';
    protected $fillable = [
        'name',
        'description',
        'servicio_id',
        'precio',
        'status'
        ];
        /* relacion mucho a muchos entre usuarios y servicios */
    public function users()
    {
        return $this->belongsToMany(User::class, 'servicio_users');
    }
    /**
     * relacion de 1 a muchos entre tipos de servicios y Servicio, cada tipo de servicio
     * pertenece a un servicio.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
