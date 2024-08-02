@extends('template')

@section('content')
<div class="container mt-5">
    <h2 class="text-center" id="status-message">Waiting...</h2>
    <form id="payment-form" method="GET" action="/clear-cart">
        @csrf
        <input type="hidden" name="snap_token" value="{{ $snapToken }}">
    </form>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var snapToken = document.querySelector('input[name="snap_token"]').value;

        snap.pay(snapToken, {
            onSuccess: function(result) {
                // Handle success response
                document.getElementById('status-message').textContent = 'Transaksi Berhasil';

                $.ajax({
                    url: '{{ url("clear-cart") }}',
                    method: "GET",
                });
                window.location.href = '/';
            },
            onPending: function(result) {
                // Handle pending response
                document.getElementById('status-message').textContent = 'Waiting...';
            },
            onError: function(result) {
                // Handle error response
                document.getElementById('status-message').textContent = 'Transaction Failed';
            }
        });
    });
</script>
@endsection