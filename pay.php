
<!--  -->
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Payu</title>
  <script type="text/javascript">
	function cardSubmit() {
		location.href = "pre/card.php";
	}

	function cashSubmit() {
		location.href = "";
	}

	function bank_payments() {
		location.href = "";
	}

	function bank_transfer() {
		location.href = "";
	}
  
  </script>
 </head>
 <body>
  <div>
  <!-- Visa, Mastercard, Amex and Diners -->
  	Credit cards: 
  	<input type="button" value="Credit cards" name="cards" id="cards" onclick="cardSubmit()"><p>
  	Cash payments:
  	<!-- Baloto" and "Efecty -->
  	<input type="button" value="Cash payments" name="cash" id="cash" onclick="cashSubmit()"><p>
  	Bank payments:
  	<!-- 波哥大银行&哥伦比亚银行 -->
  	<input type="button" value="Bank Payments" name="bank_payments" id="bank_payments" onclick="bank_payments()"><p>
  	Bank Transfer：
  	<input type="button" value="Bank Transfer" name="bank_transfer" id="bank_transfer" onclick="bank_transfer()"><p>
  </div>
 </body>
</html>

