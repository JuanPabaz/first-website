<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public static function latestProjects($count = 3)
    {
        return self::orderBy('date', 'desc')->take($count)->get();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
