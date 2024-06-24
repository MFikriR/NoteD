<?php

// app/Models/Task.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'start_date', 'deadline', 'quest_id', 'completed'
    ];

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }
}
