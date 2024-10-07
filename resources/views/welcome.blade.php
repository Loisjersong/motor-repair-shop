<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Application</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- ! remove cdn and resolve local -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    @vite(['resources/js/landing.js'])
</head>

<body>
    <header id="header" class="header fixed-top">
        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <h1 class="sitename">4M MOTORSHOP</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li class="dropdown"><a href="#"><span>Account</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        </li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>

        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('landing/hero-1.jpg') }}" alt="" data-aos="fade-in">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-start">
                    <div class="col-lg-8">
                        <h2>Welcome to 4M Motor Repair</h2>
                        <p>Your trusted motor repair shop for reliable and professional service. From maintenance to
                            major repairs, we've got you covered. Schedule your appointment today!</p>
                        <a href="#about" class="btn-get-started">Book Now</a>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>About Us<br></span>
                <h2>About Us<br></h2>
                <p>At <strong>4M Motor Repair</strong>, we offer expert repair and maintenance services for all vehicle
                    types. With years of experience, we’re dedicated to providing fast, reliable, and high-quality
                    repairs. From engine diagnostics to oil changes and transmission servicing, our skilled technicians
                    use the latest tools to keep your vehicle in top condition.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('landing/4m-logo.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Why Choose Us?</h3>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span><strong>Experienced Technicians:</strong> Our
                                    team is made up of certified professionals with a passion for keeping your vehicle
                                    in top shape.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span><strong>Transparent Pricing:</strong> We
                                    believe in honest, upfront pricing so you know exactly what to expect.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span><strong>Customer-Focused:</strong> We
                                    prioritize your convenience, offering flexible appointment scheduling and top-notch
                                    customer service.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span><strong>Quality Repairs:</strong> We use
                                    high-quality parts and guarantee the durability and reliability of our work.</span>
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
                    <div class="swiper-wrapper align-items-center">
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

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Services</span>
                <h2>Services</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item  position-relative">
                            <div class="icon">
                                <i class="bi bi-activity"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Engine Diagnostics</h3>
                            </a>
                            <p>Using advanced diagnostic tools, we accurately identify engine problems and provide
                                effective solutions to keep your vehicle running smoothly.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-broadcast"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Brake Repair</h3>
                            </a>
                            <p>We offer comprehensive brake inspections and repairs, ensuring your safety on the road
                                with reliable braking performance.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-easel"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Oil Changes</h3>
                            </a>
                            <p>Regular oil changes are essential for engine health. We provide quick and affordable oil
                                changes using high-quality oil and filters.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-bounding-box-circles"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Tire Services</h3>
                            </a>
                            <p>We provide tire rotations, balancing, and replacements, ensuring your tires wear evenly
                                and maintain optimal traction.
                            </p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Transmission Services</h3>
                            </a>
                            <p>Our team specializes in transmission diagnostics, repairs, and maintenance, ensuring
                                smooth gear shifts and optimal vehicle performance.</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-square-text"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Suspension and Steering</h3>
                            </a>
                            <p>Our technicians inspect and repair suspension and steering systems to enhance vehicle
                                stability and handling.</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <img src="{{ asset('landing/landing/hero-1.jpg') }}" alt="">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Call To Action</h3>
                            <p>Are you ready to take the next step? Book your appointment today to experience our exceptional services firsthand! Don’t miss out on the opportunity to transform your experience with us.</p>
                            <a class="cta-btn" href="#">Book now</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action Section -->


        <!-- ! implement sending message-->
        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Contact</span>
                <h2>Contact</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>Zone 8, Bulan, Philippines</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>09484127192</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>#</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="row gy-4 mt-1">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d486.59115886698964!2d123.88415826619404!3d12.665747748156168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1728275197534!5m2!1sen!2sph"
                            frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Google Maps -->

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="400">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Your Name" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Your Email" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer position-relative dark-background">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Team Swap</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits"> Design by Gonzales, Lois</div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</body>

</html>
