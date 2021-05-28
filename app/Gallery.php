<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'beef_packages_id','image',
    ];

    protected $hidden = [

    ];

    public function beef_package(){
        return $this->belongsTo(BeefPackage::class, 'beef_packages_id', 'id');
    }

}
