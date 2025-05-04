<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerRatings extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'player_id',
        'match_id',
        'user_id',
        'vote_date'
    ];

    public function player()
    {
        return $this->belongsTo(Players::class);
    }

    public function match()
    {
        return $this->belongsTo(Matches::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
