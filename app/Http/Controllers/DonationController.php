<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Donation;
use App\Http\Controllers\PaymentController;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{


    public function show()
    {

        $auth = Auth::user() ? Auth::user()->id : 0;
        $donations = Donation::where('user_id',$auth)->limit(5)->get();
        return view('donations.show',['donations'=>$donations]);
    }


    public function starttrans(Request $request)
    {
        $provider = $request->get('provider');
        $auth = Auth::user() ? Auth::user()->id : 0;

        $attributes = request()->validate([
            'amount' => ['required', 'max:50'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'provider' => ['required',  'max:50'],
            'amount'     => ['max:50'],
            'campaign_id' => ['max:70'],
            'telephone' => ['max:70'],
        ]);
        // Redirect for processing based on provider
        if ($provider == "momo") {
            PaymentController::momo($attributes['amount'], $attributes['name'],  $attributes['email'], $attributes['telephone'], $attributes['campaign_id']);
        } elseif ($provider == 'physical') {
            $id =  PaymentController::store($attributes['amount'], $attributes['campaign_id'], $provider);
            if ($id) {
                // select campaign with id and increment amount
                $raiseds = Campaign::where('id', $attributes['campaign_id'])->first();
                $raised = $raiseds->raised + $attributes['amount'];
                $raise = Campaign::where('id', $attributes['campaign_id'])->update(['raised' => $raised]);

                if ($raise) {
                    // insert new campaign
                    Donation::insert([
                        'payment_id' => $provider,
                        'campaign_id' => $attributes['campaign_id'],
                        'user_id' => $auth,
                        'amount' => $attributes['amount'],
                        'created_at'=>now(),
                        'updated_at'=>now(),

                    ]);
                    return redirect()->route('success')->with('message', 'Thank You for your donation');
                }
            }
        }
    }

    public function success()
    {

        return view('donations.success');
    }
}