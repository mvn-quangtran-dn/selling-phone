<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'date_order', 'total', 'yourname', 'email', 'phone', 'address',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\OrderDetail', 'product_id', 'id', 'id');
    }
    public function status()
    {
        return $this->hasOne('App\Status');
    }
    public function paymentstatus()
    {
        return $this->hasOne('App\PaymentStatus');
    }
}
