<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\BookRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $query = BookRuangan::query();

        if ($request->has('search')) {
            $query->where('agenda', 'like', '%' . $request->search . '%')
                ->orWhere('bagian', 'like', '%' . $request->search . '%')
                ->orWhere('tanggal', 'like', '%' . $request->search . '%');
        }

        // Dapatkan hasil paginasi
        $ruangans = $query->orderBy('created_at', 'desc')->paginate(20);

        // Kirim data ke Vue
        return inertia('Ruangan/Index', [
            'ruangans' => $ruangans,
        ]);
    }

    public function booking()
    {
        $bagian = Auth::user()->bagian;
        return Inertia::render('Ruangan/Booking', [
            'bagian' => $bagian
        ]);
    }

    public function bookingStore(Request $request)
    {
        $request->validate([
            'agenda' => 'required|string',
            'bagian' => 'required|string',
            'ruang_meeting' => 'required|string',
            'tanggal' => 'required',
            'mulai_meeting' => 'required',
            'selesai_meeting' => 'required',
        ]);

        $tanggal = Carbon::parse($request->tanggal)->format('d/m/Y');

        BookRuangan::create([
            'agenda' => $request->agenda,
            'bagian' => $request->bagian,
            'ruang_meeting' => $request->ruang_meeting,
            'tanggal' => $tanggal,
            'mulai_meeting' => $request->mulai_meeting,
            'selesai_meeting' => $request->selesai_meeting,
        ]);

        return redirect()->back();
    }
}
