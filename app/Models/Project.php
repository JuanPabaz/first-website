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
}
