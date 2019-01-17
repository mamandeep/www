<?php
	//debug(count($marksData)); exit;
	//ini_set('memory_limit', '-1');
?>
<script src="/js/print.js"></script>
<link rel="stylesheet" type="text/css" href="/css/print.css">
<style type="text/css">
table {
	width: 99%;
	//border-collapse: separate;
	table-layout: fixed;
	overflow-wrap: break-word;
	page-break-inside:auto;
	font-family: Arial, Helvetica, sans-serif;
}
tr    { page-break-inside:avoid; page-break-after:auto }
    
.c63 {
	border: 1px solid black;
	font-family: Arial, Helvetica, sans-serif;
}

.c02, .c03, .c04, .c21, .c22 {
	border: none;
	font-family: Arial, Helvetica, sans-serif;
}

.c0001 {
	border: 1px solid black;
	background-color: grey;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}

.c0101, .c0108, .c0109, .c0110, .c0111,.c0112,.c0113,.c0114,.c0115,.c0116,.c0117,.c0118 {
	border: 1px solid black;
	width: 1%;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
}

.c0102 {
	border: 1px solid black;
	width: 10%;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	
}

.c0201, .c0202, .c0203, .c0204, .c0205, .c0206, .c0207, .c0208, .c0209, .c0210, .c0211, .c0212, .c0213,
.c0214, .c0215, .c0216, .c0301, .c0302, .c0303, .c0304, .c0305, .c0306, .c0307, .c0308, .c0309, .c0310,
.c0311, .c0312, .c0313, .c0314, .c0315, .c0316,  .c0401, .c0402, .c0403, .c0404, .c0405,
.c0406, .c0407, .c0408, .c0409, .c0410, .c0411, .c0412, .c0413, .c0414, .c0501, .c0502, .c0503, .c0504, .c0505,
.c0506, .c0507, .c0508, .c0509, .c0510, .c0511, .c0512, .c0513, .c0514, .c0601, .c0602, .c0604, .c0605,
.c0606, .c0607, .c0608, .c0609, .c0610, .c0611, .c0612, .c0613, .c0614, .c0701, .c0702, .c0704, .c0705,
.c0706, .c0707, .c0708, .c0709, .c0710, .c0711, .c0712, .c0713, .c0714
{
	border: 1px solid black;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	#font-weight: bold;
}

.c0603, .c0703, .c0317, .c0318, .c0615{
	border: 1px solid black;
	text-align: center;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}

.c0103, .c0104, .c0105, .c0106, .c0107, .c0108, .c0109 {
	transform: rotate(270deg);
	font-weight: bold;
	border: 1px solid black;
	height: 100px;
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
}



@media print {
	@page {
		  size: A4 landscape;
		  margin-top: 0.2cm;
		  margin-bottom: 1cm;
		  margin-left: 1cm;
		  margin-right: 0.2cm;
		}
    }
	
	table {
		width: 99%;
		//border-collapse: separate;
		table-layout: fixed;
		overflow-wrap: break-word;
		page-break-inside:auto;
		font-family: Arial, Helvetica, sans-serif;
	}
	
	tr    { page-break-inside:avoid; page-break-after:auto }
		
	.c63 {
		border: 1px solid black;
		font-family: Arial, Helvetica, sans-serif;
	}

	.c02, .c03, .c04, .c21, .c22 {
		border: none;
		font-family: Arial, Helvetica, sans-serif;
	}

	.c0001 {
		border: 1px solid black;
		background-color: grey;
		text-align: center;
		font-size: 18px;
		font-weight: bold;
		font-family: Arial, Helvetica, sans-serif;
	}

	.c0101, .c0108, .c0109, .c0110, .c0111,.c0112,.c0113,.c0114,.c0115,.c0116,.c0117,.c0118 {
		border: 1px solid black;
		width: 1%;
		font-weight: bold;
		font-family: Arial, Helvetica, sans-serif;
		text-align: center;
	}

	.c0102 {
		border: 1px solid black;
		width: 10%;
		font-weight: bold;
		font-family: Arial, Helvetica, sans-serif;
		text-align: center;
		
	}

	.c0201, .c0202, .c0203, .c0204, .c0205, .c0206, .c0207, .c0208, .c0209, .c0210, .c0211, .c0212, .c0213,
	.c0214, .c0215, .c0216, .c0301, .c0302, .c0303, .c0304, .c0305, .c0306, .c0307, .c0308, .c0309, .c0310,
	.c0311, .c0312, .c0313, .c0314, .c0315, .c0316,  .c0401, .c0402, .c0403, .c0404, .c0405,
	.c0406, .c0407, .c0408, .c0409, .c0410, .c0411, .c0412, .c0413, .c0414, .c0501, .c0502, .c0503, .c0504, .c0505,
	.c0506, .c0507, .c0508, .c0509, .c0510, .c0511, .c0512, .c0513, .c0514, .c0601, .c0602, .c0604, .c0605,
	.c0606, .c0607, .c0608, .c0609, .c0610, .c0611, .c0612, .c0613, .c0614, .c0701, .c0702, .c0704, .c0705,
	.c0706, .c0707, .c0708, .c0709, .c0710, .c0711, .c0712, .c0713, .c0714
	{
		border: 1px solid black;
		text-align: center;
		font-family: Arial, Helvetica, sans-serif;
		#font-weight: bold;
	}

	.c0603, .c0703, .c0317, .c0318, .c0615 {
		border: 1px solid black;
		text-align: center;
		font-weight: bold;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 14px;
	}

	.c0103 {
		transform: rotate(270deg);
		font-weight: bold;
		border: 1px solid black;
		height: 100px;
		font-family: Arial, Helvetica, sans-serif;
		text-align: center;
		overflow-wrap: normal;
	}
	
	.c0104, .c0105, .c0106, .c0107, .c0108, .c0109 {
		transform: rotate(270deg);
		font-weight: bold;
		border: 1px solid black;
		height: 100px;
		font-family: Arial, Helvetica, sans-serif;
		text-align: center;
		white-space:nowrap;
	}
}


</style>
<div style="text-align: center; font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Central University of Punjab, Bathinda</div>
<div style="text-align: center; font-size: 12px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">TABULATION SHEET</div>
<div style="font-size: 12px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"><div style="float: left;"><?php echo isset($Id5)  ? $Id5 : ""; ?></div><div style="float: right; margin-right: 20px;"><?php echo isset($Id4) ? $Id4 : ""; ?></div></div>
<br/>
<div style="text-align: center; font-size: 10px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"><?php
														if(isset($Id6)) {
															switch($Id6) {
																case 1:
																	echo "First Semester Examination Held in December 2018";
																	break;
																case 2:
																	echo "Second Semester Examination Held in December 2018";
																	break;
																case 3:
																	echo "Thrid Semester Examination Held in December 2018";
																	break;
																case 4:
																	echo "Fourth Semester Examination Held in December 2018";
																	break;
																}
														}
													?></div>
<table width="99%">
<tr>
	<td width="2%"></td>
	<td width="15%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td width="4.6%"></td>
	<td></td>
</tr>
<tr>
	<td colspan="18" class="c0001"><?php echo (empty($marksData[0]['programme']['name']) ? "Undefined" : $marksData[0]['programme']['name']); 
							$SGPA = []; //$totalCredits = 0;
							$flags = [];
							for($i=0; $i < count($marksData); $i++) {
								//debug($marksData[$i]);
								$total = ((is_numeric($marksData[$i]['internal_assessment']) && is_numeric($marksData[$i]['end_semester_examination'])) ? round(bcadd($marksData[$i]['internal_assessment'], $marksData[$i]['end_semester_examination'],2)) : round($marksData[$i]['total']));
								$total = ($total == 0) ? round($marksData[$i]['total']) : $total;
								$SGPA[$marksData[$i]['student_id']] = ((isset($SGPA[$marksData[$i]['student_id']])) ? $SGPA[$marksData[$i]['student_id']] : 0)
								+
								(($marksData[$i]['course']['countable'] == "Yes") ? ($total * $marksData[$i]['course']['credits']) : 0);
								//$totalCredits += (($marksData[$i]['course']['countable'] == "Yes") ? $marksData[$i]['course']['credits'] : 0);
								if(is_numeric($marksData[$i]['total']) && $total < 40) {
									//debug($total);
									$temp = !empty($flags[$marksData[$i]['student_id']]) ? $flags[$marksData[$i]['student_id']] : [];
									if(!empty($marksData[$i]['course']['id']) && !in_array($marksData[$i]['course']['id'], $temp)) {
										array_push($temp,$marksData[$i]['course']['id']);
										//debug($temp);
									}
									$flags[$marksData[$i]['student_id']] = $temp;
								}
								//debug($SGPA);
							}
	?></td>
</tr>
<tr>
	<td rowspan="2" class="c0101">S. No.</td>
	<td rowspan="2" class="c0102">Name of the Students and Registration Number</td>
	<td class="c0103">Course Code</td>
	<?php if(count($listCoursesId) > 13) {
			echo "Error of columns";
			exit;
		}
		foreach($listCoursesId as $course) {
			echo "<td class=\"c0104\">" . $course['course_code'] . "</td>";
		}
		for($i=0;$i<(13-count($listCoursesId)); $i++) {
			echo "<td class=\"c0104\">&nbsp;</td>";
		}
	?>
	<td class="c0117">SGPA & LG</td>
	<td rowspan="2" class="c0118">Result</td>
</tr>
<tr>
	<td class="c0201">Cred.</td>
	<?php if(count($listCoursesId) > 13) {
			echo "Error of columns in credits";
			exit;
		}
		foreach($listCoursesId as $course) {
			echo "<td class=\"c0202\">" . $course['credits'] . "</td>";
		}
		for($i=0;$i<(13-count($listCoursesId)); $i++) {
			echo "<td class=\"c0202\">&nbsp;</td>";
		}
	?>
	<td class="c0215"><?php echo $totalCredits; ?></td>
</tr>
<?php 	//debug($marksData);
		//debug($class);
		//debug($listCoursesOffered);
		//debug($listCoursesStudents);
		//debug($listSGPA);
		//debug($listLG);
		//debug($SGPA);
		//debug($flags);
		$count = 1; for($i=0; $i < count($marksData); $i++) {
			//debug($i);debug($marksData[$i]);
?>					
<tr>
	<td rowspan="5" class="c0301"><?php echo $count; ?></td>
	<td rowspan="5" class="c0302"><?php for($j=0; $j<count($listCoursesId); $j++) {
											if(isset($marksData[$i+$j])) {
												echo $marksData[$i]['student']['name'] . "<br/>" . $marksData[$i]['student']['registration_no'];
												break;
											}
								  }
								  ?></td>
	<td class="c0303">IA</td>
	<?php if(count($listCoursesId) > 13) {
			echo "Error of columns in IA";
			exit;
		}
		foreach($listCoursesId as $key => $value) {
			if(isset($marksData[$i]) && isset($listCoursesStudents[$marksData[$i]['student_id']][$key])) {
				echo "<td class=\"c0305\">" . (($value['type'] == "Theory") ? $listCoursesStudents[$marksData[$i]['student_id']][$key]['internal_assessment'] : "-") . "</td>";
			}
			else {
				echo "<td class=\"c0305\">&nbsp;</td>";
			}
		}
		for($j=0;$j<(13-count($listCoursesId)); $j++) {
			echo "<td class=\"c0305\">&nbsp;</td>";
		} //debug($marksData[$i]['student_id']);
	?>
	<td rowspan="3" class="c0317"><?php echo (isset($flags[$marksData[$i]['student_id']]) ? "-" : (($SGPA[$marksData[$i]['student_id']] == 0) ? "" : number_format(round(bcdiv(bcdiv($SGPA[$marksData[$i]['student_id']], $totalCredits, 2),10,3),2),2))); ?></td>
	<td rowspan="5" class="c0318"><?php if(isset($flags[$marksData[$i]['student_id']])) {
											echo "Reappear in ";
											foreach($listCoursesId as $key => $value) {
												if(isset($marksData[$i]) && in_array($key, $flags[$marksData[$i]['student_id']])) {
													echo $value['course_code'] . ",";
												}
											}
										}	
										else if($SGPA[$marksData[$i]['student_id']] > 0) {
											echo $class[bcdiv($SGPA[$marksData[$i]['student_id']], $totalCredits, 0)+1];
										}
										else {
											echo ""; 
										}
										?></td>
</tr>
<tr>
	<td class="c0401">ES</td>
	<?php if(count($listCoursesId) > 13) {
			echo "Error of columns in IA";
			exit;
		}
		foreach($listCoursesId as $key => $value) {
			if(isset($marksData[$i]) && isset($listCoursesStudents[$marksData[$i]['student_id']][$key])) {
				echo "<td class=\"c0403\">" . (($value['type'] == "Theory") ? $listCoursesStudents[$marksData[$i]['student_id']][$key]['end_semester_examination'] : "-") . "</td>";
			}
			else {
				echo "<td class=\"c0403\">&nbsp;</td>";
			}
		}
		for($j=0;$j<(13-count($listCoursesId)); $j++) {
			echo "<td class=\"c0403\">&nbsp;</td>";
		}
	?>
</tr>
<tr>
	<td class="c0501">MO</td>
	<?php if(count($listCoursesId) > 13) {
			echo "Error of columns in IA";
			exit;
		}
		foreach($listCoursesId as $key => $value) {
			if(isset($marksData[$i]) && isset($listCoursesStudents[$marksData[$i]['student_id']][$key])) {
				echo "<td class=\"c0503\">" . (($value['type'] == "Seminar" || $value['type'] == "Lab") ? (is_numeric($listCoursesStudents[$marksData[$i]['student_id']][$key]['total']) ? round($listCoursesStudents[$marksData[$i]['student_id']][$key]['total']) : $listCoursesStudents[$marksData[$i]['student_id']][$key]['total']) : round(bcadd($listCoursesStudents[$marksData[$i]['student_id']][$key]['internal_assessment'], $listCoursesStudents[$marksData[$i]['student_id']][$key]['end_semester_examination'], 2))) . "</td>";
			}
			else {
				echo "<td class=\"c0503\">&nbsp;</td>";
			}
		}
		for($j=0;$j<(13-count($listCoursesId)); $j++) {
			echo "<td class=\"c0503\">&nbsp;</td>";
		}
	?>
</tr>
<tr>
	<td class="c0601">LG</td>
	<?php if(count($listCoursesId) > 13) {
			echo "Error of columns in IA";
			exit;
		}
		foreach($listCoursesId as $key => $value) {
			//debug($listCoursesStudents[$marksData[$i]['student_id']][$key]);
			//debug($key);
			if(isset($marksData[$i]) && isset($listCoursesStudents[$marksData[$i]['student_id']][$key]) && !empty($listCoursesStudents[$marksData[$i]['student_id']][$key]['letter_grade'])) {
				if($listCoursesStudents[$marksData[$i]['student_id']][$key]['letter_grade'] == 'F') {
					echo "<td class=\"c0603\" style=\"color: red;\">" . $listCoursesStudents[$marksData[$i]['student_id']][$key]['letter_grade'] . "</td>";
				}
				else {
					echo "<td class=\"c0603\">" . $listCoursesStudents[$marksData[$i]['student_id']][$key]['letter_grade'] . "</td>";
				}
			}
			else {
				echo "<td class=\"c0603\">&nbsp;</td>";
			}
		}
		for($j=0;$j<(13-count($listCoursesId)); $j++) {
			echo "<td class=\"c0603\">&nbsp;</td>";
		}
	?>
	<td rowspan="2" class="c0615"><?php //debug($listSGPA[bcdiv($SGPA[$marksData[$i]['student_id']], $totalCredits, 0)+1]);
									if(isset($flags[$marksData[$i]['student_id']])) {
										echo "-";
									}	
									else if($SGPA[$marksData[$i]['student_id']] == 0) {
										echo "";
									}
									else {
										echo $listLG[intval($listSGPA[bcdiv($SGPA[$marksData[$i]['student_id']], $totalCredits, 0)+1]*10)+1];
									}
									?></td>
</tr>
<tr>
	<td class="c0701">GP</td>
	<?php if(count($listCoursesId) > 13) {
			echo "Error of columns in IA";
			exit;
		}
		foreach($listCoursesId as $key => $value) {
			if(isset($marksData[$i]) && isset($listCoursesStudents[$marksData[$i]['student_id']][$key]) && !empty($listCoursesStudents[$marksData[$i]['student_id']][$key]['grade_point'])) {
				//debug($listSGPA); //debug($listCoursesStudents); debug($key); debug($listCoursesStudents[$marksData[$i]['student_id']][$key]['total']);
					echo "<td class=\"c0703\">" . (($value['type'] == "Seminar" || $value['type'] == "Lab") ? (is_numeric($listCoursesStudents[$marksData[$i]['student_id']][$key]['total']) ? bcadd($listSGPA[round($listCoursesStudents[$marksData[$i]['student_id']][$key]['total'])+1],0,1) : $marksData[$i]['student_id'][$key]['total'] ) : $listSGPA[round(bcadd($listCoursesStudents[$marksData[$i]['student_id']][$key]['internal_assessment'], $listCoursesStudents[$marksData[$i]['student_id']][$key]['end_semester_examination'], 2)+1)]) . "</td>";
			}
			else {
				echo "<td class=\"c0703\">&nbsp;</td>";
			}
		}
		for($j=0;$j<(13-count($listCoursesId)); $j++) {
			echo "<td class=\"c0703\">&nbsp;</td>";
		}
	?>
</tr>
<?php

	$i = $i + count($listCoursesId) - 1;
	$count++;
	
} ?>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>
<br/>
</br/>
<br/>
<table>
	<tr>
		<td>Prepared by:</td>
		<td></td>
		<td>Checked by:</td>
		<td></td>
		<td>Verified by:</td>
		<td></td>
		<td>HoD/O.HoD:</td>
		<td></td>
		<td>Dean/Asso. Dean:</td>
		<td></td>
		<td>COE:</td>
		<td></td>
	</tr>
</table>
<br/>
<br/>