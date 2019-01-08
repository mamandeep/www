<?php echo $this->element('nav-top');
echo $this->Html->script('experience');
echo $this->Html->script('experiencephd');

echo $this->Form->create('Experience', array('id' => 'Experience_Details', 'url' => Router::url( null, true ))); ?>
<div class="main_content_header">3. Work Experience (in Reverse Chronological order)</div>
<input type="hidden" name="modified" id="modified" value="false" />
<input type="hidden" name="modifiedphd" id="modifiedphd" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<fieldset>
    <table id="grade-table">
        <thead>
            <tr>
                <th rowspan="2">Designation</th>
                <th rowspan="2">Scale of Pay</th>
                <th rowspan="2">Name & address of University / Institution</th>
                <th rowspan="2">Type of Institute</th>
                <th colspan="3">Period of Experience</th>
                <th rowspan="2">Nature of Duty</th>
                <th rowspan="2">&nbsp;</th>
            </tr>
            <tr>
                <th>From (Date) <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>To (Date) <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>No. of Years / Months (as on last date of online form)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Experience'])) {
                    for ($key = 0; $key < count($this->request->data['Experience']); $key++) {
                        echo $this->element('experience', array('key' => $key, 'org' => (!empty($this->request->data['Experience'][$key]['institute_type']) ? $this->request->data['Experience'][$key]['institute_type'] : 'Central Government')));

                        //var attri1 = 'input[name$="data[Experience]['+ $key + '][from_date]"]';
                        //var attri2 = 'input[name$="data[Experience]['+ $key + '][to_date]"]';
                        //var attri3 = 'input[name$="data[Experience]['+ $key + '][no_of_yrs_mnths]"]';
                        echo "<script>";
                        echo "$('input[name$=\"data[Experience][" . $key . "][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experience][" . $key . "][from_date]\"]');
                            calcuateDiff('input[name$=\"data[Experience][" . $key . "][from_date]\"]', 'input[name$=\"data[Experience][" . $key . "][to_date]\"]', 'input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths_days]\"]');
                        });";
                        echo "$('input[name$=\"data[Experience][" . $key . "][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experience][" . $key . "][to_date]\"]');
                            calcuateDiff('input[name$=\"data[Experience][" . $key . "][from_date]\"]', 'input[name$=\"data[Experience][" . $key . "][to_date]\"]', 'input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths_days]\"]');
                        });";
                        echo "$('input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths_days]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experience][" . $key . "][from_date]\"]', 'input[name$=\"data[Experience][" . $key . "][to_date]\"]', 'input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths_days]\"]');
                        });";
                        echo "</script>";
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <br/><br/>
    <?php echo $this->Form->input('Applicant.id', array('type' => 'hidden'));
        echo $this->Form->input('Applicant.exp_during_phd', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have acquired Experience simultaneously during Ph.D.?',
                        'id' => 'exp_during_phd_select'
                    ));  ?>
    <table id="experiencephd-table">
        <thead>
            <tr>
                <td colspan="10"><div style="font-family: sans-serif; font-weight: bold; font-size: 20px; text-decoration-line: underline;">EXPERIENCE ACQUIRED SIMULTANEOUSLY DURING Ph.D., if any</div></td>
            </tr>
            <tr>
                <th rowspan="2">Designation</th>
                <!--<th rowspan="2">Scale of Pay</th>
                <th rowspan="2">AGP</th>-->
                <th rowspan="2">Name & address of University / Institution</th>
                <!--<th rowspan="2">Type of Institute</th>-->
                <th colspan="3">Period of Experience</th>
                <th rowspan="2">Nature Of Service</th>
                <th rowspan="2">Work Load as per UGC Norms</th>
                <th rowspan="2">Whether fulfill UGC eligibility at the time of appointment</th>
                <th rowspan="2">Leave availed for Ph.D.</th>                
                <th rowspan="2">If applicable, Leave availed From (dt.) (DD/MM/YYYY)</th>
                <th rowspan="2">If applicable, Leave availed To (dt.) (DD/MM/YYYY)</th>
            </tr>
            <tr>
                <th>From Date <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>To Date <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>No. of Years / Months (as on last date of online form)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Experiencephd'])) {
                    for ($key = 0; $key < count($this->request->data['Experiencephd']); $key++) {
                        echo $this->element('experiencephd', array('key' => $key, 'org' => (!empty($this->request->data['Experiencephd'][$key]['institute_type']) ? $this->request->data['Experiencephd'][$key]['institute_type'] : 'Central Government')));

                        //var attri1 = 'input[name$="data[Experience]['+ $key + '][from_date]"]';
                        //var attri2 = 'input[name$="data[Experience]['+ $key + '][to_date]"]';
                        //var attri3 = 'input[name$="data[Experience]['+ $key + '][no_of_yrs_mnths]"]';
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][" . $key . "][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][" . $key . "][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][" . $key . "][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][" . $key . "][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][" . $key . "][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][" . $key . "][from_date]\"]', 'input[name$=\"data[Experiencephd][" . $key . "][to_date]\"]', 'input[name$=\"data[Experiencephd][" . $key . "][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="11"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <br/>
	<?php /*
    <table>
        <tr>
            <td>Total period of experience
            <?php echo $this->Form->input('Applicant.id', array('type' => 'hidden')); ?>
            <td style="text-align: right; padding-left: 10px;">Years</td>
            <td><?php echo $this->Form->input('Applicant.tot_exp_years', array('div' => false, 'label' => false, 'maxlength' => '10')); ?></td>
            <td style="text-align: right; padding-left: 10px;">Months</td>
            <td><?php echo $this->Form->input('Applicant.tot_exp_mnths', array('div' => false, 'label' => false, 'maxlength' => '10')); ?></td>
            <td style="text-align: right; padding-left: 10px;">Days</td>
            <td><?php echo $this->Form->input('Applicant.tot_exp_days', array('div' => false, 'label' => false, 'maxlength' => '10')); ?></td>
        </tr>
    </table>
    <br/>
	*/ ?>
    <div style="font-family: sans-serif; font-size: 20px; font-weight: bold; padding-left: 0px"><?php
        echo $this->Form->input('Applicant.gap_experience_yn', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-select-',
                        'label' => 'Is there any gap in Experience',
                        'id' => 'gap_experience_yn_select'
                    )); ?></div>
    <table id="gap_in_experience">
        <tr>
            <td width="20%" class="table_headertxt">Reason for gap in Experience</td>
            <td><?php echo $this->Form->input('Applicant.gaps_in_experience', array('type' => 'textarea',  'div' => false, 'style' => 'overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
</fieldset>
<script id="grade-template" type="text/x-underscore-template">
    <?php echo $this->element('experience'); ?>
</script>
<script id="experiencephd-template" type="text/x-underscore-template">
    <?php echo $this->element('experiencephd'); ?>
</script>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); 
          echo $this->Form->button('Reset', array(
            'type' => 'reset',
            'div' => false            
        )); ?>
</div>
<?php echo $this->Form->end(); ?>
<script>
    function checkleapyear(datea)
    {
        if(datea.getYear()%4 == 0)
        {
            if(datea.getYear()% 10 != 0)
            {
                return true;
            }
            else
            {
                if(datea.getYear()% 400 == 0)
                    return true;
                else
                    return false;
            }
        }
        return false; 
    } 
    
    function DaysInMonth(Y, M) {
        with (new Date(Y, M, 1, 12)) {
            setDate(0);
            return getDate();
        } 
    } 

    function datediff(date1, date2) {
        var y1 = date1.getFullYear(), m1 = date1.getMonth(), d1 = date1.getDate(),
        y2 = date2.getFullYear(), m2 = date2.getMonth(), d2 = date2.getDate();
        if (d1 < d2) {
            m1--;
            d1 += DaysInMonth(y2, m2);
        }
        if (m1 < m2) {
            y1--;
            m1 += 12;
        }
        return [y1 - y2, m1 - m2, (d1 - d2) + 1 ]; 
    }
    
    function calDiff(from, to) {
        var dat = $(to).val().split("/");
        var date2 = new Date(dat[1]+'/'+dat[0]+'/'+dat[2]);
        var curday = date2.getDate();
        var curmon = date2.getMonth()+1;
        var curyear = date2.getFullYear();
        var dob = $(from).val().split("/");
        var calday = dob[0];
        var calmon = dob[1];
        var calyear = dob[2];
        var curd = new Date(curyear,curmon-1,curday);
        var cald = new Date(calyear,calmon-1,calday);
        var diff = Date.UTC(curyear,curmon,curday,0,0,0) - Date.UTC(calyear,calmon,calday,0,0,0);
        var dife = datediff(curd,cald);
        return dife;
    }
    
    function dateFormatCheck(attr) {
        if(attr && $(attr).val().trim() !== '') {
            var t = $(attr).val().match(/^(\d{2})\/(\d{2})\/(\d{4})$/);
            if(t === null) {
                alert('Date is not in a correct format.');
                //var diff_years = calage();
                /*if(diff_years[0] > 35) {
                    alert('Age is more than eligibilty criteria');
                }
                else {*/
                //$('.age_computed').val(diff_years[0]+' Years, ' + diff_years[1]+' Months, ' + diff_years[2]+' Days');
                //}
            }
            else {
                return true;
            }
        }
    }
    
    function calcuateDiff(from, to, diff) {
        var diff_years;
        if(dateFormatCheck(from) && dateFormatCheck(to)) {
            diff_years = calDiff(from, to);
            $(diff).val(diff_years[0]+' Y, ' + diff_years[1]+' M, ' + diff_years[2]+' D');
        }
    }
    
    $(document).ready(function () {
        
        $('#physical_disable').css('display', 'none');
        $('.age_computed').attr('disabled', 'true');
        dateFormatCheck();
        
        $("#date_of_birth").focusout(function(){
            dateFormatCheck();
        });
        
        if($("#gap_experience_yn_select option:selected").text() === "Yes") {
            $('#gap_in_experience').css('display', 'table');
        }
        else {
            $('#gap_in_experience').css('display', 'none');
        }
        
        if($("#exp_during_phd_select option:selected").text() === "Yes") {
            $('#experiencephd-table').css('display', 'table');
        }
        else {
            $('#experiencephd-table').css('display', 'none');
        }
        
        $("select[name='data[Applicant][gap_experience_yn]']").change(function(){
            if($(this).val() === 'no') {
                $('#gap_in_experience').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#gap_in_experience').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][exp_during_phd]']").change(function(){
            if($(this).val() === 'no') {
                $('#experiencephd-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#experiencephd-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
    });
</script>
