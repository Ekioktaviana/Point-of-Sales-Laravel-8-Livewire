@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="min-height: 85vh">
                <div class="row">
                    <div class="col-9">
                        <div class="card-header bg-white">
                            <h4 class="font-weight-bold">Report Product</h4>
                        </div>
                    </div>
                    <div class="col-3 mt-2">
                        <a class="btn btn-success btn-sm" style="padding: 7px 10px" href="{{ route('exportProduct') }}">Export Report Product Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            {{-- <th>Image</th> --}}
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Purchase Price</th>
                            <th>Date of Entry</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                        @foreach ($products as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->qty}}</td>
                                <td>Rp {{number_format($item->price, 2,',','.')}}</td>
                                <td>Rp {{number_format($item->purchase_price, 2,',','.')}}</td>
                                <td>{{$item->tanggal_masuk}}</td>
                                {{-- <td>
                                    <a href="{{url('/detailLaporan', $item->invoices_number )}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                </td> --}}
                            </tr>
                        @endforeach                        
                    </table>
                    {{-- <div>{{ $products->links() }}</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection