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
        $onlineTotal = OnlineInvoice::sum('tongTien');   
        $offlineTotal = ExportInvoice::sum('tongTien');   
        $importTotal = ImportInvoice::sum('tongTien');   
        $productCount = Product::count();
        $manufacturerCount = Manufacturer::count();
        $accountCount = Customer::count();

        $orderTotal = ExportInvoice::count() + OnlineInvoice::count();
        $orderPending = OnlineInvoice::where('trangThai', '=', 'pending')->count();
        $orderToday = OnlineInvoice::whereDate('created_at', Carbon::today())->get();

        $products = Product::query()
            ->orderBy('diemDanhGia', 'desc')
            ->limit(10)
            ->get();

        $comments = Comment::orderByDesc('updated_at')->limit(20)->get();

        return view('admin.statistics.dashboardShow', [
            'expense' => $importTotal,
            'income' => $onlineTotal + $offlineTotal,
            'productCount' => $productCount,
            'manufacturerCount' => $manufacturerCount,
            'accountCount' => $accountCount,
            'orderTotal' => $orderTotal,
            'orderPending' => $orderPending,
            'orderToday' => $orderToday->count(), 
            'orders' => $orderToday,
            'products' => $products,
            'comments' => $comments,
        ]);
    }

    public function getYearRevenue(Request $request, $year) {
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $data = [];
        $onlineTotal = OnlineInvoice::whereYear('updated_at', $year)->sum('tongTien');   
        $offlineTotal = ExportInvoice::whereYear('updated_at', $year)->sum('tongTien');   
        foreach ($months as $month) 
        {
            array_push($data, 
            OnlineInvoice::whereYear('updated_at', $year)
                        ->whereMonth('updated_at', $month)
                        ->sum('tongTien')
            + 
            ExportInvoice::whereYear('updated_at', $year)
                        ->whereMonth('updated_at', $month)
                        ->sum('tongTien')
            );
        };
        return response()->json([
            'income' => $onlineTotal + $offlineTotal,
            'data' => $data,
        ]);
    }

    public function getYearExpense(Request $request, $year) {
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $data = [];
        $importTotal = (int) ImportInvoice::whereYear('updated_at', $year)->sum('tongTien');
        foreach ($months as $month) 
        {
            array_push($data, 
            (int) ImportInvoice::whereYear('updated_at', $year)
                        ->whereMonth('updated_at', $month)
                        ->sum('tongTien')
            );
        };
        return response()->json([
            'expense' => $importTotal,
            'data' => $data,
        ]);
    }

    public function getDataPerMonth(Request $request, $year, $month)
    {
        $candle_sale = 0;
        $oil_sale = 0;
        $wax_sale = 0;

        $candle_left = 0;
        $oil_left = 0;
        $wax_left = 0;

        $exportInvoices = DB::table('export_invoice_product')
                ->select('soLuong', 'products.loaiSanPham')
                ->join('products', 'export_invoice_product.product_id', '=', 'products.id')
                ->whereYear('export_invoice_product.updated_at', $year)
                ->whereMonth('export_invoice_product.updated_at', $month)
                ->get();
        
        $onlineInvoices = DB::table('online_invoice_product')
                ->select('soLuong', 'products.loaiSanPham')
                ->join('products', 'online_invoice_product.product_id', '=', 'products.id')
                ->whereYear('online_invoice_product.updated_at', $year)
                ->whereMonth('online_invoice_product.updated_at', $month)
                ->get(); 
                
        $date = $year . '-' . $month . '-' . '31';
        $importInvoicesLeft = DB::table('import_invoice_product')
                ->select('soLuong', 'products.loaiSanPham')
                ->join('products', 'import_invoice_product.product_id', '=', 'products.id')
                ->whereDate('import_invoice_product.updated_at', '<=', $date)
                ->get(); 
        $exportInvoicesLeft = DB::table('export_invoice_product')
                ->select('soLuong', 'products.loaiSanPham')
                ->join('products', 'export_invoice_product.product_id', '=', 'products.id')
                ->whereDate('export_invoice_product.updated_at', '<=', $date)
                ->get(); 
        $onlineInvoicesLeft = DB::table('online_invoice_product')
                ->select('soLuong', 'products.loaiSanPham')
                ->join('products', 'online_invoice_product.product_id', '=', 'products.id')
                ->whereDate('online_invoice_product.updated_at', '<=', $date)
                ->get(); 
        
        foreach ($exportInvoices as $invoice) {
            if (str_contains($invoice->loaiSanPham, 'candle'))
                $candle_sale += $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'oil'))
                $oil_sale += $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'wax'))
                $wax_sale += $invoice->soLuong;
        };

        foreach ($onlineInvoices as $invoice) {
            if (str_contains($invoice->loaiSanPham, 'candle'))
                $candle_sale += $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'oil'))
                $oil_sale += $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'wax'))
                $wax_sale += $invoice->soLuong;
        };

        // Product Left
        foreach ($importInvoicesLeft as $invoice) {
            if (str_contains($invoice->loaiSanPham, 'candle'))
                $candle_left += $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'oil'))
                $oil_left += $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'wax'))
                $wax_left += $invoice->soLuong;
        };

        foreach ($exportInvoicesLeft as $invoice) {
            if (str_contains($invoice->loaiSanPham, 'candle'))
                $candle_left -= $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'oil'))
                $oil_left -= $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'wax'))
                $wax_left -= $invoice->soLuong;
        };

        foreach ($onlineInvoicesLeft as $invoice) {
            if (str_contains($invoice->loaiSanPham, 'candle'))
                $candle_left -= $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'oil'))
                $oil_left -= $invoice->soLuong;
            else if (str_contains($invoice->loaiSanPham, 'wax'))
                $wax_left -= $invoice->soLuong;
        };

        return response()->json([
            'candle_sale' => $candle_sale,
            'oil_sale' => $oil_sale,
            'wax_sale' => $wax_sale,
            'candle_left' => $candle_left,
            'oil_left' => $oil_left,
            'wax_left' => $wax_left,
        ]);
    }
}
