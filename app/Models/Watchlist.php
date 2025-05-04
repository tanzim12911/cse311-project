<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Watchlist extends Pivot
{
    protected $table = 'watchlists';

    protected $primaryKey = 'watchlist_id';

    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'match_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id');
    }
}
