<?php


class Planet extends Eloquent
{
	public $table = 'planets';
	
	public $timestamps = false;
	
	protected $hidden = array();

	public function gasses()
	{
		return  $this->belongsToMany('Gas','planets_gases');
	}
	
	
	public function type()
	{
		return $this->hasOne('Type','id');
	}
	
	public function satellites()
	{
		return $this->hasMany('Satellite');
	}
}