<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Rating extends Model
{
    use HasFactory,Rateable;

    protected $fillable = [
        'rating',
        'rateable_type',
        'rateable_id',
        
    ];

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
