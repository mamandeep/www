<style type="text/css">
/*table {
	border: 1px solid black;
	border-collapse: collapse;
	width: 650px;
	max-width: 650px;
	font-family: Open Sans;
	font-size: 14px;
	font-style: normal;
	font-variant: normal;
	//font-weight: 700;
	//line-height: 26.4px;
}

tr {
	
}

td {
	border: 1px solid black;
	//height:100px
}

.header {
	font-family: Open Sans;
	font-size: 18px;
	font-style: normal;
	font-variant: normal;
}*/

table {
  width: 100%; 
  border-collapse: collapse;
  overflow-x:auto; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}

@media only print {
	table {
	  	width: 100%; 
	  	border-collapse: collapse;
	  	max-width: 650px;
	  	width: 650px;
	  	table-layout:fixed;
	}
	
	table td {
		word-wrap:break-word;
	}
	
	/* Zebra striping */
	tr:nth-of-type(odd) { 
	  background: #eee; 
	}
	
	th { 
	  background: #333; 
	  color: white; 
	  font-weight: bold; 
	}
	
	td, th { 
	  padding: 6px; 
	  border: 1px solid #ccc; 
	  text-align: left; 
	}
}

</style>
<label style="header">CUPB PhD Admissions (January 2019 intatke) - Summary</label>
<table class="responsive">
	<tr>
		<td>Login created</td>
		<td>Preference filled</td>
		<td>Fee submitted</td>
	</tr>
	<tr>
		<td><?php echo $countofusers; ?></td>
		<td><?php echo $countofprefs; ?></td>
		<td><?php echo $countoffees; ?></td>
	</tr>
</table>
<br/><br/>
<table class="responsive">
<tr>
	<td rowspan="2">S. No.</td>
	<td width="30%" rowspan="2">Subject</td>
	<td rowspan="2">Total No. of Candidates</td>
	<td colspan="5">Source of Fellowship</td>
</tr>
<tr>
	<td>UGC/CSIR/ICMR-JRF</td>
	<td>RGNF/MANF</td>
	<td>Industrial Relationship</td>
	<td>CUPB Project</td>
	<td>No Fellowship</td>
</tr>
<?php $count = 1; foreach($subjectwisesummary as $row) { ?>
	<tr>
		<td><?php echo $count++; ?></td>
		<td><a href="<?php echo $this->request->webroot; ?>reports/detailedsummary/<?php echo $row['specialization_1']; ?>"><?php echo $row['name']; ?></a></td>
		<td><?php echo $row['no_of_users']; ?></td>
		<td><?php echo $row['count_ugc']; ?></td>
		<td><?php echo $row['count_rgnf']; ?></td>
		<td><?php echo $row['count_industrial']; ?></td>
		<td><?php echo $row['count_proj']; ?></td>
		<td><?php echo $row['count_nosource']; ?></td>
	</tr>
<?php } ?>
</table>
<br><br><br>
<table class="responsive">
	<tr>
		<td>1. </td>
		<td><?php echo $this->Html->link(
			    'Overall Summary',
			    '/reports/overallsummary'
				); ?>
		</td>
		<td>2. </td>
		<td><?php echo $this->Html->link(
			    'Subject wise summary of the candidates who have submitted the form',
			    '/reports/subjectwisesummary'
				); ?>
		</td>
	</tr>
	<tr>
		<td>3. </td>
		<td><?php echo $this->Html->link(
			    'Detailed Summary',
			    '/reports/detailedsummary'
				); ?>
		</td>
		<td>4. </td>
		<td><?php echo $this->Html->link(
			    'Individual details',
			    '/reports/individualdetails'
				); ?>
		</td>
	</tr>
	<tr>
		<td colspan="1">5. </td>
		<td colspan="3">
			<?= $this->Html->link('Download Data in CSV format', [
					'controller' => 'reports', 
					'action' => 'export'
			]); ?>
		</td>
	</tr>
</table>