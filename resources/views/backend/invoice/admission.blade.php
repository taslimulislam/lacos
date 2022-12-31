<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Database Invoice</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
	<!-- Bootstrap -->


	<style>
		@import url(https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i);
@import url(https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,500,500i,600,600i,700,700i,800,800i);
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

/*
font-family: 'Open Sans', sans-serif;
font-family: 'Roboto', sans-serif;
*/

body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #fff;
}

.divider {
    border-bottom: 1px solid #eee;
    margin: 40px 0 20px;
    padding-bottom: 9px
}

.mt-0 {
    margin-top: 0;
}

.mb-20{
    margin-bottom: 20px;
}

.mb-30{
    margin-bottom: 30px;
}

.margin {
    margin: 10px 0 40px
}

.text-completed{
    color: #32ba7c;
    font-weight: 600;
}

.page-content {
    position: relative;
    background: #fff;
    max-width: 440px;
    margin: 0 auto;
    overflow: hidden;
    border: .0625rem solid rgba(231,234,243,.7);
    border-radius: .75rem;
    box-shadow: 0 3px 11px rgb(147 159 171);
}

.page-content.table{
    max-width: 800px;
}

.page-content.table .form-heading:before{
    width: calc(100% + 100px);
}

.page-wrapper.login_part,
.page-wrapper.payment_part,
.page-wrapper.signup_part {
    display: flex;
    align-items: center;
    justify-content: center;
}

.page-wrapper.signup_part{
    margin: 50px 0;
}

.bg-img-hero {
    height: 512px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top center;
    background-image: url(../img/abstract-bg.svg);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}

.heading_part{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.fig_img{
    position: absolute;
    bottom: 0;
}

.outer-container {
    padding: 40px
}

.form-heading {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
}

.heading_part{
    position: relative;
    margin-bottom: 50px;
}

.heading_part:before,
.form-heading:before {
    content: '';
    position: absolute;
    left: -40px;
    right: -50px;
    height: 1px;
    width: calc(100% + 100px);
    background: #ddd;
    bottom: -25px;
}

.btn-cstm {
    line-height: 42px;
    padding: 0 30px;
    margin-top: 8px;
}

.btn-signup {
    color: #333;
    background: transparent;
    font-weight: 600;
    margin-top: 0;
    padding: 0;
}

@media(min-width:768px) {
    .header-title {
        font-size: 50px
    }
}

@media(max-width:460px) {
    .outer-container {
        padding: 25px;
    }
}

.form-signin-heading {
    font-size: 21px;
    font-weight: 600;
}

.form-signin .form-signin-heading {
    margin-top: 0;
    margin-bottom: 30px;
}

.form-signin .checkbox {
    font-weight: normal;
}

.form-signin .form-control {
    position: relative;
    font-size: 15px;
    height: auto;
    padding: 10px 20px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    box-shadow: none;
}

.form-signin .form-group label {
    margin-bottom: 10px;
    font-weight: 600;
    font-size: 15px;
}

.form-signin .form-control:focus {
    z-index: 2;
    border-color: #37a000;
}

.form-signin input[type="text"] {
    margin-bottom: 20px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.create_account {
    margin: 20px 0 0;
}

.create_account a {
    font-weight: 700;
    padding: 0 25px;
    line-height: 45px;
}

.position-relative{
    position: relative;
}

.text-copy{
    position: absolute;
    top: 0;
    right: 0;
    font-size: 13px;
    text-transform: capitalize;
    text-decoration: none;
}

.text-copy:focus,
.text-copy:hover{
    text-decoration: none;
    color: #37a000;
}



.payment-block {
    margin-top: 30px;
}

.payment-block .btn-block {
    margin-top: 15px;
    line-height: 35px;
}

.payment-block .payment-item {
    margin-bottom: 5px;
}

.payment-block .payment-item input[type="radio"] {
    margin-top: 0;
    margin-right: 5px;
}

.payment-block .payment-item label::before {
    content: "";
    position: absolute;
    background-color: transparent;
    top: 50%;
    left: 0;
    width: 17px;
    height: 17px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    border: 1px solid #c3c2c9;
    transform: translate(0, -50%);
    -webkit-transform: translate(0, -50%);
    -moz-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.payment-block .payment-item label::after {
    content: "";
    position: absolute;
    background-color: #37a000;
    top: 50%;
    left: 5px;
    width: 7px;
    height: 7px;
    opacity: 0;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -webkit-transform: translate(0, -50%);
    -moz-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    -o-transform: translate(0, -50%);
    transform: translate(0, -50%);
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.payment-block .payment-item input[type="radio"]:checked + label:after {
    opacity: 1;
}

.payment-block .payment-item input[type="radio"]:checked + label:before {
    border-color: #37a000;
}

.payment-block .payment-item label {
    position: relative;
    padding-left: 30px;
    font-weight: 600;
    cursor: pointer;
    margin-bottom: 10px;
}

.payment-block .payment-item label img {
    vertical-align: middle;
    margin: -2px 0 0 0.5em;
    padding: 0;
    position: relative;
    box-shadow: none;
}

.payment-block .payment-item label .about-paypal {
    display: inline-block;
    font-size: 11px;
    text-decoration: underline;
    margin-left: 10px;
}

.payment-block .payment-item input {
    display: none;
}

.payment-block .payment-item .description {
    font-weight: 400;
    position: relative;
    box-sizing: border-box;
    width: 100%;
    border-radius: 2px;
    line-height: 1.5;
    background-color: #eaeaea;
    color: #515151;
}

.payment-block .payment-item .description p {
    padding: 1em;
    margin: 0;
}

.payment-block .payment-item .description::before {
    content: "";
    display: block;
    border: 10px solid #eaeaea;
    border-right-color: transparent;
    border-left-color: transparent;
    border-top-color: transparent;
    position: absolute;
    top: -6px;
    left: 0;
    margin: -1em 0 0 2em;
}

.payment-block .payment-item .description img {
    width: 100%;
    max-width: 100%;
}



@media(min-width: 1400px) {
    .page-wrapper.signup_part {
        height: 100vh;
    }
}

@media(max-width: 1199px) {
    .page-wrapper.signup_part {
        height: 100%;
        margin: 50px 0;
    }
}

@media(max-width: 991px) {
    .page-wrapper.payment_part {
        display: block;
        width: 100%;
    }
}

@media(min-width: 768px) {
    .page-wrapper.payment_part,
    .page-wrapper.login_part {
        height: 100vh;
    }
}

@media(max-width: 767px) {
    .page-wrapper.payment_part,
    .page-wrapper.login_part {
        height: 100%;
        margin: 50px 0;
    }
}

@media(max-width: 520px){
    .heading_part{
        display: block;
        text-align: center;
    }
}

	</style>

</head>

<body>


	<div class="my-5">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card overflow-hidden p-5" style="border: 1px solid #9f9f9f">
						<div class="font-weight-bold position-absolute py-3 text-center text-uppercase text-white" style="background-color: #2fab2b!important; right: -150px; top: 30px; min-width: 500px; font-size: 28px; transform: rotate(32deg); border: 4px solid #2ee535;">Paid</div>
						<div class="align-items-center d-flex justify-content-between mb-5">
							<div class="d-block">
                                <img src="{{url('public/backend/assets/dist/img/logo.png')}}">
							</div>
						</div>
						<div class="d-block mb-4">
							<div class="d-block text-right">
								<h5>The Gambia College</h5>
								<h6>257 Westwood DR.</h6>
								<h6>League City, TXX02563</h6>
							</div>
						</div>
						<div class="d-block p-4" style="background: #efefef">
							<h5>Invoice #4053269</h5>
							<p style="margin-bottom: 0">Invoice Date: 01/03/22</p>
							<p style="margin-bottom: 0">Due Date: 01/10/22</p>
						</div>
						<div class="d-block my-5">
							<strong>Invoiced To</strong> <br>
							Md. Humayun Bulbul <br>
							461, South Monipur, <br>
							Mirpur <br>
							Dhaka, dhaka, 1216 <br>
							Bangladesh
						</div>

						<table class="table table-bordered">
							<thead>
								<tr class="bg_grey">
									<th scope="col">Description</th>
									<th scope="col" class="text-center">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Registration Fee
									</td>
									<td class="text-center">$5 USD</td>
								</tr>
								<tr>
									<td>
										Admission Fee
									</td>
									<td class="text-center">$39.94 USD</td>
								</tr>
								<tr>
									<td>Late Fee (Added 01/14/2022) $8.99 USD</td>
									<td class="text-center">$8.99 USD</td>
								</tr>
								<tr class="bg_grey">
									<td class="text-right"><strong>Sub-total</strong></td>
									<td class="text-center">$48.93 USD</td>
								</tr>
								<tr class="bg_grey">
									<td class="text-right"><strong>Credit</strong></td>
									<td class="text-center">$0.00 USD</td>
								</tr>
								<tr class="bg_grey">
									<td class="text-right"><strong>Total</strong></td>
									<td class="text-center">$48.93 USD</td>
								</tr>
							</tbody>
						</table>

						<h5 class="my-4">Transactions</h5>

						<table class="table table-bordered mb-5">
							<thead>
								<tr class="bg_grey">
									<th scope="col" class="text-center">Transaction Date</th>
									<th scope="col" class="text-center">Gateway</th>
									<th scope="col" class="text-center">Transaction ID</th>
									<th scope="col" class="text-center">Amount</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">01/15/2022</td>
									<td class="text-center">Credit Cart</td>
									<td class="text-center">txn_3KIE9AEYd98Et9Z314R3DLAu</td>
									<td class="text-center">$48.93 USD</td>
								</tr>
							</tbody>
						</table>

						<div class="text-center">
							<p class="mb-0">PDF Generated on 01/15/2022</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{url('public/backend/invoice/assets/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{url('public/backend/invoice/assets/bootstrap-4.6.0/js/bootstrap.min.js')}}"></script>

</body>
