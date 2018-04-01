<?php


namespace Responsive;


use Illuminate\Database\Eloquent\Model;


class Adduser extends Model

{

    public $timestamps = false;
	public $table = 'users';


	public $fillable = ['name','email','password','phone'];


}