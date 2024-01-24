<?php

namespace Modules\Catigory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Catigory\Database\factories\CatigoryFactory;
use Modules\Product\app\Models\product;

class catigory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name' ,
        'name_en',
    ];

    public function product(){
      return  $this->hasMany(product::class);
    }

    protected static function newFactory()
    {
        //return CatigoryFactory::new();
    }
}
