<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sterophone</title>
    <link rel="stylesheet" href="{{ asset('assets/home.css') }}">
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about-us">About Us</a></li>
        </ul>
    </nav>
    <header>
        <div class="wrap">
            <h1>Sterophone</h1>
            <p>Temukan gadget impianmu</p>
        </div>
    </header>
    <section>
        <article>
            <div class="wrap-header">
                <h1>Terbaru di Sterophone!</h1>
                <a href="/show-all">Show All</a>
            </div>
            <div class="wrap">
                @if (count($products) == 0)
                    <div class="empty">
                        <h3>Products is not available</h3>
                    </div>
                @else
                    @foreach ($products as $product)
                        <div class="wrap-card">
                            <div class="card">
                                <div class="card-image">
                                    <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="">
                                </div>
                                <div class="card-body">
                                    <h4>{{ $product->product_name }}</h4>
                                    <p>Harga : <span>Rp{{ number_format($product->price, 0, ',', '.') }}</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </article>
    </section>
</body>

</html>
