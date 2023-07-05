<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal',
        'name',
        'link',
        'description',
        'image',
        'userid',
    ];

    public function reqowner()
    {
        return $this->belongsTo('App\Models\User', 'userid', 'id');
    }
}
