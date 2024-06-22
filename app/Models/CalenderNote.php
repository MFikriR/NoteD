<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalenderNote extends Model
{
    use HasFactory;

    // Nama tabel dalam basis data
    protected $table = 'calender_notes';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['date', 'note'];
}
