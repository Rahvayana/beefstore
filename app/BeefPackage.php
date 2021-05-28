<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeefPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','slug','beeftype','about','language','type','price','shipping'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'beef_packages_id', 'id');
    }

}
