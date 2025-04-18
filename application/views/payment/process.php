<div id="Inner_shop">
	<div class="blue" id="box2">
		<h3 style="text-align: center;">
		<?php
			// Note: this page tells the customer to wait a little bit while
			// he or she is being redirected to PayPal.
			// If he or she corrupts the hidden form that is going to be sent to
			// PayPal, the system does not allows him or her to pay. 
			// This mechanism is furhter defined in payment.php.
			if($param2==false)
			{
				echo 'Your transaction request has been declined.';
			}
			else
			{
				echo 'Kérlek várj. A kérésed feldolgozás alatt van.';
			}
		?>
		</h3>
	</div>
</div>