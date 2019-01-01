<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = "portfolios";

    public function getAllfeatures()
    {
        return $this->hasMany('App\Model\PortfolioFeature', 'portfolio_id', 'portfolio_id');
    }
}
