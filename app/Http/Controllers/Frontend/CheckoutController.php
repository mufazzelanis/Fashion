<? php 
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('front.checkout.index', compact('cart'));
    }

    // public function placeOrder(Request $request)
    // {
    //     $order = Order::create([
    //         'user_id' => auth()->id(),
    //         'total_amount' => collect(session('cart'))->sum(fn($i) => $i['price'] * $i['qty']),
    //         'status' => 'pending',
    //     ]);

    //     session()->forget('cart');

    //     return redirect()->route('home')->with('success', 'Order placed successfully');
    // }
}
