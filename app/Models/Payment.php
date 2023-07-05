<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'campaignid',
        'provider',
        'amount',
        'currency',
        'status',
    ];



    public function payedfor()
    {
        return $this->belongsTo('App\Models\Campaign', 'campaignid', 'id');
    }
}
