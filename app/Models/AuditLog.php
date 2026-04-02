<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'accion',
        'entidad_tipo',
        'entidad_id',
        'entidad_nombre',
        'detalles',
        'ip',
        'created_at',
    ];

    protected $casts = [
        'detalles'   => 'array',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function registrar(string $accion, string $entidadTipo, ?int $entidadId, string $entidadNombre, ?array $detalles = null): void
    {
        static::create([
            'user_id'       => auth()->id(),
            'accion'        => $accion,
            'entidad_tipo'  => $entidadTipo,
            'entidad_id'    => $entidadId,
            'entidad_nombre'=> $entidadNombre,
            'detalles'      => $detalles,
            'ip'            => request()->ip(),
            'created_at'    => now(),
        ]);
    }
}