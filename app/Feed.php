<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    public $fillable = ['feed_title', 'nickname'];

    protected $appends = ['created_at_formatted'];

    public function getCreatedAtFormattedAttribute() 
    {
    	return date('l, j F Y, g:i a', strtotime($this->attributes['created_at']));
    }
}
