<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class FileProject extends Model
{
    protected $table='file_project';


    public function project()
    {
        return $this->belongsTo('Modules\Project\Entities\Project'.'project_id');
    }

}
