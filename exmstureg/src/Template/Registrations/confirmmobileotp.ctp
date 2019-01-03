<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Confirm Mobile Number - Please enter One Time Password (OTP)') ?></legend>
        <?= $this->Form->control('otp_value', ['label' => 'OTP (One Time Password)', 'type' => 'password']) ?>
        <?= $this->Form->control('role', [ 
            'value' => 'student',
            'type' => 'hidden'
        ]) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>