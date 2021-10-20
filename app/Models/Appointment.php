<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Appointment extends Model
{
    use HasFactory,Rateable;

    protected $fillable = [
        'type',
        'comments',
        'user_review',
        'date_time',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
