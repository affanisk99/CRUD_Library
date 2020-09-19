<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
   protected $table = "publisher";
	protected $fillable = ['name','created_at','updated_at'];
}
