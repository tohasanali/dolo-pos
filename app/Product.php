<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'products';

    protected $fillable = ['name','category_id','detail','is_active'];


    public function category(){
    	return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }



}
