<?php

namespace App\Http\Controllers\admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminorder()
    {
        $orders = Order::paginate(10);
        return view('admin.order.order',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.order_detail',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->only('status');
        $orders = Order::where('id',$id);
        $orders->update($data);
        return redirect()->back();
    }

    public function export() {
        return Excel::download(new OrderExport,'order.xlsx');
    }

    public function PDF()
    {
        $data = Order::all();
        $pdf =  Pdf::loadView('admin.order.pdf', ['data'=>$data]);
        return $pdf->stream();
    }

    public function PDF_Export($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.order.view_pdf',['data'=>$data]);
        return $pdf->stream();
    }
}
