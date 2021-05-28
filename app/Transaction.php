<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'beef_packages_id', 'users_id', 'beef_price', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [

    ];

    public function details(){
        return $this->hasmany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function beef_package(){
        return $this->belongsTo(BeefPackage::class, 'beef_packages_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
