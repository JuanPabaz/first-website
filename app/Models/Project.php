<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'date', 'description', 'img', 'tipo', 'project_type_id'];

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

    public function branding()
    {
        return $this->hasOne(Branding::class);
    }


    public function type()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }
}
