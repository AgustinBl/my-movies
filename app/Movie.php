<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

	protected $fillable = [
        'title', 'cover', 'description',
    ];

    public function opinions()
	{	
		return $this->hasMany('App\Opinion');
	}
}
