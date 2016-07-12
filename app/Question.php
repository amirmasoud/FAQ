<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	/**
	 * variable that can be mass assigned.
     * 
	 * @var array
	 */
	protected $fillable = [
		'title',
        'text',
        'user_id',
        'answer'
	];

	/**
	 * A question is owned by a user.
	 * 
	 * @return belongTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
