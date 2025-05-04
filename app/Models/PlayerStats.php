<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class PlayerStats extends Model
{
    use HasFactory; //SoftDeletes;

    protected $table = 'player_stats';

    protected $primaryKey = 'stat_id';

    public $timestamps = true;

    protected $fillable = [
        'player_id',
        'appearances',
        'goals',
        'assists',
        'clean_sheets',
        'yellow_cards',
        'red_cards'
    ];

    public function player()
    {
        return $this->belongsTo(Players::class, 'player_id');
    }
}
