<? php 

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CompareController extends Controller
{
    public function index()
    {
        $compare = session()->get('compare', []);
        return view('front.compare.index', compact('compare'));
    }

    // public function add($id)
    // {
    //     $product = Product::findOrFail($id);
    //     session()->push('compare', $product);

    //     return back();
    // }
}
