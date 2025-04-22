<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Barang;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * This method is called after the user is authenticated
     */
    protected function authenticated(Request $request, $user)
    {
        // Hitung barang yang stok-nya menipis (misal 5 atau kurang)
        $stokTipis = Barang::where('stok', '<=', 5)->count();

        if ($stokTipis > 0) {
            // Kirim info ke session supaya muncul notifikasi
            session()->flash('stok_tipis_alert', true);
            session()->flash('stok_tipis_count', $stokTipis);
        }
    }
}
