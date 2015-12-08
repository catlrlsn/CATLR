<?php
/**
This Example shows how to Subscribe a New Member to a List using the MCAPI.php 
class and do some basic error checking.
**/
require_once 'inc/MCAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MCAPI($apikey);

$email = $_POST['email'];
$merge_vars = array('FNAME'=>'', 'LNAME'=>'');
$email_type = 'html';
$double_optin = false;

// By default this sends a confirmation email - you will not see new members
// until the link contained in it is clicked!
$retval = $api->listSubscribe( $listId, $email, $merge_vars, $email_type, $double_optin );


if ($api->errorCode){
	echo '<p class="err">Unable to subscribe! '. $api->errorMessage .'</p>';
} else {
    echo "Thank you for subscribing!\n";
}

?>
