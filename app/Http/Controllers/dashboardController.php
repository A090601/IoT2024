<?php

namespace App\Http\Controllers;

use App\Models\Kplmanagement;
use App\Models\Managementdb;
use App\Models\Supplier;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $dokter = Kplmanagement::all()->count();
        $management = Managementdb::all()->count();
        $pasien = Pendaftaran::all()->count();
        $supplier = Supplier::all()->count();
        return view('pages.dashboard', compact('dokter', 'supplier', 'pasien', 'management'));
    }
}
