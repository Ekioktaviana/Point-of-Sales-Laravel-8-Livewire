<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6"><h3 class="font-weight-bold">Product List</h3></div>
                    <div class="col-md-6"><input type="text" wire:model="search" class="form-control" placeholder="Search Product..."></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row ">
                    @forelse ($products as $product)
                    <div class="col-md-3 mb3" :key="{{ $product->id }}">
                        <div class="card mt-3" wire:click="addItem({{ $product->id }})" style="cursor: pointer">
                                <img src="{{ asset('storage/images/'.$product->image) }}" alt="product" style="object-fit: contain;width:100%;height:170px">
                                <button  class="btn btn-primary btn-sm" style="position: absolute;top: 0px;right: 0px;padding: 10px 15px;"><i class="fas fa-cart-plus fa-lg"></i></button>
                                <h6 class="text-center font-weight-bold mt-2">{{ $product->name }}</h6>
                                <h6 class="text-center font-weight-bold" style="color: grey">Rp {{ number_format( $product->price,2,',','.') }} </h6>
                                <h6 class="text-center font-weight-bold" style="color: grey">Stock : ({{ $product->qty }}) </h6>
                        </div>
                    </div>
                    @empty
                        <div class="col-sm-12 mt-5">
                            <h2 class="text-center font-weight-bolds text-primary">No Products Found</h2>
                        </div>
                    @endforelse
                        
                </div>
            </div>
            <div style="display:flex;justify-content:center">
                {{ $products->links() }}
            </div>
            </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="font-weight-bold">Cart</h3>
                    
            </div>
            <div class="card-body">
                    @if(session()->has('error'))
                        <p class="font-weight-bold text-danger">
                            {{ session('error') }}
                        </p>
                    @endif
                <table class="table table-hovered table-sm table-bordered">
                    <thead class="bg-white ">
                        <tr>
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Name</th>
                            <th class="font-weight-bold">Qty</th>
                            <th class="font-weight-bold">Price</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $index=>$cart)
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                    <br>
                                    <i class="fas fa-trash" wire:click="removeItem('{{ $cart['rowId'] }}')" style="font-size: 13px;cursor: pointer;color: grey;" ></i>
                                </td>
                                <td>
                                    <a href="#" class="font-weight-bold text-dark">{{ $cart['name'] }}</a>                                    
                                    <br>
                                    <a href="#">Rp {{ number_format( $cart['pricesingle'],2,',','.') }} </a>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm"  wire:click="increaseItem('{{ $cart['rowId'] }}')" style="padding: 7px 10px"><i class="fas fa-plus"></i></button>
                                        {{ $cart['qty'] }}
                                    <button class="btn btn-info btn-sm" wire:click="decreaseItem('{{ $cart['rowId'] }}')" style="padding: 7px 10px"><i class="fas fa-minus" ></i></button>
                                </td>
                                <td>Rp {{ number_format( $cart['price'],2,',','.') }}</td>
                            </tr>
                        @empty
                            <td colspan="4"><h6 class="text-center">Empty Cart </h6></td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="font-weight-bold">Cart Summary </h4>
                <h5 class="font-weight-bold">Sub Total  : Rp {{ number_format($summary['sub_total'],2,',','.') }} </h5>
                {{-- <h5 class="font-weight-bold">Tax        : Rp {{ number_format($summary['pajak'],2,',','.') }}</h5> --}}
                <h5 class="font-weight-bold">Total      : Rp {{ number_format($summary['total'],2,',','.') }}</h5>
                {{-- <div class="row">
                    <div class="col-sm-6">
                        <button wire:click="enableTax" class="btn btn-primary btn-block btn-sm">With Tax</button>
                    </div>
                    <div class="col-sm-6">
                        <button wire:click="disableTax" class="btn btn-info btn-block btn-sm">Remove Tax</button>
                    </div>
                </div> --}}

                <div class="form-group mt-4">
                    <input type="number" wire:model='payment' class="form-control" id="payment" placeholder="Input customer payment amount">
                    <input type="hidden"  id="total" value="{{ $summary['total'] }}">
                </div>
                
                <form wire:submit.prevent="handleSubmit">
                    <div>
                        <label>Payment</label>
                        <h2 id="paymentText" wire:ignore class="font-weight-bold">Rp 0</h2>
                    </div>
                    <div>
                        <label>Change</label>
                        <h2 id="kembalian" wire:ignore class="font-weight-bold">Rp 0</h2>
                    </div>
    
                    <div class="mt-4">
                        <button wire:ignore type="submit" id="saveButton" disabled class="btn btn-success btn-block"><i class="fas fa-save fa-lg"></i> Save Transaction</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@push('script-custom')
    <script>
        payment.oninput = () => {
            const paymentAmount = document.getElementById('payment').value
            const totalAmount = document.getElementById('total').value

            const kembalian = paymentAmount - totalAmount

            // console.log({paymentAmount, totalAmount, kembalian});
            document.getElementById("kembalian").innerHTML = `Rp ${rupiah(kembalian)},00`
            document.getElementById("paymentText").innerHTML = `Rp ${rupiah(paymentAmount)},00`

            const saveButton = document.getElementById('saveButton')

            if (kembalian < 0) {
                saveButton.disabled = true 
            }else{
                saveButton.disabled = false
            }
        }

        const rupiah = (angka) => {
            const numberString = angka.toString()
            const split = numberString.split(',')
            const sisa = split[0].length % 3
            let rupiah = split[0].substr(0, sisa)
            const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)

            if (ribuan) {
                const separator = sisa ? '.' : ''
                rupiah += separator + ribuan.join('.')
            }

            return split[1] != undefined ? rupiah + ',' + split[1] : rupiah
        }
    </script>
@endpush
