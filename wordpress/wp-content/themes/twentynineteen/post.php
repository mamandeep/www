<div><?php //echo $secureHash; ?></div>
<div><?php //echo $rawSecureHash; ?></div>
<div><?php //echo $sessionData; ?></div>
<h3>Please wait, redirecting to process payment..</h3>
<form action="<?php echo $ACTION_URL;?>" name="payment" method="POST">
<?php
	foreach($_POST as $key => $value) {
?>
<input type="hidden" value="<?php echo $value;?>" name="<?php echo $key;?>"/>
<?php
	}
?>
<input type="hidden" value="<?php echo $secureHash; ?>" name="secure_hash"/>
</form>
<script>
	$( document ).ready( function(){
		setTimeout(function () {
				document.payment.submit();
		}, 10000);
	} );
</script>
