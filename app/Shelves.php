<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelves extends Model
{
    protected $table = "shelves";
	protected $fillable = ['code','description','created_at','updated_at'];
}
