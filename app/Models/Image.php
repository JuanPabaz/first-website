<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['project_id', 'path'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
