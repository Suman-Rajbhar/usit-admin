<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/5/2017
 * Time: 1:38 AM
 */

namespace App\Http\Controllers;




use App\Model\PackageFeatureOffer;

class Usclass{

    public function get_offer_features($package_id, $feature_id)
    {
        $offer = PackageFeatureOffer::where('package_id', $package_id)->where('package_feature_id', $feature_id)->first();
        if($offer)
        {
            return $offer;
        }else{
            return false;
        }
    }
} 