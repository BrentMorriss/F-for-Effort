<?php
echo form_fieldset('Class Search');
echo form_open(base_url().'index.php/registration/search');

echo '<label style="margin-right: 15px;"> Course Subject:</label>';
echo form_input(array('id'=>'subject', 'name'=>'subject')) . '<br></br>';

echo '<label style="margin-right: 15px;"> Course Number:</label>';
$options = array(
	'exact' => 'Is Exactly',
	'contains' => 'Contains',
	'greater' => 'Greater Than or Equal To',
	'less' => 'Less Than or Equal To'
	);
	echo form_dropdown('courseNumberSearchType', $options, 'exact');	
	echo form_input(array('id'=>'courseNumber', 'name'=>'courseNumber')) . '<br></br>';

echo '<label style="margin-right: 15px;"> Show Only Open Classes:</label>'.form_checkbox('openClasses', '1', false) . '<br></br>';

echo form_submit(array('name'=>'submit'), 'Search');
echo form_close();
echo form_fieldset_close();

if(isset($results))
{
	if(!empty($results) && $results->num_rows() > 0)
	{
		foreach($results->result() as $row)
		{
			echo $row->name . ' - ' . $row->description . ' - OPEN';
		}
	}
	else
	{
		echo 'No results found.';
	}
}

?>