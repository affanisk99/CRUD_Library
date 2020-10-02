<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Books extends Model
{
	use SoftDeletes;
     protected $table = "books";
	 protected $fillable = ['code','name','author','description','release_date','category_id','publisher_id','shelves_id','is_available','created_at','updated_at','deleted_at'];
	 public function Categories(){
	 	return $this->hasOne(Categories::class,'id','category_id');
	 }
	 public function Publisher(){
	 	return $this->hasOne(Publisher::class,'id','publisher_id');
	 }
	 public function Shelves(){
	 	return $this->hasOne(Shelves::class,'id','shelves_id');
	 }
}
