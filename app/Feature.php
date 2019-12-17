<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable=[
        'feature','productgroup_id',
    ];

    public function productgroup()
    {
        return $this->belongsTo('App\ProductGroup');
    }
}