<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function talkProposals()
    {
        return $this->hasMany(TalkProposal::class);
    }
}
