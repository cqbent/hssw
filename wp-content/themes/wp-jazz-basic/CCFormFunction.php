<?php
function membership_form() {
	$paidMembership = false;
	if (isset($_GET['paid']) && $_GET['paid'] == "true") {
		// Show payment options
		$paidMembership = true;
	}
?>
	<style type="text/css">
		.ccfHeader {
			background-color: #A2A2A8;
			padding: 10px 15px 15px 15px;
		}
		#errMsg {
			color: #f00;
			border: 1px solid #f00;
			padding: 5px 5px;
			margin: 5px 0;
		}
		#signup {
			display: block;
			-moz-border-radius:15px;
			-webkit-border-radius:15px;
			border:1px solid #666;
			border-radius:15px;
			color:#FFF;
			cursor:pointer;
			font-weight:bold;
			margin: 0 auto;
			padding:5px;
			text-align:center;
			text-decoration:none;
			text-shadow:-1px -1px 0 #444;
			background:#de7100;
			background-image:-moz-linear-gradient(top, #ffc329, #de7100);
			background-image:-o-linear-gradient(top, #ffc329, #de7100);
			background-image:-webkit-gradient(linear, center top, center bottom, from(#ffc329), to(#de7100));
			background-image:linear-gradient(top, #ffc329, #de7100);
			text-shadow: none;
			width: 140px;
		}
		#signup:active, #signup:hover{
			background:#ffc329;
			background-image:-moz-linear-gradient(top, #de7100, #ffc329);
			background-image:-o-linear-gradient(top, #de7100, #ffc329);
			background-image:-webkit-gradient(linear, center top, center bottom, from(#de7100), to(#ffc329));
			background-image:linear-gradient(top, #de7100, #ffc329);
		}
		.ccfField {
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;
			box-sizing:border-box;
			background:#fff;
			border:1px solid #A9B3BC;
			padding:8px;
			width:100%;
			outline:none
		}
		#ccsfg {
			background: #fff;
			color:#333;
			font-family: Verdana,Arial,sans-serif;
			font-size:100%;
			clear: both;
			width:500px;
			margin-left:auto;
			margin-right:auto;
			padding:20px;
			-webkit-border-radius:5px;
			-moz-border-radius:5px;
			border-radius:5px;
			-webkit-box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);
			-moz-box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);
			box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);
			border:4px solid #FFF;
			-webkit-transition:all 200ms linear;
			-moz-transition:all 200ms linear;
			-o-transition:all 200ms linear;
			transition:all 200ms linear;
		}
		.hidden {
			display: none;
		}
		.ccfRequiredMarker {
			color: #BA0000;
			float: none;
			font-family: Verdana;
			font-size: 16px;
			font-weight: bold;
			padding-left: 2px;
		}
		.ccfFieldGroup {
			clear: left;
		}
		.ccfSubField {
			float: left;
			margin-right: 5px;
		}
		.ccfTwoCol {
			float: left;
			margin-right: 15px;
			width: 40%;
		}
		.ccfRow {
			clear: both;
			padding: 10px 0;
		}

		.ccfSubLabel {
			font-size: 0.8em;
			color: #aaa;
		}
		.ccfClearfix:after { 
		   content: " ";
		   display: block; 
		   height: 0; 
		   clear: both;
		}
		.ccfRadioGroup {
			font-size: 0.8em;
			margin: 10px 0;
		}
		.ccfSelect {
			margin: 2px 0;
			height: 34px;
		}
		.ccfSubmitRow {
			width: 500px;
		}
	</style>
	<script type="text/javascript" >
		function changePrice(whichPrice) {
			if (document.ccsfg.PaymentType[0].checked)
				setSuccessUrl(whichPrice.value);
			
		}
		function changeSuccessUrl(paymentType) {
			var price = "0";
			if (paymentType.id == "PayPal") {
				if (document.ccsfg.CustomField2[0].checked)
					price = document.ccsfg.CustomField2[0].value;
				else
					price = document.ccsfg.CustomField2[1].value;
			}
			setSuccessUrl(price);
		}

		function setSuccessUrl(price) {
			switch (price) {
				case "300":
					document.ccsfg.SuccessURL.value = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6GKG47LZCN5L6";
					break;
				case "100":
					document.ccsfg.SuccessURL.value = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NWGDH8HRE92EY";
					break;
				default:
					document.ccsfg.SuccessURL.value = "http://www.hsswriters.com/success-submit/";
			}
		}
		
		function removeListValue() {
			document.ccsfg.list_Receive.value = "";
		}
		
		function addListValue() {
			document.ccsfg.list_Receive.value = "I would like to receive HSSW member scripts for critique";
		}
		
		function validateForm() {
			for (var i=0; i < document.ccsfg.length; i++) {
				if ((document.ccsfg.elements[i].getAttribute("type") == "text"))
					document.ccsfg.elements[i].value = trim(document.ccsfg.elements[i].value);
				if (((document.ccsfg.elements[i].className.indexOf("required") != -1) && (document.ccsfg.elements[i].value == "")) ||
						((document.ccsfg.elements[i].id == "EmailAddress") && (!isEmail(document.ccsfg.elements[i].value)))) {
					if (document.ccsfg.elements[i].id == "EmailAddress")
						document.getElementById('errMsg').innerHTML = "Invalid email address.";
					else
						document.getElementById('errMsg').innerHTML = "Please fill out required fields.";
					document.getElementById('errMsg').className = "";
					document.ccsfg.elements[i].focus();
					return false;
				}
			}
			return true;
		}
		
		function trim(value) {
			return value.replace(/^\s+|\s+$/g,"");
		}

		function isEmail(email)
		{
			var rx = /^([^\s@,:"<>]+)@([^\s@,:"<>]+\.[^\s@,:"<>.\d]{2,}|(\d{1,3}\.){3}\d{1,3})$/;
			var part = email.match(rx);
			if ( part )
				return true;
			else
				return false
		}
		
	</script>

	<form id="ccsfg" name="ccsfg" method="post" action="http://www.hsswriters.com/CCSFG_Update/signup/index.php" onSubmit="return validateForm()">

		<div class="ccfHeader">
			<?php if ($paidMembership) { ?>
			<p>Please fill out your contact information below and select the membership and payment type.</p>
			<?php } else { ?>
			<p>Please fill out your contact information below and select your mailing preferences.</p>
			<?php } ?>
		</div>
		<div id="errMsg" class="hidden">
		</div>

		<div class="ccfRow">
			<!-- ########## Email Address ########## -->
			<label for="EmailAddress">Email Address</label><span class="ccfRequiredMarker">*</span>
			<input type="text" name="EmailAddress" value="" id="EmailAddress" class="ccfField" /><br />
		</div>

		<div class="ccfRow">
			<div class="ccfFieldGroupLabel">
				Name<span class="ccfRequiredMarker">*</span>
			</div>
			<div class="ccfFieldGroup ccfClearfix">
				<div class="ccfSubField">
					<!-- ########## First Name ########## -->
					<input type="text" name="FirstName" value="" id="FirstName" class="ccfField required" /><br />
					<label class="ccfSubLabel" for="FirstName">First Name</label>
				</div>
				<div class="ccfSubField">
					<!-- ########## Last Name ########## -->
					<input type="text" name="LastName" value="" id="LastName" class="ccfField required" /><br />
					<label class="ccfSubLabel" for="LastName">Last Name</label>
				</div>
			</div>
		</div>
		<div class="ccfRow ccfClearfix">
			<div class="ccfTwoCol">
				<!-- ########## Home Phone ########## -->
				<label for="HomePhone">Phone</label><span class="ccfRequiredMarker">*</span>
				<input type="text" name="HomePhone" value="" id="HomePhone" class="ccfField required" />
			</div>
			<div class="ccfTwoCol">
				<!-- ########## Work Phone ########## -->
				<label for="WorkPhone">Alternate Phone</label>
				<input type="text" name="WorkPhone" value="" id="WorkPhone" class="ccfField" />
			</div>
		</div>

		<div class="ccfRow">
			<div class="ccfFieldGroupLabel">
				Address
			</div>
			<div class="ccfFieldGroup ccfClearfix">
				<!-- ########## Address Line 1 ########## -->
				<input type="text" name="Addr1" value="" id="Addr1" class="ccfField" /><br />
				<!-- ########## Address Line 2 ########## -->
				<input type="text" name="Addr2" value="" id="Addr2" class="ccfField" /><br />
				<div class="ccfSubField">
					<!-- ########## City ########## -->
					<input type="text" name="City" value="" id="City" class="ccfField" size="15"/><br />
					<label class="ccfSubLabel" for="City">City</label>
				</div>
				<div class="ccfSubField">
					<!-- ########## State/Province (US/Canada) ########## -->
					<select name="StateCode" class="ccfSelect">
					<option></option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AB">Alberta</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="AA">Armed Forces Americas</option>
					<option value="AE">Armed Forces Europe</option>
					<option value="AP">Armed Forces Pacific</option>
					<option value="BC">British Columbia</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NB">New Brunswick</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NL">Newfoundland and Labrador</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="NT">Northwest Territories</option>
					<option value="NS">Nova Scotia</option>
					<option value="NU">Nunavut</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="ON">Ontario</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="PE">Prince Edward Island</option>
					<option value="QC">Quebec</option>
					<option value="RI">Rhode Island</option>
					<option value="SK">Saskatchewan</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
					<option value="YT">Yukon Territory</option>
					</select><br />
					<label class="ccfSubLabel" for="StateCode">State/Province</label>
				</div>
				<div class="ccfSubField">
					<!-- ########## Zip/Postal Code ########## -->
					<input type="text" name="PostalCode" value="" id="PostalCode" class="ccfField" size="6"/><br />
					<label class="ccfSubLabel" for="PostalCode">Zip/Postal Code</label>
				</div>
			</div>
		</div>
		<?php if ($paidMembership) { ?>
		<div class="ccfRow">
			Membership Type<span class="ccfRequiredMarker">*</span><br />
			<div class="ccfRadioGroup">
				<label for="MembershipType300">
				<input id="MembershipType300" type="radio" checked="checked" value="300" name="CustomField2" onclick="changePrice(this);">
				Membership with Script Reviews: $300
				</label><br />
				<label for="MembershipType100">
				<input id="MembershipType100" type="radio" value="100" name="CustomField2" onclick="changePrice(this);">
				Student Membership with Script Reviews: $100
				</label>
			</div>
		</div>
		<div class="ccfRow">
			Method of Payment<span class="ccfRequiredMarker">*</span><br />
			<div class="ccfRadioGroup">
				<label for="PayPal">
				<input id="PayPal" type="radio" checked="checked" value="PayPal" name="PaymentType" onclick="changeSuccessUrl(this);">
				Pay by credit card/PayPal
				</label><br />
				<label for="Check">
				<input id="Check" type="radio" value="Check" name="PaymentType" onclick="changeSuccessUrl(this);">
				Pay by cash or personal check.  Checks should be made out to Harvard Square Script Writers.
				</label>
			</div>
		</div>
		<?php } else { ?>
		<div class="ccfRow">
			Mailings Preference<span class="ccfRequiredMarker">*</span><br />
			<div class="ccfRadioGroup">
				I want to receive:<br />
				<label for="Receive">
				<input id="Receive" type="radio" checked="checked" value="Receive" name="MailingType" onclick="addListValue();">
				Harvard Square Script Writer newsletters/mailings and members&rsquo; scripts for review.
				</label><br />
				<label for="NewsOnly">
				<input id="NewsOnly" type="radio" value="NewsOnly" name="MailingType" onclick="removeListValue();">
				Only Harvard Square Script Writer newsletters/mailings.
				</label>
			</div>
		</div>
		<?php } ?>

		<!-- ########## Contact Lists ########## -->
		<input type="hidden"  value="I would like to receive HSSW emails and newsletters" name="Lists[]" id="list_NewsOnly" />
		<input type="hidden"  value="I would like to receive HSSW member scripts for critique" name="Lists[]" id="list_Receive" />
		<!-- ########## Success / Failure Redirects ########## -->
		<?php if ($paidMembership) { ?>
		<input type="hidden" name="SuccessURL" value="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6GKG47LZCN5L6" />
		<?php } else { ?>
		<input type="hidden" name="SuccessURL" value="http://www.hsswriters.com/success-receive/" />
		<?php } ?>
		<input type="hidden" name="FailureURL" value="http://www.hsswriters.com/membership-failed/" />

		<input type="submit" name="signup" id="signup" value="Submit" />

	</form>		
<?php
}

add_shortcode('membershipform', 'membership_form');

?>
