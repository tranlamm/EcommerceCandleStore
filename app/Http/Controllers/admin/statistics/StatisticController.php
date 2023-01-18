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

        $orderToday = OnlineInvoice::whereDate('created_at', Carbon::today())->get();
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

        $comments = Comment::orderByDesc('updated_at')->limit(20)->get();

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

    public function getData(Request $request, $month) 
    {
        $week = [[1, 7], [8, 14], [15, 21], [22, 31]];
        $data = [];
        for ($i = 0; $i < 4; ++$i)
        {
            $candle_count = 0;
            $oil_count = 0;
            $wax_count = 0;

            $candle_price = 0;
            $oil_price = 0;
            $wax_price = 0;

            $exportInvoice = DB::table('export_invoice_product')
                    ->select('soLuong', 'tongTien', 'products.loaiSanPham')
                    ->whereBetween('export_invoice_product.created_at', ['2022-' . $month . '-' . $week[$i][0], '2022-' . $month . '-' . $week[$i][1]] )
                    ->join('products', 'export_invoice_product.product_id', '=', 'products.id')
                    ->get();
            
            $onlineInvoice = DB::table('online_invoice_product')
                    ->select('soLuong', 'products.giaBan', 'products.loaiSanPham')
                    ->whereBetween('online_invoice_product.created_at', ['2022-' . $month . '-' . $week[$i][0], '2022-' . $month . '-' . $week[$i][1]] )
                    ->join('products', 'online_invoice_product.product_id', '=', 'products.id')
                    ->get();

            foreach ($exportInvoice as $value) {
                if (str_contains($value->loaiSanPham, 'candle'))
                {
                    $candle_count += $value->soLuong;
                    $candle_price += $value->tongTien;
                }
                else if (str_contains($value->loaiSanPham, 'oil'))
                {
                    $oil_count += $value->soLuong;
                    $oil_price += $value->tongTien;
                }
                else if (str_contains($value->loaiSanPham, 'wax'))
                {
                    $wax_count += $value->soLuong;
                    $wax_price += $value->tongTien;
                }
            }

            foreach ($onlineInvoice as $value) {
                if (str_contains($value->loaiSanPham, 'candle'))
                {
                    $candle_count += $value->soLuong;
                    $candle_price += $value->giaBan * $value->soLuong;
                }
                else if (str_contains($value->loaiSanPham, 'oil'))
                {
                    $oil_count += $value->soLuong;
                    $oil_price += $value->giaBan * $value->soLuong;
                }
                else if (str_contains($value->loaiSanPham, 'wax'))
                {
                    $wax_count += $value->soLuong;
                    $wax_price += $value->giaBan * $value->soLuong;
                }
            }

            array_push($data, [
                'candle' => $candle_count, 
                'oil' => $oil_count, 
                'wax' => $wax_count, 
                'candle_price' => $candle_price, 
                'oil_price' => $oil_price,
                'wax_price' => $wax_price
            ]);
        }
        return response()->json($data);
    }
}
