<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

table {
    table-layout: fixed;
    width=2000px;
}

th {
    height: 50px;
    text-align: center;
}
td {
    height: 50px;
    text-align: center;
    vertical-align: bottom;
}
</style>
<?php /* <style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

table {
    width: 100%;
}

th {
    height: 50px;
    text-align: center;
}
td {
    height: 50px;
    text-align: center;
    vertical-align: bottom;
}
</style> */ ?>
<div style="font-size: 16px; font-weight: bold; text-align: center;">Welcome to Admin Panel for CUPB Fee Submission 2017-18</div>
<div style="text-align: center;">Summary of Fee Submission - 2017-18 as on <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-Y H:i'); ?></div>
<div style="width:100%;overflow: scroll; border:10px solid crimson; height:300px;;">
<table boder="2px solid black" style="border-collapse: collapse;">
<tr>
<th>S.No.</th>
<th>Registration No.</th>
<th>Name</th>
<th>Course</th>
<th>Semester</th>
<th>Academic Fee</th>
<th>Academic Fee Payment ID</th>
<th>Academic Fee Payment Date</th>
<th>Hostel Fee</th>
<th>Hostel Fee Payment ID</th>
<th>Hostel Fee Payment Date</th>
<th>Academic Fee Fine</th>
</tr>
<?php $count = 1; foreach($report as $student) { ?>
<tr>
    <td><?= $count++ ?></td>
    <td><?= $student['reg_no'] ?></td>
    <td><?= $student['Student_Name'] ?></td>
    <td><?= $student['Programme_Name'] ?></td>
    <td><?= $student['Semester'] ?></td>
    <td><?= $student['academic_fee'] ?></td>
    <td><?= $student['academic_payment_id'] ?></td>
    <td><?= $student['academic_payment_date'] ?></td>
    <td><?= $student['hostel_fee'] ?></td>
    <td><?= $student['hostel_payment_id'] ?></td>
    <td><?= (intval($student['hostel_fee']) === 0) ? "N/A" : $student['hostel_payment_date']; ?></td>
    <td><?php if($student['late_fee_fine_acad'] == "1") { echo "Late Fee"; } else{echo "N/A";} ?></td>
</tr>
<?php } ?>
</table>
</div>