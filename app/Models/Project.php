<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public static function latestProjects($count = 6)
    {
        return self::where('tipo', 'Destacado')
            ->take($count)
            ->get();

    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function type()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }
}
