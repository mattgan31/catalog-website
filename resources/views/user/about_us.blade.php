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
                <h1>{{ $about->about_title }}</h1>
            </div>
            <div class="wrap">
                <h3>
                    {{ $about->about_description }}
                </h3>
            </div>
            <div class="wrap-header">
                <h1>{{ $mission->mission_title }}</h1>
            </div>
            <div class="wrap">
                <h3>
                    {{ $mission->mission_description }}
                </h3>
            </div>
        </article>
    </section>
</body>

</html>
