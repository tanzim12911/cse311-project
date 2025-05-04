<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Players extends Model
{
    use HasFactory;//, SoftDeletes;

    protected $table = 'players'; 
    protected $primaryKey = 'player_id'; // Explicitly set the primary key

    public $incrementing = true; // Ensures auto-increment works
    protected $keyType = 'int'; // Ensures the key is an integer

    protected $fillable = [
        'team_id', 
        'name', 
        'position', 
        'dob', 
        'country', 
        'market_value'];

    public function team()
    {
        return $this->belongsTo(Teams::class, 'team_id', 'team_id'); 
    }

    public function stats()
    {
        return $this->hasOne(PlayerStats::class, 'player_id', 'player_id');
    }

    public function ratings()
    {
        return $this->hasMany(PlayerRatings::class);
    }

    public function contracts()
    {
        return $this->hasOne(Contracts::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfers::class);
    }
}
