<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <h2>Update Product</h2>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    

            <div class="card">
                <div class="card-body">
                    {{-- <h2 class="font-weight-bold mb-3">Update Product</h2> --}}
                    <form action="" wire:submit.prevent="update">
                        <div class="form-group">
                            <input type="hidden" wire:model="product_id">
                            <label for="">Product Name</label>
                            <input wire:model="name" type="text" name="" id="" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Product Image</label>
                            <div class="custom-file">
                                <input wire:model="image" type="file" class="custom-file-input" id="customFile">
                                <label for="customFile" class="custom-file-label">Choose Image</label>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @if($image)
                                <label for="" class="mt-2">Image Preview:</label>
                                <img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="Preview Image" srcset="">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea wire:model="description" type="text" name="" id="" class="form-control"> </textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Qty</label>
                            <input wire:model="qty" type="number" name="" id="" class="form-control" min="0">
                            @error('qty')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input wire:model="price" min="0" type="number" name="" id="" class="form-control">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Purchase Price</label>
                            <input wire:model="purchase_price" min="0" type="number" name="purchase_price" id="" class="form-control">
                            @error('purchase_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Date of Entry</label>
                            <input wire:model="tanggal_masuk" type="date" name="tanggal_masuk" id="datepicker" class="form-control">
                            @error('tanggal_masuk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit Product</button>
                        </div>
                        <button wire:click="closeModal()" type="button" class="btn btn-success btn-sm">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h3>{{ $product_id }}</h3>
                    <h3>{{ $name }}</h3>
                    <h3>{{ $image }}</h3>
                    <h3>{{ $description }}</h3>
                    <h3>{{ $qty }}</h3>
                    <h3>{{ $price }}</h3>
                    {{-- <h3>{{ $distributor_id }}</h3>
                    <h3>{{ $merek_id }}</h3> --}}
                    <h3>{{ $purchase_price }}</h3>
                    <h3>{{ $tanggal_masuk }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
