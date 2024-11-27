<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookVicon extends Model
{
    use HasFactory;

    protected $fillable = ['agenda', 'bagian', 'tanggal', 'ruang_meeting', 'mulai_meeting', 'selesai_meeting', 'meeting_id'];

}
