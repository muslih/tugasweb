<?php 

class Nilai extends ActiveRecord\Model {
	public static $table_name = 'nilai';

	static $belongs_to = array(
	   array('mahasiswa'),
	   array('matkul'),
	   array('semester')
  	);
}