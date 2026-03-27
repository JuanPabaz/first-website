<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['project_id', 'path'. 'branding_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function branding()
    {
        return $this->belongsTo(Branding::class);
    }

}
