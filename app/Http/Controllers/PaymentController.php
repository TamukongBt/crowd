<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tchdev\Monetbil\Facades\Monetbil;


class PaymentController extends Controller
{
    public static function momo($amount, $name, $email, $telephone, $campaign_id)
    {
        $auth = Auth::user() ? Auth::user()->id : 0;
        Monetbil::setAmount(500);
        Monetbil::setCurrency('XAF');
        Monetbil::setLocale('en'); // Display language fr or en
        Monetbil::setPhone('651076194');
        Monetbil::setCountry('CAMEROON');
        Monetbil::setItem_ref('2536');
        Monetbil::setPayment_ref(md5(uniqid()));
        Monetbil::setUser(12);
        Monetbil::setFirst_name('KAMDEM');
        Monetbil::setLast_name('Jean');
        Monetbil::setEmail('jean.kamdem@email.com');
        Monetbil::setReturn_url('https://localhost:8080/success');
        Monetbil::setNotify_url('https://localhost:8080/success');
        Monetbil::setLogo('https://storage.googleapis.com/cdn.ucraft.me/userFiles/ukuthulamovies/images/937-your-logo.png');

        // Start a payment
        // You will be redirected to the payment page

        Monetbil::startPayment();
    }


    public static function store($amount, $provider, $campaign_id)
    {
        $auth = Auth::user() ? Auth::user()->id : 0;

        $data = Payment::insertGetId([
            'amount'=>$amount,
            'provider'=>$provider,
            'currency'=>'XAF',
            'campaignid'=>$campaign_id,
            'userid'=>$auth,
            'status'=>'approved'

        ]);
        return $data;


    }
}
