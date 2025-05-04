<?php

namespace App\Models;

use App\Models\User;
use App\Models\Teams;
use App\Models\Competitions;
use App\Models\PlayerRatings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Database\Eloquent\SoftDeletes;


class Matches extends Model
{
    use HasFactory; //SoftDeletes;

    protected $primaryKey = 'match_id'; 

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'competition_id', 
        'team_id_home', 
        'team_id_away', 
        'date',
        'venue', 
        'status'
    ];

    public function competition()
    {
        return $this->belongsTo(Competitions::class, 'competition_id');
    }

    public function homeTeam()
    {
        return $this->belongsTo(Teams::class, 'team_id_home');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Teams::class, 'team_id_away');
    }

    public function ratings()
    {
        return $this->hasMany(PlayerRatings::class);
    }

    public function watchers()
    {
        return $this->belongsToMany(User::class, 'watchlists', 'match_id', 'user_id')
            ->withTimestamps();
    }

    protected static function booted()
    {
        static::updated(function ($match) {
            if ($match->isDirty('status') && $match->status === 'in-progress') {
                // Notify all users who have this match in their watchlist
                foreach ($match->watchers as $user) {
                    // Send Email
                    Mail::to($user->email)->send(new \App\Mail\MatchStartedMail($match));
        
                    // Send Database Notification
                    $user->notify(new \App\Notifications\MatchStartedNotification($match));

                }
            }
        });
    }
}
