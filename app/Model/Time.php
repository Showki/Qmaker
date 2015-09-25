<?php
class Time extends AppModel{
	public $name = 'Time';

	public function timeMS_list(){
		for($m=0;$m<=40;$m++){
			$time_list['minute'][] = $m;		
		}
		for ($s=0;$s<=59;$s++) { 
			$time_list['second'][] = $s;
		}
		return $time_list;
	}
}
?>

