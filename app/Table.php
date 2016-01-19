<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
	protected $table = 'schema';
    
    protected $casts = [
    	'visible' => 'boolean',
    	'fields' => 'array'
    ];
}
