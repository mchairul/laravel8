<html>
    <head></head>
    <body>
        <!-- Looping atau iterasi dataBarang-->
        @foreach ($dataBarang as $barang)
        <p>{{ $barang->nama }}, {{ $barang->harga }}</p>
        @endforeach
    </body>
</html>