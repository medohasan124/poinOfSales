<?php

namespace Modules\Order\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\app\Models\client;
use Modules\Order\Database\factories\OrderFactory;
use Modules\Product\app\Models\product;

class order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'client_id',
        'salary',
        'discount',
        'lastSalary',
        'payment',
    ];

    public function product(){
        return $this->belongsTo(product::class ,'product_id', 'id');
    }
    public function client(){
        return $this->belongsTo(client::class ,'client_id', 'id');
    }

    protected static function newFactory()
    {
        //return OrderFactory::new();
    }
}
