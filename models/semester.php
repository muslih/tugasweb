<?php 
class Semester extends ActiveRecord\Model {
	public static $table_name = 'semester';

	static $has_many = array(
	   array('matkul'),
	   array('nilai')
  	);
}