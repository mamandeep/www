<style type="text/css">
    td {

        /* css-3 */
        white-space: -o-pre-wrap; 
        word-wrap: break-word;
        white-space: pre-wrap; 
        white-space: -moz-pre-wrap; 
        white-space: -pre-wrap; 

    }

    table { 
        table-layout: fixed;
        width: 650px;
    }

    .print_required label:after { content:"*"; }

    .print_headers {
        font-size: 15px;
        color: #010101;
        padding: 3px;
        font-family: Verdana, Geneva, sans-serif;
    }

    .print_value {
        font-size: 15px;
        font-weight: bold;
        color: black;
        padding: 3px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .misc_col1 {
        width: 45%;
    }

    tr.spaceUnder>td {
        padding-bottom: 15px;
    }

    tr.spaceUpper>td {
        padding-top: 15px;
    }

    #employee_endorsement {
        border: none;
    }
    #employee_endorsement tr {
        border: none;
    }
    #employee_endorsement tr td{
        border: none;
    }
</style>

<?php //debug($report); ?>

<table width="650px">
<tr>
<td class="print_headers">Name</td>
<td class="print_value"><?php echo $report['name']; ?></td>
<td></td>
<td><img src="<?php if(!empty($report['photo']) && file_exists(WWW_ROOT . DS . 'uploads' . DS . 'files' . DS . $report['photo'])) { echo $this->request->webroot . 'uploads' . DS . 'files' . DS . $report['photo']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"/></td>
</tr>
<tr>
<td class="print_headers">Father's Name</td>
<td class="print_value"><?php echo $report['father_name']; ?></td>
<td></td>
<td><img src="<?php if(!empty($report['signature']) && file_exists(WWW_ROOT . DS . 'uploads' . DS . 'files' . DS . $report['signature'])) { echo $this->request->webroot . 'uploads' . DS . 'files' . DS . $report['signature']; } else { echo ""; } ?>" alt="Signature" height="132px" width="132px"/></td>
</tr>
<tr>
<td class="print_headers">Gender</td>
<td class="print_value"><?php echo $report['gender']; ?></td>
<td>Centre</td>
<td class="print_value"><?php echo $report['centre']; ?></td>
</tr>
<tr>
<td class="print_headers">Mentor</td>
<td class="print_value"><?php echo $report['mentor']; ?></td>
<td rowspan="2">Permanent Address</td>
<td rowspan="2" class="print_value"><?php echo $report['p_address']; ?></td>
</tr>
<tr>
<td class="print_headers">Day Scholar</td>
<td class="print_value"><?php echo $report['day_scholar']; ?></td>
</tr>
<tr>
<td class="print_headers">Area of Training/Placement</td>
<td class="print_value"><?php echo $report['area_of_tp']; ?></td>
<td>Mobile No.</td>
<td class="print_value"><?php echo $report['mobile_no']; ?></td>
</tr>
</table>