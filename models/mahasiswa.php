<?php 

class Mahasiswa extends ActiveRecord\Model {
	public static $table_name = 'mahasiswa';

	static $belongs_to = array(
	   array('jurusan'),
	   array('dosen')
  	);

  	static $has_many = array(
  		array('nilai')
  	);
}