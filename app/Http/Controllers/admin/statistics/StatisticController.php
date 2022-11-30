<?php

namespace App\Http\Controllers\admin\statistics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Comment;
use App\Models\products\Manufacturer;
use App\Models\invoices\ImportInvoice;
use App\Models\invoices\ExportInvoice;
use App\Models\invoices\OnlineInvoice;
use App\Models\auth\Customer;

use DB;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function showDashboard()
    {
        $productCount = Product::count();
        $manufacturerCount = Manufacturer::count();
        $accountCount = Customer::count();
        $onlineTotal = OnlineInvoice::sum('tongTien');   
        $offlineTotal = ExportInvoice::sum('tongTien');   
        $importTotal = ImportInvoice::sum('tongTien');   

        $orderToday = OnlineInvoice::where(\DB::raw("DATE_FORMAT(created_at, '%D')"), Carbon::now()->day)->get();
        $orderTotal = ExportInvoice::count() + OnlineInvoice::count();
        $orderPending = OnlineInvoice::where('trangThai', '=', 'pending')->count();

        $year = 2022;
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $dataIncome = [];
        $dataExpense = [];
        $dataOrder = [];
        foreach ($months as $m)
        {
            array_push($dataIncome, OnlineInvoice::where(\DB::raw("DATE_FORMAT(created_at, '%m')"), $m)->sum('tongTien')
            + ExportInvoice::where(\DB::raw("DATE_FORMAT(created_at, '%m')"), $m)->sum('tongTien'));
            array_push($dataExpense, ImportInvoice::where(\DB::raw("DATE_FORMAT(created_at, '%m')"), $m)->sum('tongTien'));
            array_push($dataOrder, OnlineInvoice::where(\DB::raw("DATE_FORMAT(created_at, '%m')"), $m)->count()
            + ExportInvoice::where(\DB::raw("DATE_FORMAT(created_at, '%m')"), $m)->count());
        }

        $dataManufacturer = [];
        $manus = Manufacturer::all();
        foreach ($manus as $manu)
        {
            array_push($dataManufacturer, ['name' => $manu->ten, 'quantity' => $manu->products()->count()]);
        }

        $products = Product::query()
            ->orderBy('diemDanhGia', 'desc')
            ->limit(10)
            ->get();

        $comments = Comment::orderByDesc('created_at')->limit(20)->get();

        return view('admin.statistics.dashboardShow', [
            'expense' => $importTotal,
            'income' => $onlineTotal + $offlineTotal,
            'productCount' => $productCount,
            'manufacturerCount' => $manufacturerCount,
            'accountCount' => $accountCount,
            'orderToday' => $orderToday->count(), 
            'orderTotal' => $orderTotal,
            'orderPending' => $orderPending,
            'dataIncome' => $dataIncome,
            'dataExpense' => $dataExpense,
            'dataOrder' => $dataOrder,
            'dataManufacturer' => $dataManufacturer,
            'orders' => $orderToday,
            'products' => $products,
            'comments' => $comments,
        ]);
    }

}
