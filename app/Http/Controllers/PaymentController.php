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
    public function index2()
    {
        return view('paypal.paywithpaypal2');
    }
    public function paySecond(Request $request){
        $user = User::where('email',$request->email)->first();
        $redirectUrl = '';
        if($user){
            $user->name= $request->name;
            $user->telefono= $request->telefono;
            if($request->cognome != null)
                $user->cognome = $request->cognome;
            if($request->indirizzio != null)
                $user->indirizzio = $request->indirizzio;
            $user->purchase = $this->getPurchase($request->get('amount'));
            $user->ip = $request->ip();
            $user->date_purchase =  date('Y-m-d H:i:s');;
        }else{
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->telefono= $request->telefono;
            if($request->cognome != null)
                $user->cognome = $request->cognome;
            if($request->indirizzio != null)
                $user->indirizzio = $request->indirizzio;
            $user->password = Hash::make($request->email);
            $user->purchase = $this->getPurchase($request->get('amount'));
            $user->ip = $request->ip();
            $user->date_purchase =  date('Y-m-d H:i:s');;
            $user->save();
        }
        $redirectUrl = $this->getRedirectUrl($request->get('amount'));
        return redirect($redirectUrl);
    }
    public function getRedirectUrl($amount){
        switch ($amount) {
            case 29.99:
                return "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4Q4PXRATBCBF2";
                break;
            case 24.99:
                return "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=77P83BFRLLMU6";
                break;
            case 19.99:
                return "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4Q4PXRATBCBF2";
                break;
            default:
                return "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4Q4PXRATBCBF2";
        }
    }

    public function payWithpaypal(Request $request)
    {
//        dd($request->all());
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName($this->getPurchase($request->get('amount'))) /** item name **/
        ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('EUR')
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
                $user->ip = $request->ip();
                $user->date_purchase =  date('Y-m-d H:i:s');
            }else{
                $user = new User();
                $user->email = $request->email;
                $user->name = $request->name;
                $user->telefono= $request->telefono;
                if($request->cognome != null)
                    $user->cognome = $request->cognome;
                if($request->indirizzio != null)
                    $user->indirizzio = $request->indirizzio;
                $user->password = Hash::make($request->email);
                $user->purchase = $this->getPurchase($request->get('amount'));
                $user->ip = $request->ip();
                $user->date_purchase =  date('Y-m-d H:i:s');
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
            case 14.99:
                return "12 Mesi Membership 14.99/Mese";
                break;
            case 19.99:
                return "6 Mesi Membership 19.99/Mese";
                break;
            case 24.99:
                return "3 Mesi Membership 24.99/Mese";
                break;
            case 39.99:
                return "MDF Programma Personalizzato Basic 39.99";
                break;
            case 69.99:
                return "MDF Programma Personalizzato Pro 69.99";
                break;
            case 99.99:
                return "MDF Programma Personalizzato Plus 99.99";
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
            $user = User::orderBy('id', 'desc')->first();
            return redirect('/');

        }

        \Session::put('error', 'Payment failed');
        return redirect()->back();;

    }
    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }
}
