<?php

namespace App\Http\Controllers;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index() {
        $logs = ActivityLog::latest()->paginate(10);
        return view('admin.activity_log.index', compact('logs'));
    }
   
}
