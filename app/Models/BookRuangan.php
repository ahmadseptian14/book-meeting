<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookRuangan extends Model
{
    use HasFactory;

    protected $fillable = ['agenda', 'bagian', 'tanggal', 'ruang_meeting', 'mulai_meeting', 'selesai_meeting'];

    // public function getTanggalAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }

}
