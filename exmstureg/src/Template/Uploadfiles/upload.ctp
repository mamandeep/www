<style type="text/css">
    td {
        vertical-align: top;
    }
    .upload_notice {
        font-size: 16px;
        font-weight: bold;
        font-family: sans-serif;
        color: royalblue;
    }
</style>
<div class="content">
    <div class="upload_notice">The details about files to be uploaded are as follows:
        <ol>
            <li>Minimum size of file: 10 KB</li>
            <li>Maximum size of file: 50 KB</li>
            <li>Type of file: JPEG/PNG/GIF</li>
        </ol>
    </div>
    <div class="upload-frm">
        <?php echo $this->Form->create($Uploadfile, ['type' => 'file']); ?>
        <table width="100%">
            <tr><td></td>
                <td width="10%"></td>
                <td><strong>PREVIEW</strong></td>
            </tr>
            <?php /*<tr><td><?php echo $this->Form->input('file', ['type' => 'file', 'label' => 'Upload Curriculum Vitae', 'class' => 'form-control']); ?></td><td><embed src="<?= $this->request->webroot . 'uploads' . DS . 'files' . DS . $Uploadfile['file']; ?>" width="220px" height="150px"/></td></tr>*/ ?>
            <tr><td><?php echo $this->Form->control('photo', ['type' => 'file', 'label' => 'Upload Photograph', 'class' => 'form-control']); ?>
                </td>
                <td></td>
                <td><img src="<?php if(!empty($Uploadfile['photo']) && file_exists(WWW_ROOT . DS . 'uploads' . DS . 'files' . DS . $Uploadfile['photo'])) { echo $this->request->webroot . 'uploads' . DS . 'files' . DS . $Uploadfile['photo']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"/>
                </td>
            </tr>
            <tr><td><?php echo $this->Form->control('signature', ['type' => 'file', 'label' => 'Upload Signature', 'class' => 'form-control']); ?>
                </td>
                <td></td>
                <td><img src="<?php if(!empty($Uploadfile['signature']) && file_exists(WWW_ROOT . DS . 'uploads' . DS . 'files' . DS . $Uploadfile['signature'])) { echo $this->request->webroot . 'uploads' . DS . 'files' . DS . $Uploadfile['signature']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"/>
                </td>
            </tr>
            <tr><td colspan="3"><?php echo $this->Form->button(__('Upload'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?> 
                <?php echo $this->Html->link('View Admin Details',
                             array('controller' => 'students', 'action' => 'allotment'),
                             array('class' => 'button btn btn-default btn-success')
                    ); ?></td>
            </tr>
        </table>
            
        <?php echo $this->Form->end(); ?>
    </div>
</div>