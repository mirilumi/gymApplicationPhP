<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Session;
use URL;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index()
    {
        return view('paypal.paywithpaypal');
    }
    public function payWithpaypal(Request $request)
    {
//        dd($request->all());
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName($this->getPurchase($request->get('amount'))) /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Payment for '.$this->getPurchase($request->get('amount')));

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
        ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $user = User::where('email',$request->email)->first();
            if($user){
                $user->name= $request->name;
                $user->telefono= $request->telefono;
                if($request->cognome != null)
                    $user->cognome = $request->cognome;
                if($request->indirizzio != null)
                    $user->indirizzio = $request->indirizzio;
                $user->purchase = $this->getPurchase($request->get('amount'));
            }else{
                $user = new User();
                $user->email = $request->email;
                $user->name = $request->name;
                $user->telefono= $request->telefono;
                if($request->cognome != null)
                    $user->cognome = $request->cognome;
                if($request->indirizzio != null)
                    $user->indirizzio = $request->indirizzio;
                $user->password = Hash::make('$request->email');
                $user->purchase = $this->getPurchase($request->get('amount'));
                $user->save();
            }
            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/paypalIndex');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return redirect()->back();;

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return redirect()->back();;

    }
    public function getPurchase($amount){
        switch ($amount) {
            case 20:
                return "MDF FIT (1 Programma) 20";
                break;
            case 30:
                return "MDF FIT (2 Programmi) 30";
                break;
            case 40:
                return "MDF Programma Personalizzato Basic 40";
                break;
            case 50:
                return "MDF FIT (3 Programmi) 50";
                break;
            case 70:
                return "MDF Programma Personalizzato Pro70";
                break;
            case 100:
                return "MDF Programma Personalizzato Plus100";
                break;
            default:
                return "Did Not Pay";
        }
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            \Session::put('error', 'Payment failed');
            return redirect()->back();;

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {

            \Session::put('success', 'Payment success');
            $user = User::all()->orderBy('id', 'desc')->first();
            return view('auth.registrationFilled',$user);

        }

        \Session::put('error', 'Payment failed');
        return redirect()->back();;

    }

}
