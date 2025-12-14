<? php 

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\CartController;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('front.cart.index', compact('cart'));
    }

    // public function add($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $cart = session()->get('cart', []);

    //     $cart[$id] = [
    //         'name'  => $product->name,
    //         'price' => $product->price,
    //         'qty'   => ($cart[$id]['qty'] ?? 0) + 1,
    //         'image' => $product->image,
    //     ];

    //     session()->put('cart', $cart);
    //     return back()->with('success', 'Product added to cart');
    // }

    // public function remove($id)
    // {
    //     $cart = session()->get('cart');
    //     unset($cart[$id]);
    //     session()->put('cart', $cart);

    //     return back();
    // }
}
