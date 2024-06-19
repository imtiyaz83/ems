<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalkProposal extends Model
{
    use HasFactory;

    protected $fillable = ['speaker_id', 'title', 'abstract', 'preferred_time_slot'];

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
