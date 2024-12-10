<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>4M Motorshop</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- ! remove cdn and resolve local -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/js/main.js'])
</head>

<body class="index-page">

    @include('partials.header-landing')


        <!-- Products Section -->
        <section id="products" class="products section py-16">

            <!-- Section Title -->
            <div class="section-title" data-aos="fade-up">
                <span>Products</span>
                <h2>Our Products</h2>
            </div><!-- End Section Title -->

            <div class="container mx-auto px-4">

                <div class="flex flex-wrap -mx-4">
                    @foreach($products as $product)
                        <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="100">
                            <div class="product-item bg-white p-6 rounded-lg shadow-lg relative">
                                <div class="icon text-4xl text-blue-500 mb-4">
                                    <img src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('images/placeholder.jpg') }}" alt="{{ $product->title }}" class="img-fluid">
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3 class="text-xl font-semibold mb-2">{{ $product->title }}</h3>
                                </a>
                                <p class="text-gray-600">{{ $product->brand }}</p>
                                <p class="text-gray-800 font-bold">${{ $product->price }}</p>
                            </div>
                        </div><!-- End Product Item -->
                    @endforeach
                </div>

                <!-- See More Button -->
                <div class="text-center mt-8">
                    <a href="/allproducts" class="btn btn-primary">See More</a>
                </div>

            </div>

        </section><!-- /Products Section -->

    </main>

    <footer id="footer" class="footer relative bg-gray-900 text-white py-4">

        <div class="container mx-auto text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1">Team Swap</strong> <span>All Rights Reserved</span></p>
            <div class="credits">Design by Gonzales, Lois</div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top flex items-center justify-center bg-gray-800 text-white p-2 rounded-full fixed bottom-4 right-4"><i class="bi bi-arrow-up-short"></i></a>
</body>

</html>
