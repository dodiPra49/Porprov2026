<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupporterCheer;

class CheerController extends Controller
{
    public function index()
    {
        $cheers = SupporterCheer::with('contingent')
            ->latest()
            ->paginate(15);

        return view('admin.cheers.index', compact('cheers'));
    }

    public function toggleApprove($id)
    {
        $cheer = SupporterCheer::findOrFail($id);
        $cheer->is_approved = !$cheer->is_approved;
        $cheer->save();

        return back()->with('success', 'Status moderasi ucapan suporter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $cheer = SupporterCheer::findOrFail($id);
        $cheer->delete();

        return back()->with('success', 'Ucapan suporter berhasil dihapus.');
    }
}
