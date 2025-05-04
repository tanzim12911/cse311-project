<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Competitions extends Model
{
    use HasFactory;//, SoftDeletes;

    protected $table = 'competitions'; 
    protected $primaryKey = 'competition_id';

    public $timestamps = false;

    protected $fillable = [
        'competition_id',
        'name',
        'type',
        'season',
        'country'
    ];

    public function teams()
    {
        return $this->hasMany(Teams::class);
    }

    public function matches()
    {
        return $this->hasMany(Matches::class);
    }
}
