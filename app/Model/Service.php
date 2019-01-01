<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";

    public function getAllfeatures()
    {
        return $this->hasMany('App\Model\ServiceFeature', 'service_id', 'service_id');
    }
}
