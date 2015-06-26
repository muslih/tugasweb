<?php 

class Jurusan extends ActiveRecord\Model {
	public static $table_name = 'jurusan';

	static $has_many = array(
	   array('mahasiswa')
  	);
}