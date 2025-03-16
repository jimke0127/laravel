<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ["name","description","start_time","end_time","user_id"];

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function attendees(): HasMany
    {

        return $this->hasMany(Attendee::class);
    }

    public function scopeByUserAttend(Builder $query,$user_id){

        return $query->whereExists(function ($query) use($user_id){
            $query->select(DB::raw(1))
                  ->from('attendees')
                  ->whereColumn('attendees.event_id', 'events.id')
                  ->where('attendees.user_id', $user_id);
        });

    }
}
