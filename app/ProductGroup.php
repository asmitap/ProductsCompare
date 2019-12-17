<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    Protected $fillable = ['productgroup'];

    public function feature()
    {
        return $this->hasMany('App\Product');
    }
    public function featurevalue()
    {
        return $this->hasMany('App\FeatureValue');
    }
}
