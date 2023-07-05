<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'link',
        'image',
        'goal',
        'expiry',
        'userid',
    ];

    public function campaigns()
    {
        return $this->belongsTo('App\Models\Campaign', 'userid', 'id');
    }
}
