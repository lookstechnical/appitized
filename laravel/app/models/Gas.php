<?php


class Gas extends Eloquent
{
	public $table = 'gases';
	
	public $timestamps = false;

	protected $hidden = array();
	
	public function planets()
    {
        return $this->belongsToMany('Planet');
    }
}