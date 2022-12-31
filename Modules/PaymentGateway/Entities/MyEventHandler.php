<?php

namespace Modules\PaymentGateway\Entities;

use Flutterwave\EventHandlers\EventHandlerInterface;
use Modules\Subcription\Entities\PackageRecarringInvoice;
use Modules\Subcription\Entities\PackageRecarringInvoicePayment;

// This is where you set how you want to handle the transaction at different stages



class MyEventHandler implements EventHandlerInterface
{
    /**
     * This is called when the Rave class is initialized
     * */
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    function onInit($initializationData) {
        // Save the transaction to your DB.
        // dd("Calling -------------------- onInit");
    }

    /**
     * This is called only when a transaction is successful
     * */
    function onSuccessful($transactionData) {

        // dd("Calling -------------------- onSuccessful" .json_encode($transactionData));
        
        
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Comfirm that the transaction is successful
        // Confirm that the chargecode is 00 or 0
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here
        if ($transactionData->status === 'successful') {
            error_log("Calling -------------------- onSuccessful" .json_encode($transactionData));
            
            if ($transactionData->currency == $_SESSION['currency'] && $transactionData->amount != '') {
                if ($_SESSION['publicKey']) {
                    error_log("--------------getURL------------------".getURL($_SESSION['successurl'], array('event' => 'successful')).'');
                    // header('Location: ' . getURL($_SESSION['successurl'], array('event' => 'successful')));
                    $_SESSION = array();
                    //session_destroy();
                }
            } else {
                if ($_SESSION['publicKey']) {
                    error_log("--------------getURL------------------".getURL($_SESSION['failureurl'], array('event' => 'suspicious')).'');
                    // header('Location: ' . getURL($_SESSION['failureurl'], array('event' => 'suspicious')));
                    $_SESSION = array();
                    session_destroy();
                }
            }
        } else {
            $this->onFailure($transactionData);
        }
    }

    /**
     * This is called only when a transaction failed
     * */
    function onFailure($transactionData) {
        // dd("Calling -------------------- onFailure");
        // Get the transaction from your DB using the transaction reference (txref)
        // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
        // You can also redirect to your failure page from here
        if ($_SESSION['publicKey']) {
            header('Location: ' . getURL($_SESSION['failureurl'], array('event' => 'failed')));
            $_SESSION = array();
            session_destroy();
        }
    }

    /**
     * This is called when a transaction is requeryed from the payment gateway
     * */
    function onRequery($transactionReference) {
        // dd("Calling -------------------- onRequery");
        // Do something, anything!
    }

    /**
     * This is called a transaction requery returns with an error
     * */
    function onRequeryError($requeryResponse) {
        // dd("Calling -------------------- onRequeryError");
        echo 'the transaction was not found';
    }

    /**
     * This is called when a transaction is canceled by the user
     * */
    function onCancel($transactionReference) {
        error_log("Calling -------------------- onCancel");
        // Do something, anything!
        // Note: Somethings a payment can be successful, before a user clicks the cancel button so proceed with caution

        if ($_SESSION['publicKey']) {
            header('Location: ' . getURL($_SESSION['failureurl'], array('event' => 'canceled')));
            $_SESSION = array();
            session_destroy();
        }
    }

    /**
     * This is called when a transaction doesn't return with a success or a failure response. This can be a timedout transaction on the Rave server or an abandoned transaction by the customer.
     * */
    function onTimeout($transactionReference, $data) {
        error_log("Calling -------------------- onTimeout");
        // Get the transaction from your DB using the transaction reference (txref)
        // Queue it for requery. Preferably using a queue system. The requery should be about 15 minutes after.
        // Ask the customer to contact your support and you should escalate this issue to the flutterwave support team. Send this as an email and as a notification on the page. just incase the page timesout or disconnects
        if ($_SESSION['publicKey']) {
            header('Location: ' . getURL($_SESSION['failureurl'], array('event' => 'timedout')));
            $_SESSION = array();
            session_destroy();
        }
    }


}
