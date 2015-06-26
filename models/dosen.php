<?php 

class Dosen extends ActiveRecord\Model {
	public static $table_name = 'dosen';
	
	static $has_many = array(
	   array('mahasiswa')
  	);
}