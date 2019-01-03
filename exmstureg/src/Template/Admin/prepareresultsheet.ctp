<?php
	//debug(count($marksData));
?>
<style type="text/css">
table {
	width: 100%;
	border-collapse: collapse;
	table-layout: fixed;
	overflow-wrap: break-word;
}

.c63 {
	border: 1px solid black;
}

.c02, .c03, .c04, .c21, .c22 {
	border: none;
}

.c0001 {
	border: 1px solid black;
	background-color: grey;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
}

.c0101, .c0108, .c0109, .c0110, .c0111,.c0112,.c0113,.c0114,.c0115,.c0116,.c0117,.c0118 {
	border: 1px solid black;
	width: 1%;
	font-weight: bold;
}

.c0102 {
	border: 1px solid black;
	width: 10%;
	font-weight: bold;
}

.c0201, .c0202, .c0203, .c0204, .c0205, .c0206, .c0207, .c0208, .c0209, .c0210, .c0211, .c0212, .c0213,
.c0214, .c0215, .c0216, .c0301, .c0302, .c0303, .c0304, .c0305, .c0306, .c0307, .c0308, .c0309, .c0310,
.c0311, .c0312, .c0313, .c0314, .c0315, .c0316, .c0317, .c0318, .c0401, .c0402, .c0403, .c0404, .c0405,
.c0406, .c0407, .c0408, .c0409, .c0410, .c0411, .c0412, .c0413, .c0414, .c0501, .c0502, .c0503, .c0504, .c0505,
.c0506, .c0507, .c0508, .c0509, .c0510, .c0511, .c0512, .c0513, .c0514, .c0601, .c0602, .c0603, .c0604, .c0605,
.c0606, .c0607, .c0608, .c0609, .c0610, .c0611, .c0612, .c0613, .c0614, .c0615, .c0701, .c0702, .c0703, .c0704, .c0705,
.c0706, .c0707, .c0708, .c0709, .c0710, .c0711, .c0712, .c0713, .c0714
{
	border: 1px solid black;
	text-align: center;
	font-weight: bold;
}

.c0103, .c0104, .c0105, .c0106, .c0107, .c0108 {
	transform: rotate(270deg);
	font-weight: bold;
	border: 1px solid black;
	height: 80px;
}



</style>
<div style="text-align: center; font-size: 18px; font-weight: bold;">Central University of Punjab, Bathinda</div>
<div style="text-align: center; font-size: 12px; font-weight: bold;">TABULATION SHEET</div>
<div style="font-size: 12px; font-weight: bold;"><div style="float: left;">LEFT</div><div style="float: right;">RIGHT</div></div>
<br/>
<div style="text-align: center; font-size: 10px; font-weight: bold;">Fourth Semester Examination Held in June 2017</div>
<table width="100%">
<tr>
	<td width="1%"></td>
	<td width="10%"></td>
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
<tr>
	<td colspan="18" class="c0001"><?php echo $marksData[0]['programme']['name']; ?></td>
</tr>
<tr>
	<td rowspan="2" class="c0101">S. No.</td>
	<td rowspan="2" class="c0102">Name of the Students and Registration Number</td>
	<td class="c0103">Course Code</td>
	<td class="c0104">PBL.600*</td>
	<td class="c0105">PBL.606</td>
	<td class="c0106">PBL.607</td>
	<td class="c0107">PBL.608</td>
	<td class="c0108">PBL.612</td>
	<td class="c0109">&nbsp;</td>
	<td class="c0110">&nbsp;</td>
	<td class="c0111">&nbsp;</td>
	<td class="c0112">&nbsp;</td>
	<td class="c0113">&nbsp;</td>
	<td class="c0114">&nbsp;</td>
	<td class="c0115">&nbsp;</td>
	<td class="c0116">&nbsp;</td>
	<td class="c0117">SGPA & LG</td>
	<td rowspan="2" class="c0118">Result</td>
</tr>
<tr>
	<td class="c0201">Cred.</td>
	<td class="c0202">8</td>
	<td class="c0203">4</td>
	<td class="c0204">5</td>
	<td class="c0205">4</td>
	<td class="c0206">4</td>
	<td class="c0207">&nbsp;</td>
	<td class="c0208">&nbsp;</td>
	<td class="c0209">&nbsp;</td>
	<td class="c0210">&nbsp;</td>
	<td class="c0211">&nbsp;</td>
	<td class="c0212">&nbsp;</td>
	<td class="c0213">&nbsp;</td>
	<td class="c0214">&nbsp;</td>
	<td class="c0215">24</td>
</tr>
<?php $count = 1; for($i=0; $i < count($marksData); $i++) { ?>
<tr>
	<td rowspan="5" class="c0301"><?php echo $count; ?></td>
	<td rowspan="5" class="c0302"><?php echo $marksData[$i]['student']['name']; ?></td>
	<td class="c0303">IA</td>
	<td class="c0304">&nbsp;</td>
	<td class="c0305"><?php echo $marksData[$i]['internal_assessment']; ?></td>
	<td class="c0306"><?php if(isset($marksData[$i+1]) && $marksData[$i]['student_id'] == $marksData[$i+1]['student_id']) echo $marksData[$i+1]['internal_assessment']; ?></td>
	<td class="c0307"><?php if(isset($marksData[$i+2]) && $marksData[$i]['student_id'] == $marksData[$i+2]['student_id']) echo $marksData[$i+2]['internal_assessment']; ?></td>
	<td class="c0308"><?php if(isset($marksData[$i+3]) && $marksData[$i]['student_id'] == $marksData[$i+3]['student_id']) echo $marksData[$i+3]['internal_assessment']; ?></td>
	<td class="c0309">&nbsp;</td>
	<td class="c0310">&nbsp;</td>
	<td class="c0311">&nbsp;</td>
	<td class="c0312">&nbsp;</td>
	<td class="c0313">&nbsp;</td>
	<td class="c0314">&nbsp;</td>
	<td class="c0315">&nbsp;</td>
	<td class="c0316">&nbsp;</td>
	<td rowspan="3" class="c0317">7.78</td>
	<td rowspan="5" class="c0318">Pass with Letter Grade 'A' (Very Good)</td>
</tr>
<tr>
	<td class="c0401">ES</td>
	<td class="c0402">S</td>
	<td class="c0403"><?php echo $marksData[$i]['end_semester_examination']; ?></td>
	<td class="c0404"><?php if(isset($marksData[$i+1]) && $marksData[$i]['student_id'] == $marksData[$i+1]['student_id']) echo $marksData[$i+1]['end_semester_examination']; ?></td>
	<td class="c0405"><?php if(isset($marksData[$i+2]) && $marksData[$i]['student_id'] == $marksData[$i+2]['student_id']) echo $marksData[$i+2]['end_semester_examination']; ?></td>
	<td class="c0406"><?php if(isset($marksData[$i+3]) && $marksData[$i]['student_id'] == $marksData[$i+3]['student_id']) echo $marksData[$i+3]['end_semester_examination']; ?></td>
	<td class="c0407">&nbsp;</td>
	<td class="c0408">&nbsp;</td>
	<td class="c0409">&nbsp;</td>
	<td class="c0410">&nbsp;</td>
	<td class="c0411">&nbsp;</td>
	<td class="c0412">&nbsp;</td>
	<td class="c0413">&nbsp;</td>
	<td class="c0414">&nbsp;</td>
</tr>
<tr>
	<td class="c0501">MO</td>
	<td class="c0502">&nbsp;</td>
	<td class="c0503"><?php echo $marksData[$i]['internal_assessment'] + $marksData[$i]['end_semester_examination']; ?></td>
	<td class="c0504"><?php if(isset($marksData[$i+1]) && $marksData[$i]['student_id'] == $marksData[$i+1]['student_id']) { echo $marksData[$i+1]['internal_assessment'] + $marksData[$i+1]['end_semester_examination']; } ?></td>
	<td class="c0505"><?php if(isset($marksData[$i+2]) && $marksData[$i]['student_id'] == $marksData[$i+2]['student_id']) { echo $marksData[$i+2]['internal_assessment'] + $marksData[$i+2]['end_semester_examination']; } ?></td>
	<td class="c0506"><?php if(isset($marksData[$i+3]) && $marksData[$i]['student_id'] == $marksData[$i+3]['student_id']) { echo $marksData[$i+3]['internal_assessment'] + $marksData[$i+3]['end_semester_examination']; } ?></td>
	<td class="c0507">&nbsp;</td>
	<td class="c0508">&nbsp;</td>
	<td class="c0509">&nbsp;</td>
	<td class="c0510">&nbsp;</td>
	<td class="c0511">&nbsp;</td>
	<td class="c0512">&nbsp;</td>
	<td class="c0513">&nbsp;</td>
	<td class="c0514">&nbsp;</td>
</tr>
<tr>
	<td class="c0601">LG</td>
	<td class="c0602">S</td>
	<td class="c0603"><?php echo $marksData[$i]['letter_grade']; ?></td>
	<td class="c0604"><?php if(isset($marksData[$i+1]) && $marksData[$i]['student_id'] == $marksData[$i+1]['student_id']) echo $marksData[$i+1]['letter_grade']; ?></td>
	<td class="c0605"><?php if(isset($marksData[$i+2]) && $marksData[$i]['student_id'] == $marksData[$i+2]['student_id']) echo $marksData[$i+2]['letter_grade']; ?></td>
	<td class="c0606"><?php if(isset($marksData[$i+3]) && $marksData[$i]['student_id'] == $marksData[$i+3]['student_id']) echo $marksData[$i+3]['letter_grade']; ?></td>
	<td class="c0607">&nbsp;</td>
	<td class="c0608">&nbsp;</td>
	<td class="c0609">&nbsp;</td>
	<td class="c0610">&nbsp;</td>
	<td class="c0611">&nbsp;</td>
	<td class="c0612">&nbsp;</td>
	<td class="c0613">&nbsp;</td>
	<td class="c0614">&nbsp;</td>
	<td rowspan="2" class="c0615">Calculate Overall Grade</td>
</tr>
<tr>
	<td class="c0701">GP</td>
	<td class="c0702">&nbsp;</td>
	<td class="c0703">Calcualte GP</td>
	<td class="c0704">Calcualte GP</td>
	<td class="c0705">Calcualte GP</td>
	<td class="c0706">Calcualte GP</td>
	<td class="c0707">&nbsp;</td>
	<td class="c0708">&nbsp;</td>
	<td class="c0709">&nbsp;</td>
	<td class="c0710">&nbsp;</td>
	<td class="c0711">&nbsp;</td>
	<td class="c0712">&nbsp;</td>
	<td class="c0713">&nbsp;</td>
	<td class="c0714">&nbsp;</td>
</tr>
<?php 
	if(isset($marksData[$i+1]) && $marksData[$i]['student_id'] != $marksData[$i+1]['student_id']) {
	}
	else if (isset($marksData[$i+2]) && $marksData[$i]['student_id'] != $marksData[$i+2]['student_id']) {
	$i = $i +1;
	}
	else if (isset($marksData[$i+3]) && $marksData[$i]['student_id'] != $marksData[$i+3]['student_id']) {
	$i = $i +2;
	}
	else {
	$i = $i +3;
	}
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