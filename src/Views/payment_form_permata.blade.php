<!DOCTYPE HTML>
<html>
	<head>
		<title>DOKU Payment</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
		<script src="{{$domain}}/doku-js/assets/js/doku.js?version=<?php echo time()?>"></script>
		<link href="{{$domain}}/doku-js/assets/css/doku.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" rel="stylesheet">

		<script type="text/javascript">
			$(function() {
				setInterval(function() {
					$('img').each(function() {
						var src = $(this).attr('src');
						src = src.replace('http://luna2.nsiapay.com','http://staging.doku.com');
						$(this).attr('src',src);
					})
				},2000);				
			})
		</script>
	</head>
	<body>			
			<section class="default-width"><!-- start content -->

			    <div class="head padd-default"><!-- start head -->
			        <div class="left-head fleft">
			            <img src="https://staging.doku.com/doku-js/assets/images/logo-merchant1.png" alt="" />
			        </div>
			        <div class="right-head fright" style="text-align:right">
			            <div class="text-totalpay color-two">ID Invoice : {{$invoice}}, Total Payment ( IDR )</div>
			            <div class="amount color-one">{{ number_format($amount) }}</div>
			        </div>
			        <div class="clear"></div>
			    </div><!-- end head -->

			    <div class="select-payment-channel color-border padd-default"><!-- start select payment channel -->
			        <div style='float:left;width:50%;padding-top:10px'>
			        	Bank Transfer / ATM Bersama
			        </div>
			        <div style="float:right;width:50%;text-align:right">
			        	<img height="40px" src='https://staging.doku.com/merchant_data/ocov2/images/jaringanatm.jpg'/>
			        </div>
			        <div class="clear"></div>
			    </div><!-- end select payment channel -->

			    <div class="content-payment-channel padd-default"><!-- start content payment channel -->
			        
			    	<p>Click the <strong>Get Payment Code button</strong> and note down the code that appears, in order to make payment at the nearest ATM or Internet/Mobile Banking (except for <strong>BCA Internet Banking</strong>)</p>
			    	<br/>
					<p>Please attention : The payment code will expire after a certain period. Your purchase will be cancelled if payment is made after that period.</p>
					<form name="OneCheckoutTester" method="post" action="https://staging.doku.com/Suite/Receive">
						<input name="MALLID" id="MALLID" type="hidden" placeholder="Mall ID" maxlength="120" value="11534847">
						<input name="BASKET" id="BASKET" type="hidden" maxlength="120" value="Item 1,10000.00,1,10000.00">
						<input name="SHAREDKEY" id="SHAREDKEY" type="hidden" maxlength="120" value="mfDQczmlneQZ">
						<input name="CHAINMERCHANT" id="chainmerchant" type="hidden" maxlength="120" value="NA">
						<input name="SESSIONID" id="SESSIONID" type="hidden" value="xqf41teanoeob8q">
						<input name="TRANSIDMERCHANT" id="TRANSIDMERCHANT" type="hidden" maxlength="120" value="INVOICE-TEST-7220800">
						<input id="WORDS" name="WORDS" type="hidden" value="241ffc2424875009c755b1f5b95f45893ed7b0f1">
						<input name="REQUESTDATETIME" id="REQUESTDATETIME" type="hidden" value="20181126145917">
						<input name="SERVICEID" id="SERVICEID" type="hidden" value="">
						<input name="CURRENCY" id="CURRENCY" type="hidden" placeholder="Currency" value="360">
						<input name="PURCHASECURRENCY" id="PURCHASECURRENCY" type="hidden" value="360">
						<input name="AMOUNT" id="AMOUNT" type="hidden" value="10000.00">
						<input name="PURCHASEAMOUNT" id="PURCHASEAMOUNT" type="hidden" maxlength="120" value="10000.00">
						<input name="PAYMENTCHANNEL" id="PAYMENTCHANNEL" type="hidden" maxlength="120" value="">
						<input name="NAME" id="NAME" type="hidden" value="John Doe">
						<input name="EMAIL" id="EMAIL" type="hidden" value="johndoe@gmail.com">
						<input name="MOBILEPHONE" id="MOBILEPHONE" type="hidden" value="08111111111">
						<input name="ADDRESS" id="ADDRESS" type="hidden" value="Jl. Jendral Sudirman">
						<input name="COUNTRY" id="COUNTRY" type="hidden" value="ID">
						<input name="ZIPCODE" id="ZIPCODE" type="hidden" value="16710">
						<input name="CITY" id="CITY" type="hidden" value="Jakarta">
						<!-- <button class="btn-default" type="submit">TEST PAYMENT</button> -->
						<input class="default-btn font-reg" value="Get Payment Code" id="submitcc" type="submit">
					</form>
			    </div><!-- end content payment channel -->

			</section><!-- end content -->	
			<div class="footer">
            	<img src="http://staging.doku.com/doku-js/assets/images/secure.png" alt="">
				<div class="">Copyright DOKU {{ date('Y') }}</div>
            </div>		
	</body>
</html>