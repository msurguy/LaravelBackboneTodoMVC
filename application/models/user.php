<?php

class User extends Eloquent 
{
	public function todos(){
		return $this -> has_many('Todo');
	}

}