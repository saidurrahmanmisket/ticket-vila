<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
	@csrf
	<div class="form-group">
		<label for="card-element">
			Credit or debit card
		</label>
		<div id="card-element">
			<!-- A Stripe Element will be inserted here. -->
		</div>
		<!-- Used to display form errors. -->
		<div id="card-errors" role="alert"></div>
	</div>
	<button type="submit">Submit Payment</button>
</form>
<script>
    var stripe = Stripe('{{ env('STRIPE_PK') }}');
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');
</script>


</body>
</html>
