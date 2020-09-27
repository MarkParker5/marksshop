<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $casts = [
        'upsell'     => 'array',
        'cross_sell' => 'array',
    ];
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function reviews(){
    	return $this->hasMany('App\Review');	
    }
    public function setSlugAttribute($value){
    	$this->attributes['slug'] = empty($value) ? \Str::slug($this->attributes['name'], '-') : \Str::slug($value, '-');
    }
    public function getImgAttribute($value){
    	return empty($value) ? '/img/nophoto.png' : $value; 
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'tags_products');
    }
    public function getUpsellAttribute(){
        return $this->attributes['upsell'] ?? [];
    }
    public function getCrossSellAttribute(){
        return $this->attributes['cross_sell'] ?? [];
    }
    public function images(){
        return $this->hasMany('App\Image');
    }
}
