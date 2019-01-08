<table width="900" cellpadding="2" cellspacing="2" border="0" align="center">
<tr>
<th colspan="2">
<div id="tabs">

<div id="tabs-1">
	<table>
		<tr>
			<?php if(isset($payment_status) && $payment_status == "0") {
				echo "<td>You have already made the payment.</td>";
				?>
				<td>
					<form action="<?php echo $this->webroot; ?>form/print_bfs" name="payment" method="POST">
               				<button onClick="document.payment.submit();"> Continue </button>
        				</form>
				</td>
				<?php
			      }
			      else if(isset($exempted) && $exempted == "0") {
                                  echo "<td>You have been exempted from making payment.</td>";
                                    ?>
                                    <td>
                                            <form action="<?php echo $this->webroot; ?>form/print_bfs" name="payment" method="POST">
                                            <button onClick="document.payment.submit();"> Continue </button>
                                            </form>
                                    </td>
                                    <?php
                              }
                              else {
				//echo "<td>To make the payment, click on Submit.</td>";
                                  echo "<td>To Continue, click on Submit.</td>";
				?>
				<form action="<?php echo $this->webroot; ?>form/pay" name="payment" method="POST">
        
        			<button onClick="document.payment.submit();"> SUBMIT </button>
        			</form>
                                <!--<form action="<?php echo $this->webroot; ?>form/print_bfs" name="payment" method="POST">
                                    <button onClick="document.payment.submit();"> SUBMIT </button>
        			</form>-->
				<?php
			      } ?>
		</tr>
	</table>
        
	<!--<form  method="post" action="validate_api.php" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
	<!--<div style="font-size: 30px;">Kindly do not proceed further. It will be enabled shortly!</div>-->

</div>


</div>
</th>
</tr>
</table>
