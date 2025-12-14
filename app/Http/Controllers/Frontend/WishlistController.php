<? php 
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $items = Wishlist::where('user_id', auth()->id())->get();
        return view('front.wishlist.index', compact('items'));
    }

    // public function add($productId)
    // {
    //     Wishlist::firstOrCreate([
    //         'user_id' => auth()->id(),
    //         'product_id' => $productId
    //     ]);

    //     return back();
    // }
}
