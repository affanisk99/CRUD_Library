<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shelves extends Model
{
	use SoftDeletes;
    protected $table = "shelves";
	protected $fillable = ['code','description','created_at','updated_at'];
}
