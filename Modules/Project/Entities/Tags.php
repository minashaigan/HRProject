<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table='tags';

    public function project()
    {
        return $this->belongsTo('Modules\Project\Entities\Project','project_id');
    }
}
