<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{
    use HasFactory;//, SoftDeletes;

    protected $table = 'teams';
    protected $primaryKey = 'team_id';
    public $timestamps = false;

    protected $fillable = [
        'competition_id',
        'name',
        'stadium',
        'Capacity',
        'team_value',
    ];

    public function competition()
    {
        return $this->belongsTo(Competitions::class, 'competition_id', 'competition_id');
    }

    public function players()
    {
        return $this->hasMany(Players::class);
    }

    public function homeMatches()
    {
        return $this->hasMany(Matches::class, 'team_id_home');
    }

    public function awayMatches()
    {
        return $this->hasMany(Matches::class, 'team_id_away');
    }

    public function transfersFrom()
    {
        return $this->hasMany(Transfers::class, 'from_team_id');
    }

    public function transfersTo()
    {
        return $this->hasMany(Transfers::class, 'to_team_id');
    }
}
