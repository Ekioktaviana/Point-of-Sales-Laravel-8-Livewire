<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if($isModal)
                        @include('livewire.edit')
                    @endif
                    <h2 class="font-weight-bold mb-3">Product List</h2>
                    <table class="table table-hovered table-bordered table-striped">
                        <thead>
                            <tr>
                                <th >No</th>
                                {{-- <th >ID</th> --}}
                                <th>Name</th>
                                <th width="20%">Image</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Price</th>
                                {{-- <th>Distributor ID</th> --}}
                                {{-- <th>Merek ID</th> --}}
                                {{-- <th>Purchase Price</th>
                                <th>Date of Entry</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item => $product)
                            <tr>
                                <td>{{ $item + 1 }}<br><i wire:click="delete({{ $product->id }})"  class="fas fa-trash-alt" style="cursor: pointer; color: red"></i></td>
                                {{-- <td>{{ $product->id }}</td> --}}
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset('storage/images/'.$product->image) }}" alt="product image" class="img-fluid" srcset=""></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->price }}</td>
                                {{-- <td>{{ $product->distributor_id }}</td> --}}
                                {{-- <td>{{ $product->merek_id }}</td> --}}
                                {{-- <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->tanggal_masuk }}</td> --}}
                                <td>
                                    <button wire:click="editt({{ $product->id }})" class="btn btn-info btn-sm">Edit</button>
                                    {{-- <button wire:click="edit({{ $product->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button> --}}
                                    {{-- <a href="{{ route('product.edit', $product->id) }}"><button class="btn btn-info btn-sm">Edit</button></a> --}}
                
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold mb-3">Create Product</h2>
                    <form action="" wire:submit.prevent="submit">
                        <div class="form-group">
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
                        {{-- <div class="form-group">
                            <label for="distributor_id">Distributor</label>
                            <input wire:model="distributor_id" type="text" name="distributor_id" id="distributor_id" class="form-control">
                            <select wire:model="distributor_id" class="form-control" name="distributor_id" >
                                @foreach($distributors as $distributor)
                                    <option value="{{ $distributor->id }}">{{ $distributor->nama_distributor }}</option>
                                @endforeach 
                            </select>

                            <select value="option_select" name="distributor_id" wire:model="distributor_id" id="distributor_id" class="form-control">
                                @foreach($distributors as $distributor)
                                <option value="{{ $distributor->id }}" {{ ($distributor->id == $distributor->nama_distributor) ? "selected" : "" }}>{{ $distributor->nama_distributor }}</option>
                                <option :key="$distributor->id" :distributor_id="$distributor_id" value="{{ $distributor->id }}" {{ ($distributor->id == $distributor->nama_distributor) ? "selected" : "" }}>{{ $distributor->nama_distributor }}</option>
                                    @livewire('tasks', $deal, key($deal->id))
                                @endforeach
                            </select>

                            @error('distributor_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Merek</label>
                            <input wire:model="merek_id" type="number" name="merek_id" id="" class="form-control">
                            <select wire:model="merek_id" class="form-control" name="merek_id" >
                                @foreach($mereks as $merek)
                                    <option value="{{ $merek->id }}">{{ $merek->merek }}</option>
                                @endforeach 
                            </select>

                            <select value="option_select" name="merek_id" wire:model="merek_id" id="merek_id" class="form-control">
                                @foreach($mereks as $merek)
                                  <option value="{{ $merek->id }}" {{ ($merek->id == $merek->merek) ? "selected" : "" }}>{{ $merek->merek }}</option>
                                  <option :key="$merek->id" :merek_id="$merek_id" value="{{ $merek->id }}" {{ ($merek->id == $merek->merek) ? "selected" : "" }}>{{ $merek->merek }}</option>
                                @endforeach
                            </select>

                            @error('merek_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
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
                    </form>
                </div>
            </div>
            {{-- <div class="card mt-3">
                <div class="card-body">
                    <h3>{{ $name }}</h3>
                    <h3>{{ $image }}</h3>
                    <h3>{{ $description }}</h3>
                    <h3>{{ $qty }}</h3>
                    <h3>{{ $price }}</h3>
                    <h3>{{ $distributor_id }}</h3>
                    <h3>{{ $merek_id }}</h3>
                    <h3>{{ $purchase_price }}</h3>
                    <h3>{{ $tanggal_masuk }}</h3>
                </div>
            </div> --}}
        </div>
    </div>
</div>
