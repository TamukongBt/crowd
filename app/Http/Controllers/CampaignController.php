<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    function show()
    {
        $campaigns = Campaign::where('expiry','>',date('Y'))->get();
        return view('campaigns.campaigns', ['campaigns'=>$campaigns]);
    }
    function showid($id)
    {
        $campaigns = Campaign::findOrFail($id);
        return view('campaigns.campaign',['campaign'=>$campaigns]);
    }

    
}
