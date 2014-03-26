<?php


class Type extends Eloquent
{
	public $table = 'types';
	
	public $timestamps = false;

	protected $hidden = array();
	
	public function plannet()
	{
		return $this->belongsTo('Planet');
	}
}