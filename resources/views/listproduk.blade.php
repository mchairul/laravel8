<html>
    <head>

    </head>
    <body>
        <h1>LIST PRODUK </h1>
        @forelse ($namaproduk as $produk)
        <p>{{ $produk['produk'] }}</p>
        
        @empty
        <p>No produk</p>
        @endforelse
    </body>
</html>
