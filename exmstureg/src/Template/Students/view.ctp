<style type="text/css">
    td {
        border: 1px solid black;
    }
</style>
<h1>Student Details</h1>
<div>
    <table width="100%" style="border: 1px solid black;">
        <tr><td>Name</td>               <td><?= h($student->name) ?></td></tr>
        <tr><td>Father's Name</td>      <td><?= h($student->father_name) ?></td></tr>
        <tr><td>Mother's Name</td>      <td><?= h($student->mother_name) ?></td></tr>
        <tr><td>Guardian's Name</td>    <td><?= h($student->guardian_name) ?></td></tr>
        <tr><td>Aadhaar Number</td>                   <td><?= h($student->aadhaar_no) ?></td></tr>
        <tr><td>Date of Birth</td>                   <td><?= h($student->dob) ?></td></tr>
        <tr><td>Gender</td>                   <td><?= h($student->gender) ?></td></tr>
        <tr><td>Blood Group</td>             <td><?= h($student->blood_group) ?></td></tr>
        <tr><td>Full Permanent Address</td>             <td><?= h($student->permanent_address) ?></td></tr>
        <tr><td>Full Present Address</td>             <td><?= h($student->present_address) ?></td></tr>
        <tr><td>State</td>             <td><?= h($student->state) ?></td></tr>
        <tr><td>District</td>             <td><?= h($student->district) ?></td></tr>
        <tr><td>City/Village</td>             <td><?= h($student->city_village) ?></td></tr>
        <tr><td>PIN Code</td>             <td><?= h($student->pin_code) ?></td></tr>
        <tr><td>Email ID-01</td>             <td><?= h($student->email1) ?></td></tr>
        <tr><td>Email ID-02</td>             <td><?= h($student->email2) ?></td></tr>
        <tr><td>Nationality</td>             <td><?= h($student->nationality) ?></td></tr>
        <tr><td>Religion</td>             <td><?= h($student->religion) ?></td></tr>
        <tr><td>Category</td>             <td><?= h($student->category) ?></td></tr>
        <tr><td>Sub-Category</td>             <td><?= h($student->sub_category) ?></td></tr>
        <tr><td>Minority</td>             <td><?= h($student->minority) ?></td></tr>
        <tr><td>Supernumerary Quota</td>             <td><?= h($student->supernumerary) ?></td></tr>
        <tr><td>Annual Income of Parents (from all sources)(Rs.)</td>             <td><?= h($student->parents_income) ?></td></tr>
        <tr><td>Economically Deprived / Backward</td>             <td><?= h($student->economically_backward) ?></td></tr>
        <tr><td>Any Card Holder</td>             <td><?= h($student->economically_backward_detail) ?></td></tr>
        <tr><td>Mobile No.</td>             <td><?= h($student->mobile_no) ?></td></tr>
        <tr><td>Emergency Contact No.</td>             <td><?= h($student->emer_contact_no) ?></td></tr>
        <tr><td>Name of Emergency Contact</td>             <td><?= h($student->emer_name) ?></td></tr>
        <tr><td>Relationship with student</td>             <td><?= h($student->emer_relation) ?></td></tr>
        <tr><td>Hosteler</td>             <td><?= h($student->hosteler) ?></td></tr>
        <tr><td>Day Scholar</td>             <td><?= h($student->day_scholar) ?></td></tr>
        <tr><td>Fellowship</td>             <td><?= h($student->fellowship) ?></td></tr>
        <tr><td>Any Gap in Studies</td>             <td><?= h($student->gap_in_studies) ?></td></tr>
        <tr><td>Migration and Character certificate</td>             <td><?= h($student->migration_character) ?></td></tr>
        <tr><td>Examination Details</td></tr>
        <tr><td>Name of Subject</td>    <td><?= h($student->ugc_net_subject) ?></td></tr>
        <tr><td>Year of Passing</td>    <td><?= h($student->ugc_net_mnth_yr) ?></td></tr>
        <tr><td>Roll No.</td>           <td><?= h($student->ugc_net_rollno) ?></td></tr>
        <tr><td>JRF</td>                <td><?= h($student->ugc_net_jrf) ?></td></tr>
        <tr><td>NET</td>                <td><?= h($student->ugc_net_net) ?></td></tr>
        <tr><td>Exam Type</td>                <td><?= h($student->ugc_net_exam_type) ?></td></tr>
        <tr><td>Any Qualifying National level test details</td>        <td><?= h($student->name) ?></td></tr>
    </table>
</div>
<div><?php
    echo $this->Html->link('Go back', array('action' => 'index'), array('class' => 'button btn btn-success'));
    ?></div>