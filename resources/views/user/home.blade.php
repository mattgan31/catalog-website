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
            <li><a href="">Home</a></li>
            <li><a href="">About Us</a></li>
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
            <h1>Terbaru di Sterophone!</h1>
            <div class="wrap">
                @foreach ($products as $product)
                    <div class="wrap-card">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="">
                            </div>
                            <div class="card-body">
                                <h3>{{ $product->product_name }}</h3>
                                <p>Harga : <span>{{}}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
</body>

</html>
