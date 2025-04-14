<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function logActivity($action, $table, $description = '') {
        ActivityLog::create([
            'user_name' => Auth::user()->name ?? 'System',
            'action' => $action,
            'table_name' => $table,
            'description' => $description,
        ]);
    }
}
