<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table='project';

    public function user()
    {
        return $this->belongsToMany('App\User','project_for_user','project_id','user_id');
    }

    public function tag()
    {
        return $this->hasMany('Modules\Project\Entities\Tags');
    }

    public function file_project()
    {
        return $this->hasMany('Modules\Project\Entities\FileProject');
    }
}

