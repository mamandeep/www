<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

table {
    width: 100%;
}

th {
    height: 50px;
    text-align: center;
}
td {
    height: 50px;
    text-align: center;
    vertical-align: bottom;
}
</style>
<script> 
        var eligible_values = [];
        var category_pref_values = [];
        var pwd_values = [];
        var wardofdef_category_values = [];
	
</script>
<div><strong style="color: red;">Online Counselling for Special drive to fill vacant seats under SC/ST/OBC(NCL) categories</strong>
</div>
<?php if(isset($lockseatOpen) && $lockseatOpen === true && (isset($c_category) && $c_category != "2")) { ?>
<div>
<!--<ul>
<li><strong style="color: red;">Before locking your preference please <a href="<?php echo $this->request->webroot . 'files/Vacant after Status C2R3.pdf'; ?>"> click here</a> to view the tentative list of vacant seats</strong></li>
</ul>-->
    <p style="font-weight: bold; color: green;">The currently locked programme is:  
    <?php         $str = '';
        $seatLocked = false; 
        foreach ($rankings as $seat) {
        //debug($seat); debug($seat->id);debug($lockedSeat);
        //debug(isset($lockedSeat) && $seat->id === $lockedSeat->rank_id);
        if(isset($lockedSeat) && $seat->id === $lockedSeat->rank_id) { 
                $str .= " <strong>" . $seat->programme->name . "</strong>";
                //$str .= ";Category: <strong>" . $seat->category->type . "</strong>";
                //$str .= ";Merit in Programme: <strong>" . $seat->rank . "</strong>";
                $seatLocked = true;
        } 
    }
    if($seatLocked === false) {
        $str .= "<strong>Nil</strong>";
    }
    echo $str;
?>  </p>
</div>
<?php 
     echo $this->Form->create($lockedSeat, [
        'url' => ['controller' => 'seats', 'action' => 'lockspecialcategoryseat'],
        'id' => 'lockseat_form'
     ]); 
?>
<table>
    <tr>
        <th><label>Lock Seat</label></th>
        <th><label>Programme Name</label></th>
    </tr>
    <?php   $index=0;$i=0; foreach ($rankings as $seat): ?>
    <tr>
        <td><?php //debug($seat); debug($seat->id); debug($lockedSeat['rank_id']);
                $options = array(array('value' => $seat->id, 'text' => '' ));
                echo $this->Form->radio(
                    "selected_course",
                    $options, [
                    'hiddenField' => false ]
                ); ?></td>
        <td> <input type="hidden" name="prog_name" value="<?= $seat->programme->name ?>"/>
            <?= $seat->programme->name ?>
        </td>
    </tr>
    <?php $i++; endforeach; ?>
</table>
<br/>
<br/>
<div style="text-align: center"><?php echo $this->Form->button(__('Submit')); ?></div>
<?php echo $this->Form->end(); ?>
<br/>

<script>
$(document).ready(function(){
    
    if(eligible_values[0]) $("#0_eligible_for_open").val(eligible_values[0]);
    if(eligible_values[1]) $("#1_eligible_for_open").val(eligible_values[1]);
    if(eligible_values[2]) $("#2_eligible_for_open").val(eligible_values[2]);
    if(category_pref_values[0]) $("#0_category_pref").val(category_pref_values[0]);
    if(category_pref_values[1]) $("#1_category_pref").val(category_pref_values[1]);
    if(category_pref_values[2]) $("#2_category_pref").val(category_pref_values[2]);
    
    $("#lockseat_form").submit(function(e){
        var prog_name = '';
        var eligible_for_open = '';
	var eligible_for_open = '';
        var category_pref = '';
        var eligibility = [];
        <?php foreach($rankings as $seat) { 
                $eligibility = addslashes($seat->programme->eligibility);
                echo "eligibility.push({'{$seat->programme->name}': '{$eligibility}'});";
            } ?>
        $('input[name=selected_course]:checked').closest('tr').find('input[name=prog_name]').each(function(){
            prog_name = $(this).val();
        });
        $('input[name=selected_course]:checked').closest('tr').find('select[name=eligible_for_open\\[\\]]').each(function(){
            eligible_for_open = $(this).val();
        });
        $('input[name=selected_course]:checked').closest('tr').find('select[name=category_pref\\[\\]] :selected').each(function(){
            category_pref = $(this).text();
        });
        eligibility_str = '';
        for(var i=0; i< eligibility.length ; i++) {
            if(eligibility[i][prog_name]) {
                eligibility_str = eligibility[i][prog_name];
            }
        }
        if (!confirm("Please ensure that you fulfill the following eligibility conditions for " + prog_name + " before locking: \n\n " + eligibility_str + "."))
        {
            e.preventDefault();
            return;
        }
    });
});
</script>
<?php } else { ?>
 <div>Lock Special Drive Seat is closed at this time.</div>
<?php } ?>
