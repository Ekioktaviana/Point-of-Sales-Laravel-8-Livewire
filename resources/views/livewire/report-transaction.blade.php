@extends('layouts.report')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="min-height: 85vh">
                {{-- <div class="row"> --}}
                    <div class="col-6 mt-4">
                        <div class=" bg-white">
                            <h4 class="font-weight-bold">History Transcation</h4>
                        </div>
                    </div>
                        {{-- <form action="">
                            @csrf
                            <div class="col-3-sm mt-2">
                                <a class="btn btn-success btn-sm" style="padding: 7px 10px" href="{{ url('/export') }}">Export Report Transaction Data</a>
                            </div>
                        </form> --}}
                {{-- </div> --}}

                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <th>No</th>
                            <th>Invoices Number</th>
                            <th>Admin</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Amount</th>
                            <th>Cash</th>
                            <th>Bill</th>
                            <th>Change</th>
                            <th>Date Of Purchase</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                        @foreach($transaction as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->invoice_number}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->name}}</td>
                                <td>Rp {{ number_format( $item->price,2,',','.') }}</td>
                                <td>{{$item->qty}}</td>
                                <td>Rp {{ number_format($item->pay, 2,',','.')}}</td>
                                <td>Rp {{number_format($item->total, 2,',','.')}}</td>
                                <td>Rp {{number_format($item->kembalian, 2,',','.')}}</td>
                                <td>{{$item->created_at}}</td>
                                {{-- <td>
                                    <a href="{{url('/detailLaporan', $item->invoice_number )}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></button>
                                </td> --}}
                            </tr>
                        @endforeach                        
                    </table>
                    <div>
                        {{ $transaction->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection