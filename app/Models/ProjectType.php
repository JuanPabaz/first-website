<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $table = 'project_types';
    
    public function projects()
    {
        return $this->hasMany(Project::class, 'project_type_id');
    }
}
