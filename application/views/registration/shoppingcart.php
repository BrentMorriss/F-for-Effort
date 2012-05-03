<style type="text/css">
body{
	font-family: verdana,arial,sans-serif;
}
table.schedule {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.schedule th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.schedule td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<?php 
if (empty($cart))
{
	echo "empty";
}
else
{	
	function convertTime($time){
		$minutes = $time % 60;
		$hours = ($time - $minutes)/60;
		$hours = $hours>12 ? $hours%12 : $hours;
		$ap = $time<720 ? "am" : "pm";
		return sprintf("%s:%02s%s",$hours,$minutes,$ap);
	};
echo <<< EOF
	
	<table class='schedule'>
	
		<tr>
			<th>Delete</th>
			<th>Class</th>
			<th>Day/Time</th>
			<th>Room</th>
			<th>Instructor</th>
			<th>Units</th>
			<th>Status</th>
		</tr>

EOF;
				
	foreach ($cart as $key => $array) {
		$days = array(
				'monday' => 'Mo',
			  	'tuesday' => 'Tu',
			  	'wednesday' => 'We',
			  	'thursday' => 'Th',
			  	'friday' => 'Fr',
			  	'saturday' => 'Sa',
			  	'sunday' => 'Su'
		);
		$week = '';
		foreach($days as $day => $abbr)
			if($array[$day])
				$week .= $abbr;
	
		echo "<tr>";
		echo "<td><a href='deleteFromCart/".$array['id']."'>Delete</a></td>";
		echo "<td>".$array['ticker']." ".$array['course_number']."-".sprintf("%03s",$array['section'])."</td>";
		echo "<td> $week ".convertTime($array['start_time'])."-".convertTime($array['end_time'])."</td>";
		echo "<td>NTDP 104B</td>";
		echo "<td>staff</td>";
		echo "<td>".$array['credit']."</td>";
		$status = $array['capacity']>$array['enrolled'] ? 'open':'closed';
		echo "<td>$status</td>";
		echo "</tr>";
		
	}
	echo "</table>";
	echo "<a href='#'>Enroll</a>";
	
}

?>