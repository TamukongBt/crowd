<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'payment_id',
        'user_id',
        'amount',
        'campaign_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function campaign()
    {
        return $this->belongsTo('App\Models\campaign', 'campaign_id', 'id');
    }


    use HasFactory;
}
