<?php

namespace App\Http\Controllers\admin\statistics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\invoices\ImportInvoice;
use App\Models\invoices\ExportInvoice;
use App\Models\invoices\OnlineInvoice;

class StatisticController extends Controller
{
    public function showDashboard()
    {
        $import = ImportInvoice::all('tongTien')->toArray();

        $importTotal = 0;
        foreach ($import as $price)
            $importTotal += $price['tongTien'];

        return view('admin.statistics.dashboardShow');
    }
}
