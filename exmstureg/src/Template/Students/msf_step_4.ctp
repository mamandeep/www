<style type="text/css">
    td {
        vertical-align: top;
    }
</style>
<div align="center">
<table>
    <tr>
        <td style="text-align: center;" class="form-label"><h2>CENTRAL UNIVERSITY OF PUNJAB<br>CITY CAMPUS, MANSA ROAD, BATHINDA - 151001</h2></td>
    </tr>
    <tr>
        <td style="text-align: center;" class="form-label"><h4>Student Registration</h4></td>
    </tr>
    <tr>
        <td style="text-align: center;" class="form-label"><h4>Application Form / Information Sheet</h4></td>
    </tr>
</table>
</div>
<?php 
    echo $this->Form->create($candidate);
    echo $this->Form->control("id", ['type' => 'hidden']); 
    echo $this->Form->control("user_id", ['type' => 'hidden']); ?>
<div style="font-family: sans-serif; font-size: 20px; font-weight: bold">UGC/CSIR/ICAR/Any Qualifying National Level Test</div>
    <table id="grade-table">
        <thead>
            <tr>
                <th width="10%">Name of Subject</th>
                <th>Year of Passing (YYYY)</th>
                <th>Roll No.</th>
                <th>JRF</th>
                <th>NET</th>
                <th>Examination</th>
                <!--<th>Category</th>-->
            </tr>
        </thead>
        <tbody>
            <tr><td>
                    <?php  echo $this->Form->control('ugc_net_subject', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('ugc_net_mnth_yr', ['label' => false, 'type' => 'number', 'maxlength' => '10']); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("ugc_net_rollno", ['label' => false, 'type' => 'number', 'maxlength' => '10']); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("ugc_net_jrf", array(
                                'options' => array(
                                    'Yes' => 'Yes',
                                    'No' => 'No'),
                                'empty' => 'Select',
                                'style' => 'width: 100%;',
                                'label' => false
                            )); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("ugc_net_net", array(
                                'options' => array(
                                    'Yes' => 'Yes',
                                    'No' => 'No'),
                                'empty' => 'Select',
                                'style' => 'width: 100%;',
                                'label' => false
                            )); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("ugc_net_exam_type", array(
                                'options' => array(
                                    'UGC' => 'UGC',
                                    'CSIR' => 'CSIR',
                                    'ICAR' => 'ICAR',
                                    'ICMR' => 'ICMR',
                                    'GATE' => 'GATE',
                                    'Any Qualifying National Level Test' => 'Any Qualifying National Level Test'),
                                'empty' => 'Select',
                                'style' => 'width: 100%;',
                                'label' => false,
                                'id' => 'ugc_net_exam_type_select'
                            )); ?>
                </td>
            </tr>
    </table>
    <br/>
    <table width="100%" id="ugc_net_any_other_exam_details">
        <tr>
            <td class="table_headertxt" style="vertical-align: middle; text-align: right">Any Qualifying National level test details</td>
            <td><?php echo $this->Form->control('ugc_net_any_other_details', array('label' => false, 'type' => 'textarea', 'style' => 'overflow-y: scroll; height: 60px;', 'maxlength' => '500')); ?></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width="25%"></td>
            <td width="25%" class="form-label">
                <?php echo $this->Html->link('Previous step',
                        array('action' => 'msf_step', $params['currentStep'] -1),
                        array('class' => 'button btn btn-success')
                    ); ?>
            </td>
            <td width="25%" class="form-label">
                <?php echo $this->Form->button(__('Save')); ?>
            </td>
            <td width="25%"></td>
        </tr>
    </table>
    <?php  echo $this->Form->end(); ?>

<script type="text/javascript">
$(document).ready(function () {
        if($("#ugc_net_exam_type_select option:selected").text() === "Any Qualifying National Level Test") {
            $('#ugc_net_any_other_exam_details').css('display', 'table');
        }
        else {
            $('#ugc_net_any_other_exam_details').css('display', 'none');
        }
        
        $("select[name='ugc_net_exam_type']").change(function(){
            if($(this).val() != 'Any Qualifying National Level Test') {
                $('#ugc_net_any_other_exam_details').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#ugc_net_any_other_exam_details').each(function(){
                    $(this).css('display','table');
                });
            }
        });
    });
 </script>