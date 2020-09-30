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
        $products = Product::whereIn('id', json_decode($this->attributes['upsell']) ?? [] )->get();
        return $products;
    }
    public function getCrossSellAttribute(){
        $products = Product::whereIn('id', json_decode($this->attributes['cross_sell']) ?? [] )->get();
        return $products;
    }
    public function images(){
        return $this->hasMany('App\Image');
    }
}
