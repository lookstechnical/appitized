<?php


class Satellite extends Eloquent
{
	public $table = 'satellites';
	
	public $timestamps = false;
	
	protected $hidden = array();
	
	public function plannet()
	{
		return $this->belongsTo('Planet');
	}
}