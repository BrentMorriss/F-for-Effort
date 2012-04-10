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
if($schedule)
{
	echo <<< EOF
	
		<table class='schedule'>
		
			<tr>
				<th>Class</th>
				<th>Description</th>
				<th>Days/Time</th>
				<th>Instructor</th>
				<th>Units</th>
				<th>Action</th>
			</tr>
			
EOF;
	
	foreach($schedule as $course_id => $array)
	{
		$monday = $array['monday']==1 ? 'Mo': '';
		$tuesday = $array['tuesday']==1 ? 'Tu': '';
		$wednesday = $array['wednesday']==1 ? 'We': '';
		$thursday = $array['thursday']==1 ? 'Th': '';
		$friday = $array['friday']==1 ? 'Fr': '';
		$saturday = $array['saturday']==1 ? 'Sa': '';
		$sunday = $array['sunday']==1 ? 'Su': '';
		$week = $monday.$tuesday.$wednesday.$thursday.$friday.$saturday.$sunday;
		
		echo "<tr>";
		echo "<td>".$array['ticker']." ".$array['course_number']."-".sprintf("%03s",$array['section'])."</td>";
		echo "<td style='text-transform:uppercase'>".$array['name']."</td>";
		echo "<td>".$week." ".$array['start_time']." ".$array['end_time']."</td>";
		echo "<td>Staff</td>";
		echo "<td>".$array['credit']."</td>";
		echo "<td><a href='index.php/registration/del/student/".$this->session->userdata('user_id')."/course/$course_id'>Drop</a></td>";
		
		
		echo "</tr>";
	}
	
	echo "</table>";
}
?>