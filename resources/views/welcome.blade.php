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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @vite(['resources/js/main.js'])
</head>

<body class="index-page">

    @include('partials.header-landing')


    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('landing/hero-1.jpg') }}" alt="" data-aos="fade-in">

            <div class="container mx-auto px-4" data-aos="fade-up" data-aos-delay="100">
                <div class="flex justify-start">
                    <div class="w-full lg:w-2/3">
                        <h2 class="text-4xl font-bold mb-4">Welcome to 4M Motor Repair</h2>
                        <p class="mb-6">Your trusted motor repair shop for reliable and professional service. From maintenance to major repairs, we've got you covered. Schedule your appointment today!</p>
                        <form action="{{ route('customer.appointments.step-one') }}" method="get">
                            <button type="submit" class="btn-get-started text-white py-2 px-4 rounded">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section w-full">

            <!-- Section Title -->
            <div class="section-title w-full" data-aos="fade-up">
                <div class="container mx-auto px-4">
                    <span>About Us<br></span>
                <h2>About Us<br></h2>
                <p>At <strong>4M Motor Repair</strong>, we offer expert repair and maintenance services for all motorcycle vehicle
                    . With years of experience, we’re dedicated to providing fast, reliable, and high-quality
                    repairs. From engine diagnostics to oil changes and transmission servicing, our skilled technicians
                    use the latest tools to keep your vehicle in top condition.</p>
                </div>
            </div><!-- End Section Title -->

            <div class="container mx-auto px-4">

                <div class="flex flex-wrap items-center">

                    <div class="w-full lg:w-1/2 order-1 lg:order-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('landing/4m-logo.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="w-full lg:w-1/2 order-2 lg:order-1 mt-8 lg:mt-0" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-2xl font-bold mb-4">Why Choose Us?</h3>
                        <ul class="list-none space-y-4">
                            <li class="flex items-start">
                                <i class="bi bi-check-circle text-green-500 mr-2"></i>
                                <span><strong>Experienced Technicians:</strong> Our team is made up of certified professionals with a passion for keeping your vehicle in top shape.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle text-green-500 mr-2"></i>
                                <span><strong>Transparent Pricing:</strong> We believe in honest, upfront pricing so you know exactly what to expect.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle text-green-500 mr-2"></i>
                                <span><strong>Customer-Focused:</strong> We prioritize your convenience, offering flexible appointment scheduling and top-notch customer service.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle text-green-500 mr-2"></i>
                                <span><strong>Quality Repairs:</strong> We use high-quality parts and guarantee the durability and reliability of our work.</span>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->


        <!-- ! Slider not working -->
        <!-- Sponsor Section -->
        <section id="clients" class="clients section light-background">

            <div class="container">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "spaceBetween": 40
                    },
                    "480": {
                      "slidesPerView": 3,
                      "spaceBetween": 60
                    },
                    "640": {
                      "slidesPerView": 4,
                      "spaceBetween": 80
                    },
                    "992": {
                      "slidesPerView": 6,
                      "spaceBetween": 120
                    }
                  }
                }
              </script>
                    <div class="swiper-wrapper items-center">
                        <div class="swiper-slide"><img src="{{ asset('landing/sponsor-1.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('landing/sponsor-2.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('landing/sponsor-3.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('landing/sponsor-4.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('landing/sponsor-5.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('landing/sponsor-6.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('landing/sponsor-7.jpg') }}" class="img-fluid"
                                alt=""></div>
                    </div>
                </div>

            </div>

        </section><!-- /Clients Section -->

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
                                    <img src="{{ $product->photo ? (Str::startsWith($product->photo, 'products/') ? asset($product->photo) : asset('storage/' . $product->photo)) : asset('images/placeholder.jpg') }}" alt="{{ $product->title }}" class="img-fluid">

                                </div>
                                <a href="#" class="stretched-link">
                                    <h3 class="text-xl font-semibold mb-2">{{ $product->title }}</h3>
                                </a>
                                <p class="text-gray-600">{{ $product->brand }}</p>
                                <p class="text-gray-800 font-bold">₱{{ $product->price }}</p>
                            </div>
                        </div><!-- End Product Item -->
                    @endforeach
                </div>

                <!-- See More Button -->
                <div class="text-center mt-8">
                    <a href="/allproducts" class="btn-get-started bg-red-500 text-white py-2 px-6 rounded-full">See More</a>
                </div>

            </div>

        </section><!-- /Products Section -->


        <!-- Services Section -->
        <section id="services" class="services section py-16">

            <!-- Section Title -->
            <div class=" section-title" data-aos="fade-up">
                <span>Services</span>
                <h2>Services</h2>
            </div><!-- End Section Title -->

            <div class="container mx-auto px-4">

                <div class="flex flex-wrap -mx-4">

                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item bg-white p-6 rounded-lg shadow-lg relative">
                            <div class="icon text-4xl text-blue-500 mb-4">
                                <i class="bi bi-activity"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3 class="text-xl font-semibold mb-2">Engine Diagnostics</h3>
                            </a>
                            <p class="text-gray-600">Using advanced diagnostic tools, we accurately identify engine problems and provide effective solutions to keep your vehicle running smoothly.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item bg-white p-6 rounded-lg shadow-lg relative">
                            <div class="icon text-4xl text-blue-500 mb-4">
                                <i class="bi bi-broadcast"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3 class="text-xl font-semibold mb-2">Brake Repair</h3>
                            </a>
                            <p class="text-gray-600">We offer comprehensive brake inspections and repairs, ensuring your safety on the road with reliable braking performance.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item bg-white p-6 rounded-lg shadow-lg relative">
                            <div class="icon text-4xl text-blue-500 mb-4">
                                <i class="bi bi-easel"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3 class="text-xl font-semibold mb-2">Oil Changes</h3>
                            </a>
                            <p class="text-gray-600">Regular oil changes are essential for engine health. We provide quick and affordable oil changes using high-quality oil and filters.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item bg-white p-6 rounded-lg shadow-lg relative">
                            <div class="icon text-4xl text-blue-500 mb-4">
                                <i class="bi bi-bounding-box-circles"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3 class="text-xl font-semibold mb-2">Tire Services</h3>
                            </a>
                            <p class="text-gray-600">We provide tire rotations, balancing, and replacements, ensuring your tires wear evenly and maintain optimal traction.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item bg-white p-6 rounded-lg shadow-lg relative">
                            <div class="icon text-4xl text-blue-500 mb-4">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3 class="text-xl font-semibold mb-2">Transmission Services</h3>
                            </a>
                            <p class="text-gray-600">Our team specializes in transmission diagnostics, repairs, and maintenance, ensuring smooth gear shifts and optimal vehicle performance.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item bg-white p-6 rounded-lg shadow-lg relative">
                            <div class="icon text-4xl text-blue-500 mb-4">
                                <i class="bi bi-chat-square-text"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3 class="text-xl font-semibold mb-2">Suspension and Steering</h3>
                            </a>
                            <p class="text-gray-600">Our technicians inspect and repair suspension and steering systems to enhance vehicle stability and handling.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background py-16">

            <img src="{{ asset('landing/landing/hero-1.jpg') }}" alt="" class="w-full h-auto">

            <div class="container mx-auto px-4">
                <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-full lg:w-3/4 xl:w-2/3">
                        <div class="text-center">
                            <h3 class="text-3xl font-bold mb-4">Call To Action</h3>
                            <p class="mb-6">Are you ready to take the next step? Book your appointment today to experience our exceptional services firsthand! Don’t miss out on the opportunity to transform your experience with us.</p>
                            <a class="cta-btn" href="#">Book now</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section py-16">

            <!-- Section Title -->
            <div class="container mx-auto px-4 section-title" data-aos="fade-up">
            <span>Contact</span>
            <h2>Contact</h2>
            </div><!-- End Section Title -->

            <div class="container mx-auto px-4" data-aos="fade-up" data-aos-delay="100">

            <div class="flex flex-wrap -mx-4">

                <div class="w-full lg:w-1/2 px-4 mb-8">
                <div class="info-item flex flex-col justify-center items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Address</h3>
                    <p>Zone 8, Bulan, Philippines</p>
                </div>
                </div><!-- End Info Item -->

                <div class="w-full lg:w-1/4 px-4 mb-8">
                <div class="info-item flex flex-col justify-center items-center" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Call Us</h3>
                    <p>09484127192</p>
                </div>
                </div><!-- End Info Item -->

                <div class="w-full lg:w-1/4 px-4 mb-8">
                <div class="info-item flex flex-col justify-center items-center" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Email Us</h3>
                    <p>#</p>
                </div>
                </div><!-- End Info Item -->

            </div>

            <div class="flex flex-wrap -mx-4 mt-4">
                <div class="w-full lg:w-1/2 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d486.59115886698964!2d123.88415826619404!3d12.665747748156168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1728275197534!5m2!1sen!2sph"
                    frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="w-full lg:w-1/2 px-4 mb-8">
                <form action="{{ route('contact.send')}}" method="post" class="php-email-form" data-aos="fade-up"
                    data-aos-delay="400">
                    @csrf
                    <div class="flex flex-wrap -mx-4">

                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <input type="text" name="name" class="form-control w-full p-2 border border-gray-300 rounded"
                        placeholder="Your Name" required="">
                    </div>

                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <input type="email" class="form-control w-full p-2 border border-gray-300 rounded" name="email"
                        placeholder="Your Email" required="">
                    </div>

                    <div class="w-full px-4 mb-4">
                        <input type="text" class="form-control w-full p-2 border border-gray-300 rounded" name="subject" placeholder="Subject"
                        required="">
                    </div>

                    <div class="w-full px-4 mb-4">
                        <textarea class="form-control w-full p-2 border border-gray-300 rounded" name="message" rows="6" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="w-full px-4 text-center">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>

                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>

                    </div>
                </form>
                </div><!-- End Contact Form -->

            </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer relative bg-gray-900 text-white py-4">

        <div class="container mx-auto text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1">Team Swap</strong> <span>All Rights Reserved</span></p>
            <div class="credits">Design by Gonzales, Lois</div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top flex items-center justify-center bg-gray-800 text-white p-2 rounded-full fixed bottom-4 right-4"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <!-- <div id="preloader"></div> -->


            @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '{{ session("success") }}',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            </script>
        @endif

</body>

</html>
