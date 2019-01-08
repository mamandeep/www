<?php echo $this->Form->create('Registereduser', array('id' => 'Reg_User_Details', 'url' => Router::url( null, true ))); 
?>
<div id="contentContainer">
    <table>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                <div class="main_content_header">Register</div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                <?php echo $this->Form->input('Registereduser.id', array('type' => 'hidden'));
                      echo $this->Form->input('Registereduser.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));  ?>
                First Name
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.first_name', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Last Name
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.last_name', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Category
            </td>
            <td width="20%">
                <?php echo $this->Form->input('Registereduser.category', array(
                    'options' => array(
                        'General' => 'General',
                        'SC' => 'SC',
                        'ST' => 'ST',
                        'OBC' => 'OBC'),
                    'empty' => 'Select',
                    'selected' => 'General',
                    'style' => 'width: 100%;',
                    'label' => false
                )); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Differently Abled
            </td>
            <td width="20%">
                <?php
                    echo $this->Form->input('Registereduser.physically_disabled', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'selected' => 'no',
                        'label' => false,
                        'id' => 'physical_disable_select'
                    )); ?>
            </td>
            <td></td>
        </tr>
        
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Date of Birth (DD/MM/YYYY)
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.dob', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Email:
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.email', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Mobile Number:
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.mobile_no', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Enter the text shown: 
            </td>
            <td><?php 
                    $custom1['width']=150;
                    $custom1['height']=50;
                    $custom1['theme']='default';
                    $this->Captcha->render($custom1);
                ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
            </td>
            <td width="20%">
                <div class="submit">
                    <?php 
                            echo $this->Form->submit('Submit', array('div' => false)); 
                        ?>
                </div></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td colspan="3" style="font-size: 10px">If already registered and have an Applicant Id, proceed to make payment: <a href="<?php echo $this->webroot; ?>form/prepayment" >Click Here</a></td>
        </tr>
    </table>
    
</div>
<?php echo $this->Form->end();
      /*if(isset($this->request->query['registered_user']) && isset($this->request->query['payment_status']) 
                && strval(base64_decode($this->request->query['payment_status'])) != "0") { 
?>    
    <table>
        <tr>    
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Make Payment: 
            </td>
            <td width="20%"><a href="<?php echo $this->webroot; ?>form/prepayment" class="button" id="payment_bt"  >Click Here</a></td>
            <td></td>
        </tr>
    </table>

    <?php      } */ 
       ?>

<script>
    $(document).ready(function () {
        <?php if(isset($this->request->query['payment_status']) && strval(base64_decode($this->request->query['payment_status'])) == "0") { echo "$('#payment_bt').on(\"click\", function (e) {
        e.preventDefault();
    });"; } ?>
            
        $('.creload').on('click', function() {
            var mySrc = $(this).prev().attr('src');
            var glue = '?';
            if(mySrc.indexOf('?')!=-1)  {
                glue = '&';
            }
            $(this).prev().attr('src', mySrc + glue + new Date().getTime());
            return false;
        });
    });
</script>