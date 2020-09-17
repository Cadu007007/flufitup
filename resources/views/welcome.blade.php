

    @include('components.landing.header')
    @include('components.landing.navbar')
    {{-- Hero Section --}}
    <div class="hero-container">
        <div class="left">
            <p class="title">
                FLUFFIT-UP
            </p>
            <p class="description">
                <span class="blue-text"> FLUFFIT-UP</span> we know how dreadful laundry can be especially when you have enough to block out the sun! luckily,
                <span class="blue-text"> FLUFFIT-UP</span> is like a day-care centre for your clothes, we take good care of the clothes you wear.
            <div class="buttons-container">
              <button class="large-button active">LOG IN</button>  
              <button class="large-button">SIGN UP</button>  
            </div>
        </div>

        <div class="right">
            <img class="icon" src="{{ asset('images/hero-vector.svg') }}" alt="">
        </div>
    </div>
    {{-- XX Hero Section XX --}}
    
    
    {{-- City Location --}}
    <div class="city-location">
        <div class="left">
            <p class="title">City Search</p>
            <div class="city-location-underline"></div>
            <p class="description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
        </div>
        <div class="right">
            <div class="address-box">
                <input type="text" class="address" placeholder="Enter Your Address" name="address">
                <button class="address-go-button">GO</button>
            </div>
        </div>

    </div>
    {{-- XX City Location XX --}}

    {{-- Why Choose US --}}
    <div class="why-choose-us-container">
        <div class="title-container">

            <p class="title">
                Why Choose Us
            </p>
            <div class="blue-underline"></div>
            
            <p class="subtitle">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
        </div>

        <div class="why-us-features">
            <div class="feature-container">
                <img src="{{ asset('images/icons/diamond.svg') }}" alt="" class="icon">
                <img src="{{ asset('images/icons/diamond-white.svg') }}" alt="" class="icon-active">
                <p class="feature-title">Unique Added Value Services</p>
                <p class="feature-description">
                    We offer way more than just washing! Laundry scenting, individual wrapping and laundry hangers are among many other services that you will love.            
                </p>
            </div>

            <div class="feature-container">
                <img src="{{ asset('images/icons/bag-white.svg') }}" alt="" class="icon-active">
                <img src="{{ asset('images/icons/bag.svg') }}" alt="" class="icon">
                <p class="feature-title">Per Pound Packages</p>
                <p class="feature-description">
                    Pay exactly for what your laundry weights not by its volume. We weigh your laundry after being washed & dried to avoid unfair charges due to wet items                </p>
            </div>

            <div class="feature-container">
                <img src="{{ asset('images/icons/car.svg') }}" alt="" class="icon">
                <img src="{{ asset('images/icons/car-white.svg') }}" alt="" class="icon-active">
                <p class="feature-title">Complementary pickup and delivery</p>
                <p class="feature-description">
                    Enjoy our complementary pickup and delivery with our wash & fold service                </p>
            </div>

            <div class="feature-container">
                <img src="{{ asset('images/icons/dollar.svg') }}" alt="" class="icon">
                <img src="{{ asset('images/icons/dollar-white.svg') }}" alt="" class="icon-active">
                <p class="feature-title">No surprising charges</p>
                <p class="feature-description">
                    You pay only for services you chosen, while added value services are calculated based on actual used not lump sum                </p>
            </div>
            <div class="feature-container">
                <img src="{{ asset('images/icons/soap-bottle.svg') }}" alt="" class="icon">
                <img src="{{ asset('images/icons/soap-bottle-white.svg') }}" alt="" class="icon-active">
                <p class="feature-title">Nature Friendly Detergents</p>
                <p class="feature-description">
                    We have chosen a range of naturally derived products & detergents to clean your clothes, yet gentle enough on your skin                </p>
            </div>
            <div class="feature-container">
                <img src="{{ asset('images/icons/teriangle.svg') }}" alt="" class="icon">
                <img src="{{ asset('images/icons/teriangle-white.svg') }}" alt="" class="icon-active">
                <p class="feature-title">Follow Manufacturer’s instruction</p>
                <p class="feature-description">
                    We follow fabric care labels and place it in appropriate washing cycles                </p>
            </div>
            <div class="feature-container">
                <img src="{{ asset('images/icons/contactless.svg') }}" alt="" class="icon">
                <img src="{{ asset('images/icons/contactless-white.svg') }}" alt="" class="icon-active">
                <p class="feature-title">Contactless Service</p>
                <p class="feature-description">
                    Feel safe with our 100% contactless service during picking up and delivery                </p>
            </div>
        </div>
    </div>
    {{-- XX Why Choose US XX --}}
    
    
    {{-- Our Services --}}
    <div class="our-services-container">
        <div class="title-container">

            <p class="title">
                Our Service
            </p>
            <div class="blue-underline"></div>
            
            <p class="subtitle">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s            
            </p>
        </div>
        <div class="services-container">
            <div class="services-part">
                <div class="service-container">
                    <img src="{{ asset('images/icons/basket.svg') }}" alt="" class="icon">
                    <div class="service-info">
                        <p class="title">
                            Wash and Fold
                        </p>
                         <p class="subtitle">
                            We wash your loads separately from other customers laundry, dry it and your clothes are neatly folded.
                        </p>
                        <p class="read-more">
                            Read More
                        </p>
                    </div>
                </div>
                <div class="service-container">
                    <img src="{{ asset('images/icons/basket-x.png') }}" alt="" class="icon">
                    <div class="service-info">
                        <p class="title">
                            Dry Clean
                        </p>
                         <p class="subtitle">
                            We pick up your dry clean items and drop it to our distributed dry cleaning centres based on your location.
                        </p>
                        <p class="read-more">
                            Read More
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="services-part">
                <div class="service-container">
                    <img src="{{ asset('images/icons/washer.svg') }}" alt="" class="icon">
                    <div class="service-info">
                        <p class="title">
                            Wash, Fold and Dry Clean
                        </p>
                         <p class="subtitle">
                            We are happy take care of your machine wash items as well as your dry clean ones, We return both to you once it's ready
                        </p>
                        <p class="read-more">
                            Read More
                        </p>
                    </div>
                </div>
                <div class="service-container">
                    <img src="{{ asset('images/icons/car.svg') }}" alt="" class="icon">
                    <div class="service-info">
                        <p class="title">
                            Delivery Service Only
                        </p>
                         <p class="subtitle">
                            We take your dry cleaning items to your chosen cleaner, and once ready, we pick it up and deliver it back to you.
                        </p>
                        <p class="read-more">
                            Read More
                        </p>
                    </div>
                </div>
            </div>
            
       
        </div>
    </div>


    {{-- XX Our Services XX --}}
    
    {{-- Download section --}}
    <div class="download">
        <div class="left">
            <p class="download-title">
                Laundry in our hands
            </p>
            
            <p class="download-subtitle">
                Available Now
            </p>
            <div class="buttons-container">
                <div class="download-button">
                    <img src="{{ asset('images/download-apple.svg') }}" alt="">
                    
                </div>
                <div class="download-button">
                    <img src="{{ asset('images/download-google.svg') }}" alt="">
                </div>
                
            </div>
        </div>
        <div class="right">
            <img class="icon" src="{{ asset('images/download-image.png') }}" alt="">

        </div>
    </div>
    {{-- XX Download section XX --}}
    
    
    {{-- ------- How it works -------- --}}
    <div class="how-it-works">
        <div class="title-container">

            <p class="title">
                How It Work
            </p>
            <div class="blue-underline"></div>
            
            <p class="subtitle">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            
            </p>
        </div>

        <div class="steps-container">
            <div class="step-container">
                <div class="step-text">
                    <p class="title">
                        01 - Register
                    </p>
                    <p class="subtitle">
                        Create your profile by entering your information such as your full name, e‐mail and phone number, and your pickup address.
                    </p>
                </div>
                <img src="{{ asset('images/step1.svg') }}" alt="" class="step-image">
                
            </div>

            <div class="step-container reverse">
                <img src="{{ asset('images/step2.svg') }}" alt="" class="step-image">
                <div class="step-text">
                    <p class="title">
                        02 - Select Service
                    </p>
                    <p class="subtitle">
                        Select your desired service from our wide range of services and packages.
                    </p>
                </div>
            </div>


            <div class="step-container">
                <div class="step-text">
                    <p class="title">
                        03 - Service Calendar
                    </p>
                    <p class="subtitle">
                        Choose your preferred pickup and delivery dates from our Service Calendar
                    </p>
                </div>
                <img src="{{ asset('images/step3.svg') }}" alt="" class="step-image">
                
            </div>

            <div class="step-container reverse">
                <img src="{{ asset('images/step4.svg') }}" alt="" class="step-image">
                <div class="step-text">
                    <p class="title">
                        04 - Pick up Laundry
                    </p>
                    <p class="subtitle">
                        Once we receive your order, our driver collects your laundry bag from your doorstep.
                    </p>
                </div>
            </div>

            <div class="step-container">
                <div class="step-text">
                    <p class="title">
                        05 - Check and separate laundry
                    </p>
                    <p class="subtitle">
                        We carefully check and separate your laundry items according to your preferences and selected package, and make sure every item receives the needed care.
                    </p>
                </div>
                <img src="{{ asset('images/step5.svg') }}" alt="" class="step-image">
                
            </div>

            <div class="step-container reverse">
                <img src="{{ asset('images/step6.svg') }}" alt="" class="step-image">
                <div class="step-text">
                    <p class="title">
                        06 - Pick up Laundry
                    </p>
                    <p class="subtitle">
                        Once we receive your order, our driver collects your laundry bag from your doorstep.
                    </p>
                </div>
            </div>


            <div class="step-container">
                <div class="step-text">
                    <p class="title">
                        07 - Deliver Clean Laundry
                    </p>
                    <p class="subtitle">
                        Once your laundry items are ready, your laundry placed in the next route making sure you receive it on the designated delivery day.

                    </p>
                </div>
                <img src="{{ asset('images/step7.svg') }}" alt="" class="step-image">
                
            </div>

        </div>
    </div>
    {{-- -----XX How it works XX------ --}}

    {{-- ------- Contact Us -------- --}}
    <div class="contact-us">
        <div class="title-container">

            <p class="title">
                Contact Us
            </p>
            <div class="blue-underline"></div>
            
            <p class="subtitle">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s

            </p>
        </div>

        <div class="contact-form">
            <div class="left">
                <img src="{{ asset('images/contact-us.svg') }}" alt="" class="form-image">
            </div>
            <div class="right">
                <form action="" method="post">
                    <input type="text" placeholder="Name" class="form-input" name="name">
                    <input type="text" placeholder="Email" class="form-input" name="email">
                    <input type="text" placeholder="ZIP Code" class="form-input" name="zip-code">
                    <textarea name="message"  placeholder="Message"  class="form-text-area" rows="5"></textarea>
                <div class="button-container">

                    <button class="submit-button" type="submit">
                        SUBMIT
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ----- XX Contact Us XX ------ --}}


    {{-- ----- Get in touch ----- --}}
    <div class="get-in-touch">
        <p class="title">
            Get In Touch
        </p>
        <div class="info">
            <div class="address info-section">
                <img src="{{ asset('images/icons/location-white.svg') }}" alt="" class="icon">
                <p class="text">Address</p>
            </div>

            <div class="double-info">
                <div class="phone info-section">
                    <img src="{{ asset('images/icons/phone-white.svg') }}" alt="" class="icon">
                    <p class="text">Phone Number</p>
                </div>
                <div class="email info-section">
                    <img src="{{ asset('images/icons/email-white.svg') }}" alt="" class="icon">
                    <p class="text">Email</p>
                </div>
            </div>
        </div>

        <div class="copyright">
            Copyright © 2020 Fluffit-Up
        </div>
    </div>
    {{-- --- XX Get in touch XX --- --}}

    @include('components.landing.footer')
