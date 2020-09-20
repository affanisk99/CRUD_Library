<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
     protected $table = "books";
	 protected $fillable = ['code','name','asa','created_at','updated_at'];
}
