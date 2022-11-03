<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function collection()
//    {
//        return Order::all();
//    }
      public function headings(): array
      {
          return [
              'id',
              'user_id',
              'full_name',
              'address',
              'email',
              'phone',
              'price_shipping',
              'payment_id',
              'status',
              'created_at',
              'updated_at'
          ];
      }
      public function query()
      {
          return Order::query();
      }

      public function map($order): array
      {
          return [
              $order->id,
              $order->user_id,
              $order->full_name,
              $order->address,
              $order->email,
              $order->phone,
              $order->price_shipping,
              $order->payment_id,
              $order->status,
              Date::dateTimeToExcel($order->created_at),
              Date::dateTimeToExcel($order->updated_at)
          ];
      }
}
