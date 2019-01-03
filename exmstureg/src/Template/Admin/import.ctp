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
            <tr><td><?php echo $this->Form->input('excelfile', ['type' => 'file', 'label' => 'Upload Excel Data', 'class' => 'form-control']); ?></td><td><embed src="<?= $this->request->webroot . 'uploads' . DS . 'files' . DS . $Uploadfile['file']; ?>" width="220px" height="150px"/></td></tr>
            <tr><td colspan="3"><?php echo $this->Form->button(__('Upload'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?> 
            </tr>
        </table>
            
        <?php echo $this->Form->end(); ?>
    </div>
</div>