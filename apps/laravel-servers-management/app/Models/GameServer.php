<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'port',
        'game_type_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gameType()
    {
        return $this->belongsTo(GameType::class);
    }

    public function getFullIp(): string
    {
        return $this->ip . ':' . $this->port;
    }
}
