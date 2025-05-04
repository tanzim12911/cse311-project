<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfers extends Model
{
    use HasFactory; //SoftDeletes;

    protected $primaryKey = 'trans_id';

    protected $fillable = [
        'player_id',
        'from_team_id',
        'to_team_id',
        'transfer_date',
        'transfer_fee'
    ];

    public function player()
    {
        return $this->belongsTo(Players::class, 'player_id');
    }

    public function fromTeam()
    {
        return $this->belongsTo(Teams::class, 'from_team_id');
    }

    public function toTeam()
    {
        return $this->belongsTo(Teams::class, 'to_team_id');
    }
}
