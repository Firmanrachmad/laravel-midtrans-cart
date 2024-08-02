@extends('template')

@section('content')
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>
    <table id="cart" class="table table-bordered table-hover table-condensed mt-3">
        <thead class="thead-light">
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:20%"></th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="{{ $details['photo'] }}" height="150px" width="150px" />
                        </div>
                        <div class="col-sm-9">
                            <h5 class="nomargin">{{ $details['name'] }}</h5>
                            <p>{{ $details['description'] }}</p>
                        </div>
                    </div>
                </td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" data-id="{{ $id }}" data-price="{{ $details['price'] }}" />
                </td>
                <td data-th="Subtotal" class="text-center subtotal" data-id="{{ $id }}">Rp. {{ $details['price'] * $details['quantity'] }}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            @if(session('cart'))
            <tr>
                <td colspan="2" class="text-left"></td>
                <td class="text-center"><strong>Total Rp. <span id="total">{{ $total }}</span></strong></td>
                <td>
                    <a href="" class="btn btn-warning btn-block">Proceed to Checkout</a>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="4" class="text-center">Your Cart is Empty</td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".quantity").change(function() {
            var ele = $(this);
            var id = ele.data("id");
            var quantity = ele.val();
            var price = ele.data("price");

            $.ajax({
                url: '{{ url("update-cart") }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function(response) {
                    ele.closest("tr").find(".subtotal").text("Rp. " + (price * quantity));
                    $("#total").text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove product from the cart.")) {
                $.ajax({
                    url: '{{ url("remove-from-cart") }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
