<style type="text/css">

    td {
        /* css-3 */
        white-space: -o-pre-wrap; 
        word-wrap: break-word;
        white-space: pre-wrap; 
        white-space: -moz-pre-wrap; 
        white-space: -pre-wrap; 
        text-align: center;
        vertical-align: top;
    }

    table {
        width: 100%;
        max-width: 1000px;
    }

    th {
        text-align: center;
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
<?php //debug($education_rows); 
        echo $this->Form->create($education_rows, ['name' => 'education_form']); ?>
    <table id="grade-table">
        <thead>
            <tr>
                <th>Name of Degree / Diploma / Certificate / Class</th>
                <th>Name of Course</th>
                <th>Board / University</th>
                <th width="10%">Mode of Study</th>
                <th>Grade / CGPA / Division</th>
                <th>Percentage</th>
                <th>Year of Passing</th>
                <th>Subjects</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>
                    <?php echo $this->Form->hidden("0.id");
                          echo $this->Form->hidden("0.user_id");
                          echo $this->Form->input('0.qualification', array('type' => 'text',
                                                                           'readonly' => 'readonly',
                                                                           'value' => 'Matric',
                                                                           'label' => false,
                                                                           'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('0.course', array(
                                                                    'readonly' => 'readonly',
                                                                    'value' => 'Matric',
                                                                    'label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("0.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("0.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("0.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("0.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("0.year_of_passing", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("0.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("1.id") ?>
                    <?php echo $this->Form->hidden("1.user_id"); ?>
                    <?php echo $this->Form->input('1.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Higher Secondary',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('1.course', array(
                                            'label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("1.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("1.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("1.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("1.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("1.year_of_passing", ['label' => false, 'maxlength'=>'4']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("1.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'maxlength'=>'500',
                                                                       'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("2.id") ?>
                    <?php echo $this->Form->hidden("2.user_id"); ?>
                    <?php echo $this->Form->input('2.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Diploma',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('2.course', array('label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("2.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("2.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("2.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("2.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("2.year_of_passing", ['label' => false, 'maxlength'=>'4']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("2.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'maxlength'=>'500',
                                                                       'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("3.id") ?>
                    <?php echo $this->Form->hidden("3.user_id"); ?>
                    <?php echo $this->Form->input('3.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Graduation',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('3.course', array(
                                            'label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("3.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("3.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("3.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("3.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("3.year_of_passing", ['label' => false, 'maxlength'=>'4']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("3.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'maxlength'=>'500',
                                                                       'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("4.id") ?>
                    <?php echo $this->Form->hidden("4.user_id"); ?>
                    <?php echo $this->Form->input('4.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Post Graduation',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('4.course', array(
                                            'label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("4.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("4.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("4.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("4.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("4.year_of_passing", ['label' => false, 'maxlength'=>'4']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("4.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'maxlength'=>'500',
                                                                       'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("5.id") ?>
                    <?php echo $this->Form->hidden("5.user_id"); ?>
                    <?php echo $this->Form->input('5.qualification', array('type' => 'text',
                                            'readonly' => 'readonly',
                                            'value' => 'M.Phil.',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('5.course', array(
                                            'label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("5.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("5.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("5.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("5.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("5.year_of_passing", ['label' => false, 'maxlength'=>'4']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("5.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'maxlength'=>'500',
                                                                       'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("6.id") ?>
                    <?php echo $this->Form->hidden("6.user_id"); ?>
                    <?php echo $this->Form->input('6.qualification', array('type' => 'textarea',
                                            'value' => 'Any Other Exam',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('6.course', array(
                                            'label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("6.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("6.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("6.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("6.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("6.year_of_passing", ['label' => false, 'maxlength'=>'4']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("6.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'maxlength'=>'500',
                                                                       'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("7.id") ?>
                    <?php echo $this->Form->hidden("7.user_id"); ?>
                    <?php echo $this->Form->input('7.qualification', array('type' => 'textarea',
                                            'value' => 'Any Other Exam',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control('7.course', array(
                                            'label' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->control("7.board", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("7.mode_of_study", array(
                            'options' => array(
                                'Regular' => 'Regular',
                                'Part Time' => 'Part Time',
                                'Distance' => 'Distance'
                            ),
                            'style' => 'width: 100%;',
                            'empty' => 'Select',
                            'label' => false                            
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("7.grade", ['label' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("7.percentage", ['label' => false, 'type' => 'number', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("7.year_of_passing", ['label' => false, 'maxlength'=>'4']); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("7.subjects", array( 'type' => 'textarea',
                                                                       'label' => false,
                                                                       'style' => 'overflow-y: scroll; height: 60px;',
                                                                        'maxlength'=>'500')); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br/>
    <?php /*
    <div style="font-family: sans-serif; font-size: 20px; font-weight: bold">If Ph.D. Pursuing</div>
    <table>
        <tr>
            <th width="10%">Name of Degree / Diploma / Certificate / Class</th>
            <th>Name of Course</th>
            <th>Board / University</th>
            <th width="10%">Mode of Study</th>
            <th>Grade / CGPA / Division</th>
            <th>Percentage (%)</th>
            <th>Date of Registration (DD/MM/YYYY)</th>
        </tr>
        <tbody>
            <tr><td>
                    <?php echo $this->Form->hidden("12.id") ?>
                    <?php echo $this->Form->hidden("12.user_id"); ?>
                    <?php echo $this->Form->input('12.qualification', array('type' => 'textarea',
                                            'value' => 'Ph.D. Pursuing',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('12.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("12.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("12.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("12.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("12.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("12.year_of_passing", ['div' => false]); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br/>
    </div> */ ?>
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
                <?php echo $this->Form->button(__('Next step')); ?>
            </td>
            <td width="25%"></td>
        </tr>
    </table>
    <?php  echo $this->Form->end(); ?>