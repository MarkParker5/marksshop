<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    public function products(){
        return $this->belongsToMany(Product::class, 'tags_products');
    }
    public function setSlugAttribute($value){
    	$this->attributes['slug'] = empty($value) ? \Str::slug($this->attributes['name'], '-') : \Str::slug($value, '-');
    }
}
