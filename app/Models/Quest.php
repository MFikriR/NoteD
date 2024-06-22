<?php

// app/Models/Quest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'exp_reward'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_quests');
    }
}
