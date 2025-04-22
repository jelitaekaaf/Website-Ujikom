<?php
namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::with('user')->latest()->paginate(20);
        return view('activity_logs.index', compact('logs'));
    }

    public function destroy($id)
    {
        $log = ActivityLog::findOrFail($id);
        $log->delete();
        return redirect()->back()->with('success', 'Log berhasil dihapus');
    }

    public function clearAll()
    {
        ActivityLog::truncate();
        return redirect()->back()->with('success', 'Semua log berhasil dihapus');
    }
}
