<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Product as ProductModel;
use App\Models\Distributor;
use App\Models\Merek;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class Product extends Component
{
    use WithFileUploads;
    
    public $product_id;
    public $name,$image,$description,$qty,$price,$purchase_price;
    public $tanggal_masuk;
    // ,$distributor_id,$merek_id
    public $isModal = 0;
    
    public function render()
    {
        // $products = ProductModel::orderBy('created_at', 'DESC')->get();
        $products = ProductModel::orderBy('created_at', 'DESC')->get();
        $distributors = Distributor::all();
        $mereks = Merek::all();
        
        // dd($distributors);
        return view('livewire.product', ['products' => $products, 'distributors' => $distributors, 'mereks' => $mereks]);
        

    } 

    public function closeModal()
    {
        $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }

    public function previewImage(){
        $this->validate([
            'image' => 'image|max:2048'
            ]);
    }
    
    public function store(){

        $this->validate([
            'name' => 'required',
            'image' => 'image|max:2048|required',
            'description' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'purchase_price' => 'required',
            'tanggal_masuk' => 'required',
            ]);
            
            $imageName = md5($this->image.microtime().'.'.$this->image->extension());
            
            Storage::putFileAs(
                'public/images',
                $this->image,
                $imageName,
            );
            
            ProductModel::create([
                'name' => $this->name,
                'image' => $imageName,
                'description' => $this->description,
                'qty' => $this->qty,
                'price' => $this->price,
                // 'distributor_id' => $this->distributor_id,
                // 'merek_id' => $this->merek_id,
                'purchase_price' => $this->purchase_price,
                'tanggal_masuk' => $this->tanggal_masuk,
                ]);
                
                session()->flash('info', 'Product Created Successfully');
                $this->closeModal(); //TUTUP MODAL
                
                $this->name = '';
                $this->image = '';
                $this->description = '';
                $this->qty = '';
                $this->price = '';
                // $this->distributor_id = '';
                // $this->merek_id = '';
                $this->purchase_price = '';
                $this->tanggal_masuk = '';
        
    }

    public function delete($id)
    {
        $products = ProductModel::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $products->delete(); //LALU HAPUS DATA
        session()->flash('message', $products->name . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }

    public function edit(ProductModel $products)
    {
        // $imageName = md5($this->image.microtime().'.'.$this->image->extension());
            
        //     Storage::putFileAs(
        //         'public/images',
        //         $this->image,
        //         $imageName,
        //     );
        // $products = ProductModel::find($id); 
        // dd($products);
        //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA

        // $this->id = $products->$id;
        $this->name = $products->name;
        // $this->image = $products->image;
        $this->description = $products->description;
        $this->qty = $products->qty;
        $this->price = $products->price;
        $this->purchase_price = $products->purchase_price;
        $this->tanggal_masuk = $products->tanggal_masuk;

        // $this->openModal(); //LALU BUKA MODAL
        // return view('livewire.edit', compact('products'));

        // $product = User::where('id',$id)->first();
        // $this->product_id = $id;
        // $this->name = $product->name;
        // $this->email = $product->email;
    }
    
    public function update()
    {
        // dd($id);
        $this->validate([
            'name' => 'required',
            'image' => 'image|max:2048|required',
            'description' => 'required',
            'qty' => 'required',
            'price' => 'required',
            // 'distributor_id' => 'required',
            // 'merek_id' => 'required',
            'purchase_price' => 'required',
            'tanggal_masuk' => 'required',
            ]);
            
            $imageName = md5($this->image.microtime().'.'.$this->image->extension());
            
            Storage::putFileAs(
                'public/images',
                $this->image,
                $imageName,
            );

        // $product = ProductModel::find($id);
        
        $products = ProductModel::find($this->product_id);
        dd($products);
        if ($this->product_id) {
            $products->update([
                'name' => $this->name,
                'image' => $imageName,
                'description' => $this->description,
                'qty' => $this->qty,
                'price' => $this->price,
                'purchase_price' => $this->purchase_price,
                'tanggal_masuk' => $this->tanggal_masuk,
                ]);
                
                $this->closeModal(); //TUTUP MODAL
                session()->flash('info', 'Product Created Successfully');
                
                $this->name = '';
                $this->image = '';
                $this->description = '';
                $this->qty = '';
                $this->price = '';
                // $this->distributor_id = '';
                // $this->merek_id = '';
                $this->purchase_price = '';
                $this->tanggal_masuk = '';
        }
        
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'image|max:2048|required',
            'description' => 'required',
            'qty' => 'required|numeric|min:0|not_in:0',
            'price' => 'required|numeric|min:0|not_in:0',
            // 'distributor_id' => 'required|numeric|min:0|not_in:0',
            // 'merek_id' => 'required|numeric|min:0|not_in:0',
            'purchase_price' => 'required|numeric|min:0|not_in:0',
            'tanggal_masuk' => 'required',
            ]);
        
        $imageName = md5($this->image.microtime().'.'.$this->image->extension());
        
        Storage::putFileAs(
            'public/images',
            $this->image,
            $imageName,
        );

        if($this->product_id==""){
            ProductModel::create([
                'name' => $this->name,
                'image' => $imageName,
                'description' => $this->description,
                'qty' => $this->qty,
                'price' => $this->price,
                // 'distributor_id' => $this->distributor_id,
                // 'merek_id' => $this->merek_id,
                'purchase_price' => $this->purchase_price,
                'tanggal_masuk' => $this->tanggal_masuk,
                ]);

            session()->flash('info', 'Users Post Successfully.');
            return redirect()->to('/products');
        }else{
            $product = ProductModel::find($this->product_id);
            $product->update([
                'name' => $this->name,
                'image' => $imageName,
                'description' => $this->description,
                'qty' => $this->qty,
                'price' => $this->price,
                // 'distributor_id' => $this->distributor_id,
                // 'merek_id' => $this->merek_id,
                'purchase_price' => $this->purchase_price,
                'tanggal_masuk' => $this->tanggal_masuk,
            ]);

            session()->flash('info', 'Users Update Successfully.');
            return redirect()->to('/products');
        }
        $this->name = '';
        $this->image = '';
        $this->description = '';
        $this->qty = '';
        $this->price = '';
        // $this->distributor_id = '';
        // $this->merek_id = '';
        $this->purchase_price = '';
        $this->tanggal_masuk = '';
    }


    public function editt($id)
    {        
        $product = ProductModel::where('id',$id)->first();
        $this->product_id = $id;
        $this->name = $product->name;
        // $this->image = $product->image;
        $this->description = $product->description;
        $this->qty = $product->qty;
        $this->price = $product->price;
        $this->purchase_price = $product->purchase_price;
        $this->tanggal_masuk = $product->tanggal_masuk;
    }
}
