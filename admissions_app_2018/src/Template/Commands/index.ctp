<form action="commands/fillpreferencesnew" method="post">
	<ol>
		<li>Marks will be added to Part B and Total for subjects having only single Part. </li>
		<li>The preferences table will be verified with the CUCET Result Part A and Part B to add checked = 1 </li>
		<li>The preferences table will be verified with the CUCET Result Part A empty and Part B = Total, Total with Total CUCET to be checked = 1 </li>
		<li>Then GATE/GPAT will be verified manually with the online result or uploaded marksheet. Corresponding Yes/No in Candidates table should be done.</li>
		<li>Then lower and upper marks will be verified manually in table and shall be cleared if found out of range</li>
		<li>After taking above steps click the Fill Preferences New button.</li>
	</ol>
	<input type="submit" value="Fill Preferences New"/>
</form>
<form action="commands/fillpreferencesnew" method="post">
	<ol>
		<li>Make sure the preference_new table is in proper shape before clicking the Poulate Ranking Table button</li>
	</ol>
	<input type="submit" value="Populate Ranking Table"/>
</form>
<form action="commands/cancelseatsintoseats" method="post">
	<ol>
		<li>Make sure the preference_new table is in proper shape before clicking the Poulate Ranking Table button</li>
	</ol>
	<input type="submit" value="Patch Cancel Seats enties with Seats Table"/>
</form>
<form action="commands/patchrankingfromseats" method="post">
	<ol>
		<li>Make sure the preference_new table is in proper shape before clicking the Poulate Ranking Table button</li>
	</ol>
	<input type="submit" value="Patch Ranking Table with Seats table"/>
</form>
<form action="commands/removelockseatentries" method="post">
	<ol>
		<li>Make sure the preference_new table is in proper shape before clicking the Poulate Ranking Table button</li>
	</ol>
	<input type="submit" value="Remove lockseats entries with Seats table"/>
</form>
<form action="commands/clearseatstable" method="post">
	<ol>
		<li>Make sure no entries in lock seats.</li>
		<li>Make sure ranking table is set to 1 for seat_alloted</li>
	</ol>
	<input type="submit" value="Remove Seats table enties not submitted Fee"/>
</form>
<form action="commands/clearrankingflag" method="post">
	<ol>
		<li>This is required when new locking is expected and everybody is allowed to participate even those who have paid fee or alloted seat earlier.</li>
	</ol>
	<input type="submit" value="Clear Ranking Table of all alloted seats. Set it to null."/>
</form>
<form action="/admissions_app_2018/commands/addnewseat" method="post" enctype="multipart/form-data">
	<ol>
		<li>The HDFC Bank Statement will be matched with Seats Table</li>
		<li><input type="file" name="feedata">HDFC Bank Statement</input></li>
	</ol>
	<input type="submit" value="Find missing Registration No. of fee"/>
</form>
<form action="commands/addnewfee" method="post" enctype="multipart/form-data">
	<ol>
		<li><input type="text" name="username">Registration Id</input></li>
		<li><input type="text" name="reponse_code">Response Code</input></li>
		<li><input type="text" name="payment_date_created">Date Created (Y-M-d H:i:s)</input></li>
		<li><input type="text" name="payment_amount">Payment Amount (eg. 600)</input></li>
		<li><input type="text" name="payment_id"> </input>Payment Id</li>
		<li><input type="text" name="payment_transaction_id">Payment Transaction Id</input></li>
	</ol>
	<input type="submit" value="Insert into fees table and get fee id."/>
</form>
<form action="commands/addnewseat" method="post">
	<ol>
		<li>This will check whether the seat is empty. If empty only then the seat will be alloted.</li>
		<li>Fetch the seat id from seat allocation by sorting in desc modified and getting the latest one.</li>
		<li><input type="text" name="fee_id">Fee Id</input></li>
		<li><input type="text" name="username">Registration Id</input></li>
	</ol>
	<input type="submit" value="Patch Seats table with new seat."/>
</form>