<?php 
	if(isset($usernames) && count($usernames) > 0){
		echo "<table>";
		echo "<tr><td>S. No.</td><td></td></tr>";
		$count = 1;
		foreach($usernames as $key => $value) {
			echo "<tr><td>" . $count++ . "</td><td>" . $value['username'] . "</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "NO RECORD FOUND";
	}
?>