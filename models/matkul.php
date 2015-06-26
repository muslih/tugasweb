<?php 

class Matkul extends ActiveRecord\Model {
	public static $table_name = 'matkul';

	static $belongs_to = array(
	   array('semester')
  	);
}