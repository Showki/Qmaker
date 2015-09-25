<?php
class Property1st extends AppModel{
	public $name = 'Property1st';
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id'
			),
		'Objective' => array(
			'className' => 'Objective',
			'foreignKey' => 'objective_id'
			)
		);
}
?>