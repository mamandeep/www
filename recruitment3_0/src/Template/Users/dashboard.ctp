<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <!--<fieldset>-->
    <table width="100%" style="table-layout: fixed;">
        <tr>
            <td style="width: 50%"><legend><label style="color: crimson;"><?php echo __('Please enter your registered Email and Password'); ?> </label></legend></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('email'); ?></td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('password', array('label' => 'Password')); ?></td>
        </tr>
    </table>
    <label style="color: crimson;">If you do not have Login credentials, please register by clicking below link.</label>    
    <!--</fieldset>-->
<?php echo $this->Form->end(__('Login')); ?>
<!--<div>How to Register & Fill the Application Form: <a href="<?php echo $this->webroot . 'files/guidelines_for_filling_form.pdf'; ?>" >click here</a></div>-->
<br/>
<?php echo $this->Html->link(
            'Register!!',
            '/users/register',
            array('target' => '_blank')
      ); ?>
<br/>
<br/>
 <?php echo $this->Html->link(
            'Forgot Password',
            '/users/forgotpassword'
      ); ?>
</div>
