<!DOCTYPE HTML>
<html>
	<head>
		<title>DOKU Payment Finish</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<link href="http://staging.doku.com/doku-js/assets/css/doku.css" rel="stylesheet">
		<style>
		.paymentcodetitle {
			font-weight: bold;
			color: #0071aa;
			margin:10px 0px 10px 0px;
		}
		</style>
	</head>
	<body>			
			<div doku-div="form-payment"><section class="default-width">
                    <div class="head padd-default">
                    <div class="left-head fleft">
                    <img src="http://staging.doku.com/doku-js/assets/images/logo-merchant1.png" alt="">
                    </div>
                    <div class="right-head fright">
                    <div class="text-totalpay color-two">Total Payment ( IDR ) {{ $doku_invoice }}</div>
                    <div style="text-align:right" class="amount color-one">RP. {{ number_format($doku_amount) }}</div>
                    </div>
                    <div class="clear"></div>
                    </div>                                        
                    
                    <div class="content-payment-channel padd-default">
                    <div id="creditcard" class="channel">
                    <!-- <div class="logo-payment-channel right-paychan cc"></div> -->                    
                    @if(Request::get('status')=='failed')
                    <ul>
	                    <li>
	                    	<div class='form-group'>
	                    		<h3 style="color:#B7042C;" align="center">
	                    			<div id='icon-tick' align="center"><img style="width:30%" src='{{ asset("public/vendor/dokularavel/stop.png") }}'/></div><br/>
	                    			<span style="font-size:27px">Transaction Failed</span>
	                    		</h3>
	                    	</div>
	                    </li>
                    </ul>

                    @else
                    <ul>
	                    <li>
	                    	<div class='form-group'>
	                    		<h3 style="color:#00af11;" align="center">
	                    			<div id='icon-tick' align="center"><img style="width:50%" src='{{ asset("public/vendor/dokularavel/icon-tick.png") }}'/></div>
	                    			<span style="font-size:27px">Transaction Success</span>
	                    		</h3>
	                    	</div>
	                    </li>
                    </ul>
                    @endif    

                    </div>
                    </div>
                    </section>
                    <div class="footer">
                    <img src="http://staging.doku.com/doku-js/assets/images/secure.png" alt="">
                    <div class="">Copyright DOKU {{date('Y')}}</div>
                    </div>
			                    
			</div>
	</body>
</html>