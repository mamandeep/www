<?php echo $this->Form->create('Registereduser', array('id' => 'Reg_User_Details', 'url' => Router::url( null, true ))); 
?>
<div id="contentContainer">
    <table>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                <div class="main_content_header">Forgot Password</div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                <?php echo $this->Form->input('Registereduser.id', array('type' => 'hidden'));
                      //echo $this->Form->input('Registereduser.std_id', array('type' => 'hidden', 'value' => $this->Session->read('std_id')));  ?>
                Enter your registered email address:
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.email', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Click Submit to generate One Time Password (OTP).
            </td>
            <td></td>
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
    </table>
</div>
<?php echo $this->Form->end(); ?>
        