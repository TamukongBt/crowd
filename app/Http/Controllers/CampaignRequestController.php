<?php

namespace App\Http\Controllers;

use App\Models\CampaignRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->roles == 'admin'){
        $requests = CampaignRequest::orderby('created_at', 'desc')->paginate(10);
        return view('campaignreq.index', ['requests' => $requests]);}
        else{
            $id = Auth::user()->id;
            $requests = CampaignRequest::where('userid',$id)->orderby('created_at', 'desc')->paginate(10);
            return view('campaignreq.index', ['requests' => $requests]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campaignreq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'goal' => ['required', 'max:50'],
            'name' => ['required', 'max:50'],
            'link' => ['max:100', ],
            'description' => ['required',  'max:350'],
            'userid'     => ['max:50'],
        ]);
        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('image', 'public');
        }

        CampaignRequest::create($attributes);


           return redirect('/request')->with('message','Request sent successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $campaigns = CampaignRequest::findOrFail($id);

        return view('campaignreq.show', ['request' => $campaigns]);
    }

    /**
     * Display the specified resource.
     */
    public function decision(string $decision, string $id)
    {
        $state = $decision == 'true' ? 'approved' : 'rejected';
        CampaignRequest::where('id', $id)->update(['status' => $state]);
        // copy details to campaign table
        $campaign = CampaignRequest::findOrFail($id);
        if($state == 'approved'){
        $attributes = [
            'name' => $campaign->name,
            'description' => $campaign->description,
            'link' => $campaign->link,
            'image' => $campaign->image,
            'userid' => $campaign->userid,
            'goal' => $campaign->goal,
            'expiry' => today()->addDays(30),
        ];
        Campaign::create($attributes);
    }
        return redirect('/request')->with('message','Request '.$state.' successfully');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
