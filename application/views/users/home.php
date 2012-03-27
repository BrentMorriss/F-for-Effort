<style type="text/css">
	table
	{
	border-collapse:collapse;
	}
	table, td, th
	{
	border:1px solid black;
	}v
</style>
<?php
$first_name = $this->session->userdata('first_name');
$euid = $this->session->userdata('euid');
//echo $schedule[4]['name'];
?>

<h1>Logged In</h1>
<h3><?php echo $first_name." ".$euid; ?></h3>
<br/>
<a href="#">Add</a>
<a href="#">Drop</a>
<a href="#">Schedule</a>
<a href="/index.php/users/logout">Logout</a>
<?php
if($schedule)
{
	echo <<< EOF
	
		<table class='schedule'>
			<tr>
				<th>Name</th>
				<th>Number</th>
				<th>Credit</th>
				<th>Description</th>
			</tr>
	
EOF;
	
	foreach($schedule as $course_id => $array)
	{
		echo "<tr>";
		foreach($array as $value)
		{
			echo "<td>".$value."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
?>