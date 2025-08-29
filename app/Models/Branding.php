<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branding extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'description',
    ];

    // Un branding pertenece a un proyecto
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Un branding puede tener muchas imágenes
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
