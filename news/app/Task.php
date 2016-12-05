<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
    'title',
    'description',
    'url',
    'userid'
    ];

    public static $storevalid = array( 
    	'title' => 'required', 
    	'description' => 'required', 
    	'url' => 'required'    
    	);

    public function likes()
    {
    	return $this->hasMany('App\Like','storyid');
    }
  }
