<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
	// give table name
	protected $table = 'urls';

	// give primary key name
   	protected $primaryKey = 'id';

   	// add all fillable fields
    protected $fillable = [
    	'title',
    	'url',
    	'short_url',
      'nsfw'
    ];
}
