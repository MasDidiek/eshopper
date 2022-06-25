<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Redirect;
use Session;

class CartController extends Controller
{

    public function cart()
    {
        if (!Auth::check())  return redirect()->intended('/');

        $products = Product::all();
        return view('cart', compact('products'));
    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        $idUser = Auth::user()->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $id,
                "user_id" => $idUser,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function addToCartPost(Request $request)
    {

        $id = $request->id_product;
        $qty = $request->qty;

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        $idUser = Auth::user()->id;


        if (isset($cart[$id])) {
            $cart[$id]['quantity'] + $qty;
        } else {
            $cart[$id] = [
                "product_id" => $id,
                "user_id" => $idUser,
                "name" => $product->name,
                "quantity" => $qty,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function checkout()
    {
        return view('checkout');
    }

    public function submitCheckout(Request $request)
    {

        $cart = session('cart');
        $date = date('Ym');
        $rand = $this->getRandomString(10);
        if ($cart) {
            #insert data checkout header
            $checkout = Checkout::create([
                'tanggal' => date('Y-m-d'),
                'user_id' => auth()->user()->id,
                'invoice_code' => 'INV/' . $date . '/MPL/' . $rand,
                'title_location' => $request->title_location,
                'address' => $request->address,
                'payment_method' => $request->jns_pembayaran,
                'total' => $request->total,
                'shipping_charge' => 15000,
                'grand_total' => $request->grand_total,
            ]);

            $last_checkout = DB::table('checkouts')->latest('id')->first();
            $checkout_id = $last_checkout->id;

            #insert data checkout body
            foreach ($cart as $id => $details) :
                $namaProduk =    $details['name'];
                $price =  $details['price'];
                $epxp = explode(".", $price);
                $qty =  $details['quantity'];
                $image =  $details['image'];
                $product_id =  $details['product_id'];


                $subtotal = $price * $qty;

                DB::table('checkout_detail')->insert(
                    array(
                        'checkout_id'   => $checkout_id,
                        'product_name' => $namaProduk,
                        'harga_satuan' =>  $epxp[0],
                        'qty' => $qty,
                        'subtotal' => $subtotal,
                        'product_image' => $image,
                    )
                );
                #delete cart item
                $cart = session()->get('cart');
                unset($cart[$id]);
                session()->put('cart', $cart);


                $productDetail = DB::table('products')->find($product_id);
                $stockAWal = $productDetail->stock;
                $stockAkhir = $stockAWal - $qty;

                Product::where('id', $product_id)
                    ->update(['stock' => $stockAkhir]);



            endforeach;
        }

        return redirect('/success_checkout')->with('success', 'Checkout berhasil');
    }



    function getRandomString($n)
    {
        $characters = '0123456789';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public function successCheckout()
    {
        return view('success_checkout');
    }
}
