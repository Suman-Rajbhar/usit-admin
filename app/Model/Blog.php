<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blogs";

    public function blogType()
    {
        return $this->hasOne('App\Model\Service', 'service_id', 'service_id');
    }
}
