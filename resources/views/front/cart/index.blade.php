@extends('front.layouts.app')

@section('content')
    <!-- breadcrumb area start here  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title">Cart</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="http://127.0.0.1:8000">Home</a></li>
                    <li class="page-item">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->
    <!-- wish-list area start here  -->
    <div class="wish-list-area cart-page-area section">
        <div class="container">

            <div class="row">
                <div class="col-12 wish-list-table">

                    <div class="table-responsive">
                        <div id="cardItem">
                            @if (session('cart') && count(session('cart')) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>

                                    <tbody id="cart_ajax_load">

                                        @foreach (session('cart') as $product_id => $item)
                                            <tr class="cart-page-item">
                                                <td>
                                                    <div class="single-grid-product m-0">
                                                        <div class="product-top">
                                                            <a href="">
                                                                <img class="product-thumbnal"
                                                                    src="{{ asset('front/assets/images/products/' . $item['image']) }}"
                                                                    alt="cart">
                                                            </a>


                                                        </div>

                                                        <div class="product-info text-center">
                                                            <h3 class="product-name">
                                                                <a class="product-link"
                                                                    href="{{ url('/product/single/' . $product_id) }}">
                                                                    {{ $item['name'] }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-price text-center">
                                                        <h4 class="regular-price">
                                                            $ {{ number_format($item['regularPrice'], 2) }}
                                                        </h4>
                                                        @if ($item['discountedPrice'])
                                                            <h3 class="price">
                                                                <span class="main-price">
                                                                    $ {{ number_format($item['discountedPrice'], 2) }}
                                                                </span>
                                                            </h3>
                                                        @endif
                                                    </div>
                                                </td>


                                                <td class="text-center">
                                                    <div class="cart-quantity input-group">
                                                        <div class="increase-btn dec qtybutton btn qty_decrease"
                                                            data-id ="{{ $product_id }}">-</div>
                                                        <input class="qty-input cart-plus-minus-box qty_value"
                                                            type="text" value="{{ $item['quantity'] }}" readonly>
                                                        <div class="increase-btn inc qtybutton btn qty_increase"
                                                            data-id ="{{ $product_id }}">+</div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <h1 class="cart-table-item-total SubTotalAmount">
                                                        $
                                                        {{ ($item['discountedPrice'] ?? $item['regularPrice']) * $item['quantity'] }}
                                                    </h1>
                                                </td>

                                                <td>
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product_id }}">
                                                        <button
                                                            onclick="return confirm('Are you sure you want to remove this item?')"
                                                            type="submit" class="remove-btn">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">🛒 No items in cart</td>
                                </tr>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Page Bottom box area Start -->
        <div class="row cart-page-bottom-box-wrap">
            <div class="col-6 ms-auto text-end">
                <div class="cart-page-bottom-box cart-page-sub-total-box">

                    <div class="sub-total-inner-box d-flex justify-content-between align-items-center">
                        <h2 class="bottom-box-title m-0">Subtotal:</h2>
                        <h2 class="bottom-box-title totalAmount m-0">
                            ${{ number_format(collect(session('cart', []))->sum(fn($item) => ($item['discountedPrice'] ?? $item['regularPrice']) * $item['quantity']), 2) }}
                        </h2>
                    </div>


                    <div class="sub-total-inner-box d-flex justify-content-between align-items-center">
                        <h2 class="bottom-box-title m-0">Total</h2>
                        <h2 class="bottom-box-title cart-page-final-total totalAmount m-0">
                            ${{ number_format(collect(session('cart', []))->sum(fn($item) => ($item['discountedPrice'] ?? $item['regularPrice']) * $item['quantity']), 2) }}
                        </h2>
                    </div>

                    <div class="form-button text-center">
                        <a href="checkout.html" class="form-btn proceed-to-checkout-btn">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
            <!-- Cart page bottom box -->
        </div>
        <!-- Cart Page Bottom box area End -->
    </div>
    </div>
    <!-- wish-list area end here  -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Increase quantity
            $('.qty_increase').click(function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                let qtyInput = $(this).siblings(".qty-input");
                let currentQty = parseInt(qtyInput.val());
                $.ajax({
                    url: "{{ route('cart.increase') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", 
                        product_id: productId
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('product quantity increased successfully');
                            window.location.reload();
                        } else {
                            toastr.error('Failed to increase product quantity');
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            // Decrease quantity
            $('.qty_decrease').click(function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                let qtyInput = $(this).siblings(".qty-input");
                let currentQty = parseInt(qtyInput.val());
                $.ajax({
                    url: "{{ route('cart.decrease') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", 
                        product_id: productId
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('product quantity decreased successfully');
                            window.location.reload();
                        } else {
                            toastr.error('Failed to decrease product quantity');
                        }
                    }
                });
            });
        });
    </script>
@endpush
