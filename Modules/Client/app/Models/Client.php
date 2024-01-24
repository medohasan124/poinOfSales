<?php

namespace Modules\Client\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\app\Models\product;

class client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name' ,
        'mobile',

    ];

    public function client(){
        return $this->hasMany(client::class);
    }

    protected static function newFactory()
    {
        //return ClientsFactory::new();
    }
}
