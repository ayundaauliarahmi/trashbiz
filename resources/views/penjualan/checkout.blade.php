<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <p>Terima kasih telah berbelanja!</p>

    <h2>Ringkasan Pembelian</h2>
    <ul>
        @foreach($cart as $barang)
            <li>
                {{ $barang['name'] }} - {{ $barang['quantity'] }} x Rp{{ number_format($barang['price'], 2) }} = Rp{{ number_format($barang['price'] * $barang['quantity'], 2) }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('cart.index') }}">Kembali ke Beranda</a>
</body>
</html>
