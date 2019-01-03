<?= $this->Flash->render() ?>
<?= $this->Form->create($users); ?>
    <fieldset>
        <legend><strong><?= __('Please enter your Registered Email I\'d and password') ?><strong></legend>
         <table width="100%">
            <tr>
                <td width="30%" class="form-label">Registered Email I'd (e.g. abc@yahoo.com)</td>
                <td><?php echo $this->Form->control('email', ['label' => false, 'style' => 'width: 300px', 'maxlength' => 100]) ?></td>
            </tr>
            <tr>
                <td class="form-label">Password</td>
                <td><?php echo $this->Form->control('password', ['label' => false, 'style' => 'width: 300px', 'maxlength' => 100]); ?></td>
            </tr>
            <tr>
                <td></td>
                <td align="left"><?= $this->Form->button(__('Login')); ?></td>
            </tr>
        </table>
    </fieldset>
<?= $this->Form->end() ?>
