<?= $this->Flash->render() ?>
<?= $this->Form->create($users); ?>
	<br/>
	<div><strong>Online Admission Portal is closed now. For any enquiry regarding admissions kindly email at admissions@cup.edu.in.</strong></div>
	<br/>
    <fieldset>
        <legend><strong><?= __('Please enter your CUCET Applicant ID and password') ?><strong></legend>
         <table width="100%">
            <tr>
                <td width="30%" class="form-label">CUCET Applicant ID (e.g. PGXXXXXXXX)</td>
                <td width="30%"><?php echo $this->Form->control('username', ['label' => false]) ?></td>
                <td width="20%"></td>
                <td width="20%"></td>
            </tr>
            <tr>
                <td class="form-label">Password</td>
                <td><?php echo $this->Form->control('password', ['label' => false ]); ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><?= $this->Form->button(__('Login')); ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </fieldset>
	<?php /*
	<div>Note: The candidates who faced issues during Registration and registered with 10 digit CUCET Id earlier are now required to Login with 11 digit CUCET Id.</div>
	<br/><br/>
	<ul style="font-size: 16px; font-weight: bold; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
<!--<li><h3>Last Counselling  for  filling  Vacant Seats</h3></li>
<li>On 20th July (6 a.m.) to 21st July (3 p.m.), registered candidates are required to lock any one preference out of the maximum three filled in the form.</li>-->
<li>Programme wise merit list based on locked options will be prepared and seats will be offered for admission on 11th August. If offered seat, submit the fee within the stipulated time.<br/>
<li>In  the  last  counselling  for  filling  vacant  seats, among the locked choices, merit list for the vacant seats will be prepared for each programme and candidate(s) with higher  merit will  be offered  the  seat  for  fee  submission, subject  to  the  availability  of 
seats. Failure  to  submit  the  fee  within  due date  and  time  will  lead  to  automatic cancellation of the alloted seat.</li>
<li>If the selected candidate doesn’t submit the fee within due date and time, seat will be offered to the next candidate in the waiting list.</li>
<!--<li>Important: Locking of  any  one  programme  is  compulsory  to  be  considered  for inclusion in the merit list for vacant seats.</li>-->
<!--Above step will be repeated again on 29th June.--> For detailed schedule of online counselling, please <a href="<?php echo $this->request->webroot . 'files/Online Counselling Schedule Vacant Seats July 2018.pdf';?>" target="_blank">click here</a></li>
<li>Same schedule will be followed for supernumerary seats. For detailed schedule, please <a href="<?php echo $this->request->webroot . 'files/Online Counselling Schedule Supernumerary Seats July 2018.pdf';?>" target="_blank">click here</a></li>
</ul>

<div style="font-weight: bold; color: blue;">Note: The candidates who have already registered/participated in the First and Second Counselling can also participate in the Last Counselling. They will be able to lock their preference as per the schedule given above.</div>
<br/>
<!--
<ul>
<li><strong>Step 1:</strong> Click Register using your CUCET ID and other details. Note down the password created during Registration.
</li>
<li><strong>Step 2:</strong> Login using CUCET ID and password.
</li>
<li><strong>Step 3:</strong> Fill the Application Form and click Save.
</li>
<li><strong>Step 4:</strong> Under the Preference page, give option/preference for maximum 03 programmes.<br/>
</li>
<li><strong>Step 5:</strong> On 09th July (6 A.M. to 3 P.M.), Lock any one preference out to the maximum three filled during Step 4.
</li>
<li><strong>Step 6:</strong> Programme wise merit list based on locked options will be prepared and seats will be offered for admission on 10th July. If offered seat, submit the fee within the stipulated time.<br/>
Above steps will be repeated again on 12 and 16 July.
</li>
</ul>-->
<br/>
<label>Information for Prospective Candidates</label>
<br/>
All the Candidates who appeared in CUCET - 2018 examination held on 28-29 April, 2018 are eligible to participate in the online counselling after registration and submission of the Online Cousnelling Form for Admissions - 2018.
<br/>
Candidates are required to read the <a href="<?php echo $this->request->webroot . 'files/Master`s Prospectus- 2018 (FINAL 25.05.2018) - Copy.pdf';?>" target="_blank">prospectus</a> to check the eligibility for the programmes they are applying. Information regarding programmes offered, number of seats, eligibility conditions, fee details and other relevant information is available in the university prospectus available <a href="<?php echo $this->request->webroot . 'files/Master`s Prospectus- 2018 (FINAL 25.05.2018) - Copy.pdf';?>" target="_blank">here</a>.
<br/> */ ?>
<?= $this->Form->end() ?>