<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Catigory\app\Models\catigory;
use Modules\Order\app\Models\order;
use Modules\Product\Database\factories\ProductFactory;

class product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

    protected $fillable = [
        'name' ,
        'name_en' ,
        'description' ,
        'first_price' ,
        'last_price' ,
        'sreialNumber' ,
        'store' ,
        'cat_id' ,
    ];

    public function catigory(){
      return  $this->belongsTo(catigory::class ,'cat_id', 'id');
    }

    public function order(){
        return $this->hasMany(order::class);
    }

    protected static function newFactory()
    {
        //return ProductFactory::new();
    }
}
