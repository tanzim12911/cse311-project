<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contracts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'player_id',
        'start_date',
        'end_date',
        'salary_pw'
    ];

    public function player()
    {
        return $this->belongsTo(Players::class);
    }
}
