<?php
namespace project;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; 
use Mailgun\Mailgun;

require __DIR__ . '/../php_mailer/Exception.php';
require __DIR__ . '/../php_mailer/PHPMailer.php';
require __DIR__ . '/../php_mailer/SMTP.php';

// require __DIR__ . '/../vendor/autoload.php';


ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class logic { 
  
    function encrypt_array($array_to_encode){ 
        $openSSL = new Encryption();
        $securityObject = $array_to_encode;
        $securityString =  $openSSL->encode(json_encode($securityObject));  
        return $securityString;
    } 

    function decrypt_array($array_to_decode){ 
        $openSSL = new Encryption(); 
        $decodedString =  $openSSL->decode($array_to_decode); 
        $securityObject = json_decode($decodedString);
        return $securityObject; 
    } 
    
    function is_JSON($args) {
        json_decode($args);
        return (json_last_error()===JSON_ERROR_NONE);
    } 

    function send_mail($email, $data, $email_type){
        
        $message =  "";

        if($email_type == "lead") { 
            $message =  "New Enquiry Received: " .  
                        "<br />".  
                        "<br />".
                        "Name: " .$data->name .
                        "<br />".  
                        "<br />".
                        "Email: " .$data->email.
                        "<br />".  
                        "<br />".
                        "Telephone: " .$data->telephone; 

        }elseif($email_type == "followup"){
            $message =  "New Follow up form completed: " .  
                        "<br />".  
                        "<br />". 
                        "Name: " .$_SESSION["name"] .
                        "<br />".  
                        "<br />".
                        "Email: " .$_SESSION["email"] .
                        "<br />".  
                        "<br />".
                        "Telephone: " .$_SESSION["telephone"] .
                        "<br />".  
                        "<br />".
                        "Role: " .$data->role .
                        "<br />".  
                        "<br />".
                        "Company: " .$data->company .
                        "<br />".  
                        "<br />".
                        "Industry: " .$data->industry .
                        "<br />".  
                        "<br />".
                        "Location: " .$data->location .
                        "<br />".  
                        "<br />".
                        "Salary: " .$data->salary ;

        }else{ 
            $message =  "Dear " . $data->name  . ",".
                        "<br />".  
                        "<br />".
                        "Thank you for your enquiry, our team at Tailored Personnel will be in touch as soon as possible to discuss your recruitment needs. " .
                        
                        "<br />".  
                        "<br />".
                        "Kind Regards" . 
                        "<br />".
                        "Tailored Personnel Team";
        }



        $fromEmail =    'enquiries@tailored-personnel.com';
        $from =         'Tailored Personnel';  
        $sendToEmail =  $email;
        $sendTo =       $email_type == "followup" || $email_type == "lead" ? "David" :  $data->name ;
        $subject =      $email_type == "followup" || $email_type == "lead" ? 'Tailored Personnel Enquiry' :  "Thank you from Tailored Personnel";   
        
        $params = array(
            'from'  => $from . ' <'. $fromEmail .'>',
            'to'    => $sendToEmail,
            'subject' => $subject,
            'text' => $message,
            'html' => $message
        );

          # Instantiate the client.
        $mgClient = Mailgun::create('6f84a2c33deb51f7698951fffeda4c6b-d5e69b0b-b4f59f00', 'https://api.eu.mailgun.net/v3');
        $domain = "mailer.opopmedia.co.uk";
        # Make the call to the client.
        $res = $mgClient->messages()->send($domain, $params);
        if($res->getMessage() == "Queued. Thank you."){
            return  array('success' => true, 'message' =>  "Message Sent");
        }else{
            return array('type' => 'false', 'message' =>  "Message error");
        }
        
        
    }




    function send_SMTP_mail($email, $data, $email_type){
        
        $message =  "";

        if($email_type == "lead") { 
            $message =  "New Enquiry Received: " .  
                        "<br />".  
                        "<br />".
                        "Name: " .$data->name .
                        "<br />".  
                        "<br />".
                        "Email: " .$data->email.
                        "<br />".  
                        "<br />".
                        "Telephone: " .$data->telephone; 

        }elseif($email_type == "followup"){
            $message =  "New Follow up form completed: " .  
                        "<br />".  
                        "<br />". 
                        "Name: " .$_SESSION["name"] .
                        "<br />".  
                        "<br />".
                        "Email: " .$_SESSION["email"] .
                        "<br />".  
                        "<br />".
                        "Telephone: " .$_SESSION["telephone"] .
                        "<br />".  
                        "<br />".
                        "Role: " .$data->role .
                        "<br />".  
                        "<br />".
                        "Company: " .$data->company .
                        "<br />".  
                        "<br />".
                        "Industry: " .$data->industry .
                        "<br />".  
                        "<br />".
                        "Location: " .$data->location .
                        "<br />".  
                        "<br />".
                        "Salary: " .$data->salary ;

        }else{ 
            $message =  "Dear " . $data->name  . ",".
                        "<br />".  
                        "<br />".
                        "Thank you for your enquiry, our team at Tailored Personnel will be in touch as soon as possible to discuss your recruitment needs. " .
                        
                        "<br />".  
                        "<br />".
                        "Kind Regards" . 
                        "<br />".
                        "Tailored Personnel Team";
        }



        $fromEmail =    'enquiries@tailored-personnel.com';
        $from =         'Tailored Personnel';  
        $sendToEmail =  $email;
        // $sendToEmail =  'jay.exton@live.co.uk';
        $sendTo =       $email_type == "followup" || $email_type == "lead" ? "David" :  $data->name ;
        $subject =      $email_type == "followup" || $email_type == "lead" ? 'Tailored Personnel Enquiry' :  "Thank you from Tailored Personnel";   
        
        $mail = new PHPMailer(true); 
        
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        // $mail->SMTPDebug = 3;                                    // Enable verbose debug output
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->SMTPSecure = "TLS";                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Host       = 'smtp.gmail.com';                       // 'SMTP.LIVEMAIL.CO.UK'; // Set the SMTP server to send through
        $mail->Port       = 587;                                    // TCP port to connect to
        $mail->isHTML(true);              
        
        $mail->Username   = 'enquiries@tailored-personnel.com';     // SMTP username
        $mail->Password   = 'Legend1234!11';                        // SMTP password


        $mail->setFrom($fromEmail, $from); 
        $mail->addAddress($sendToEmail , $sendTo ); 
        $mail->Subject =    $subject;
        $mail->Body    =    $message;
        $mail->AltBody =    ""; //$this->get_dispatch_email ;
        
        
        if($mail->send()){
            return  array('type' => 'success', 'message' =>  "Message Sent");
        }else{
            return array('type' => 'false', 'message' =>  "Message error");
        }    
    }
     
    function get_confirm_email($customer, $payment, $order){
        $email_head = "<head> <meta name='viewport' content='width=device-width' /> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><title>Simple Transactional Email</title>   ". $this->get_base_style() ." </head>";

        $email_body = "
        <body class=''>
                <span class='preheader'>Your Collagen-Reverse Life order has been received.</span>
                <div class='body'>
					<div class='container'>
	                    <div class='content'>
                
	                        <!-- START CENTERED WHITE CONTAINER -->
	                        <div role='presentation' class='main'> 
		                        <!-- START MAIN CONTENT AREA --> 
	                            <div class='wrapper'>
	                                <div > 
	                                    <p>Hi " .  $customer["first_name"] . " " . $customer["last_name"]  . ",</p>
	                                    <p>We would like to confirm we have received your recent order to www.collagen-reverselife.com, please see your order information below</p>
	                                    <table role='presentation' style='border-collapse:collapse;' border='1px' cellpadding='5px' cellspacing='0px' class='btn btn-primary'>
		                                    <thead>
		                                        <tr> 
		                                        	<th style='text-align:left;'>Product</th>
		                                        	<th style='text-align:center;'>Quantiy</th>
		                                        	<th style='text-align:right;'>Price</th>
		                                        </tr>
		                                    	 
		                                    </thead>
		                                    <tbody>
		                                        <tr> 
		                                        	<td>Collagen liquid 1000</td>
		                                        	<td style='text-align:center;'>" .  $order["quantity"] . "</td>
		                                        	<td style='text-align:right;'>&#163;25</td>
		                                        </tr>
		                                        <tr> </tr>
		                                        <tr> 
		                                        	<th style='text-align:left;'>Subtotal: </th>
		                                        	<td  style='border-left: 1px solid white;'> </td>
		                                        	<td style='text-align:right;'>&#163;" .  (25 * $order["quantity"]) . "</td> 
		                                        </tr>
		                                        <tr> 
		                                        	<th style='text-align:left;'>Discount: </th>
		                                        	<td style='border-left: 1px solid white;'> </td>
		                                        	<td style='text-align:right;'>" .  $order["discount_val"] . "%</td> 
		                                        </tr>
		                                        <tr> 
		                                        	<th style='text-align:left;'>Total: </th>
		                                        	<td style='border-left: 1px solid white;'> </td>
		                                        	<td style='text-align:right;'>&#163;" .  substr($payment->paymentIntent->amount, 0, -2) . "." . substr($payment->paymentIntent->amount, -2) . "</td> 
		                                        </tr>
		                                    </tbody>
	                                    </table>
	                                    <div class='billing-address'>
                                            <br />
                                            <br />
                                    		<p>Delivery Address: </p>
                                    		<div>
                                    			<p>
                                    				" . $customer["first_name"] . " " . $customer["last_name"] . "
                                    				<br />
                                    				" . $order["address"] . "
                                    				<br />
                                    				" . $order["city"]  . "
                                    				<br />
                                    				" . $order["state"]  . "
                                    				<br />
                                    				" . $order["county"]  . "
                                    				<br />
                                    				" . $order["postcode"]  . " 
                                    			</p>
                                    			<p>
                                    				Email: " . $customer["email"]  . "
                                    				<br />
                                    				Telephone: " . $customer["telephone"]  . "
                                    				<br />
                                    			</p>

                                    		</div>
	                                    </div>

	                                    <p></p>
	                                    <p>Thank you for choosing Reverse Life</p>
	                                    <p>Regards,</p>
	                                    <p>Reverse Life Team</p> 
	                        
	                                    <!-- END MAIN CONTENT AREA -->
									</div>
		                            <!-- END CENTERED WHITE CONTAINER -->
	                			</div>
                			</div> 
	                                <!-- START FOOTER -->
                        <div class='footer'>  </div>
                        <!-- END FOOTER -->
                    </div>
                </div>
            </body>
        ";




        return " <!doctype html><html>" . $email_head . $email_body . "</html>";
    }

    function get_base_style(){
        $style = " <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */
        
        /*All the styling goes here*/
        
        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; 
        }
    
        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; 
        }
    
        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
            table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top; 
        }
    
        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
    
        .body {
            background-color: #f6f6f6;
            width: 100%; 
        }
    
        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px; 
        }
    
        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px; 
        }
    
        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%; 
        }
    
        .wrapper {
            box-sizing: border-box;
            padding: 20px; 
        }
    
        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }
    
        .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%; 
        }
            .footer td,
            .footer p,
            .footer span,
            .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center; 
        }
    
        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px; 
        }
    
        h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; 
        }
    
        p,
        ul,
        ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px; 
        }
            p li,
            ul li,
            ol li {
            list-style-position: inside;
            margin-left: 5px; 
        }
    
        a {
            color: #3498db;
            text-decoration: underline; 
        }
    
        /* -------------------------------------
            BUTTONS
        ------------------------------------- */
        .btn {
            box-sizing: border-box;
            width: 100%; }
            .btn > tbody > tr > td {
            padding-bottom: 15px; }
            .btn table {
            width: auto; 
        }
            .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center; 
        }
            .btn a {
            background-color: #ffffff;
            border: solid 1px #3498db;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 12px 25px;
            text-decoration: none;
            text-transform: capitalize; 
        }
    
        .btn-primary table td {
            background-color: #3498db; 
        }
    
        .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff; 
        }
    
        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .last {
            margin-bottom: 0; 
        }
    
        .first {
            margin-top: 0; 
        }
    
        .align-center {
            text-align: center; 
        }
    
        .align-right {
            text-align: right; 
        }
    
        .align-left {
            text-align: left; 
        }
    
        .clear {
            clear: both; 
        }
    
        .mt0 {
            margin-top: 0; 
        }
    
        .mb0 {
            margin-bottom: 0; 
        }
    
        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; 
        }
    
        .powered-by a {
            text-decoration: none; 
        }
    
        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0; 
        }
    
        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important; 
            }
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
            font-size: 16px !important; 
            }
            table[class=body] .wrapper,
            table[class=body] .article {
            padding: 10px !important; 
            }
            table[class=body] .content {
            padding: 0 !important; 
            }
            table[class=body] .container {
            padding: 0 !important;
            width: 100% !important; 
            }
            table[class=body] .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important; 
            }
            table[class=body] .btn table {
            width: 100% !important; 
            }
            table[class=body] .btn a {
            width: 100% !important; 
            }
            table[class=body] .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important; 
            }
        }
    
        /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
            .ExternalClass {
            width: 100%; 
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
            line-height: 100%; 
            }
            .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important; 
            }
            #MessageViewBody a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
            }
            .btn-primary table td:hover {
            background-color: #34495e !important; 
            }
            .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important; 
            } 
        }
    
        </style>";
        return $style;
    }
              
          
}  