<template>
    <div class="landing-container" id="fullpage">
        <div class="hero-container section item">
            <div class="navbar-container flex-wrap">
                <a href="#whyChooseUs" class="navbar-item">
                    Why Choose Us
                </a>
                <a href="#ourService" class="navbar-item">
                    Our Service
                </a>

                <div class="navbar-item logo d-none d-sm-block">
                    <img class="icon" src="/images/logo.png" alt="" />
                </div>
                <a href="#howItWork" class="navbar-item">
                    How It Work
                </a>
                <a href="#contactUs" class="navbar-item">
                    Contact Us
                </a>
            </div>

            <div class="hero-flex d-flex flex-row flex-wrap-reverse">
                <div class="left col-lg-6 col-md-12 mr-2">
                    <p class="title">
                        FLUFFIT-UP
                    </p>

                    <p class="description">
                        <span class="blue-text"> FLUFFIT-UP</span> we know how
                        dreadful laundry can be especially when you have enough
                        to block out the sun! luckily,
                        <span class="blue-text"> FLUFFIT-UP</span> is like a
                        day-care centre for your clothes, we take good care of
                        the clothes you wear.
                    </p>

                    <div class="buttons-container">
                        <a href="/login">
                            <button class="large-button active mt-2">LOG IN</button>
                        </a>
                        <a href="/register">
                            <button class="large-button mt-2">SIGN UP</button>
                        </a>
                    </div>
                </div>

                <div class="right">
                    <img class="icon" src="/images/hero-vector.svg" alt="" />
                </div>
            </div>
        </div>
        <div
            class="city-location row mt-3 pt-3 mx-auto"
            style="background-image: url(/images/city-location-vector.svg)"
        >
            <div class="left col-lg-4 ml-auto" style="max-width: 600px">
                <p class="title text-right ml-auto">City Search</p>
                <div class="city-location-underline"></div>
                <p class="description text-right">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s
                </p>
            </div>
            <div class="right col-lg-8 mb-2  ml-auto" style="max-width: 600px">
                <div class="address-box">
                    <input
                        type="text"
                        class="address"
                        placeholder="Enter Your Address"
                        name="address"
                    />
                    <button class="address-go-button">GO</button>
                </div>
            </div>
        </div>
        <div class="why-choose-us-container section item" id="whyChooseUs">
            <div class="title-container">
                <p class="title">
                    Why Choose Us
                </p>
                <div class="blue-underline"></div>

                <p class="subtitle">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s
                </p>
            </div>

            <div class="why-us-features">
                <div
                    class="feature-container"
                    :class="activefeature == 1 ? 'active' : ''"
                    @mouseenter="handleHover(1)"
                    @mouseleave="handleHover(0)"
                >
                    <img src="/images/icons/diamond.svg" alt="" class="icon" />
                    <img
                        src="/images/icons/diamond-white.svg"
                        alt=""
                        class="icon-active"
                    />
                    <p class="feature-title">Unique Added Value Services</p>
                    <p class="feature-description">
                        We offer way more than just washing! Laundry scenting,
                        individual wrapping and laundry hangers are among many
                        other services that you will love.
                    </p>
                </div>

                <div
                    class="feature-container"
                    :class="activefeature == 2 ? 'active' : ''"
                    @mouseenter="handleHover(2)"
                    @mouseleave="handleHover(0)"
                >
                    <img
                        src="/images/icons/bag-white.svg"
                        alt=""
                        class="icon-active"
                    />
                    <img src="/images/icons/bag.svg" alt="" class="icon" />
                    <p class="feature-title">Per Pound Packages</p>
                    <p class="feature-description">
                        Pay exactly for what your laundry weights not by its
                        volume. We weigh your laundry after being washed & dried
                        to avoid unfair charges due to wet items
                    </p>
                </div>

                <div
                    class="feature-container"
                    :class="activefeature == 3 ? 'active' : ''"
                    @mouseenter="handleHover(3)"
                    @mouseleave="handleHover(0)"
                >
                    <img src="/images/icons/car.svg" alt="" class="icon" />
                    <img
                        src="/images/icons/car-white.svg"
                        alt=""
                        class="icon-active"
                    />
                    <p class="feature-title">
                        Complementary pickup and delivery
                    </p>
                    <p class="feature-description">
                        Enjoy our complementary pickup and delivery with our
                        wash & fold service
                    </p>
                </div>

                <div
                    class="feature-container"
                    :class="activefeature == 4 ? 'active' : ''"
                    @mouseenter="handleHover(4)"
                    @mouseleave="handleHover(0)"
                >
                    <img src="/images/icons/dollar.svg" alt="" class="icon" />
                    <img
                        src="/images/icons/dollar-white.svg"
                        alt=""
                        class="icon-active"
                    />
                    <p class="feature-title">No surprising charges</p>
                    <p class="feature-description">
                        You pay only for services you chosen, while added value
                        services are calculated based on actual used not lump
                        sum
                    </p>
                </div>
                <div
                    class="feature-container"
                    :class="activefeature == 5 ? 'active' : ''"
                    @mouseenter="handleHover(5)"
                    @mouseleave="handleHover(0)"
                >
                    <img
                        src="/images/icons/soap-bottle.svg"
                        alt=""
                        class="icon"
                    />
                    <img
                        src="/images/icons/soap-bottle-white.svg"
                        alt=""
                        class="icon-active"
                    />
                    <p class="feature-title">Nature Friendly Detergents</p>
                    <p class="feature-description">
                        We have chosen a range of naturally derived products &
                        detergents to clean your clothes, yet gentle enough on
                        your skin
                    </p>
                </div>
                <div
                    class="feature-container"
                    :class="activefeature == 6 ? 'active' : ''"
                    @mouseenter="handleHover(6)"
                    @mouseleave="handleHover(0)"
                >
                    <img
                        src="/images/icons/teriangle.svg"
                        alt=""
                        class="icon"
                    />
                    <img
                        src="/images/icons/teriangle-white.svg"
                        alt=""
                        class="icon-active"
                    />
                    <p class="feature-title">
                        Follow Manufacturer’s instruction
                    </p>
                    <p class="feature-description">
                        We follow fabric care labels and place it in appropriate
                        washing cycles
                    </p>
                </div>
                <div
                    class="feature-container"
                    :class="activefeature == 7 ? 'active' : ''"
                    @mouseenter="handleHover(7)"
                    @mouseleave="handleHover(0)"
                >
                    <img
                        src="/images/icons/contactless.svg"
                        alt=""
                        class="icon"
                    />
                    <img
                        src="/images/icons/contactless-white.svg"
                        alt=""
                        class="icon-active"
                    />
                    <p class="feature-title">Contactless Service</p>
                    <p class="feature-description">
                        Feel safe with our 100% contactless service during
                        picking up and delivery
                    </p>
                </div>
            </div>
        </div>
        <div class="our-services-container section item" id="ourService">
            <div class="title-container">
                <p class="title">
                    Our Service
                </p>
                <div class="blue-underline"></div>

                <p class="subtitle">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s
                </p>
            </div>
            <div class="services-container">
                <div class="services-part">
                    <div class="service-container mt-2">
                        <img
                            src="/images/icons/basket.svg"
                            alt=""
                            class="icon"
                        />
                        <div class="service-info">
                            <p class="title">
                                Wash and Fold
                            </p>
                            <p class="subtitle">
                                We wash your loads separately from other
                                customers laundry, dry it and your clothes are
                                neatly folded.
                            </p>
                            <!-- <p class="read-more">
                                Read More
                            </p> -->
                        </div>
                    </div>
                    <div class="service-container mt-2">
                        <img
                            src="/images/icons/basket-x.png"
                            alt=""
                            class="icon"
                        />
                        <div class="service-info">
                            <p class="title">
                                Dry Clean
                            </p>
                            <p class="subtitle">
                                We pick up your dry clean items and drop it to
                                our distributed dry cleaning centres based on
                                your location.
                            </p>
                            <!-- <p class="read-more">
                                Read More
                            </p> -->
                        </div>
                    </div>
                </div>

                <div class="services-part">
                    <div class="service-container mt-2">
                        <img
                            src="/images/icons/washer.svg"
                            alt=""
                            class="icon"
                        />
                        <div class="service-info">
                            <p class="title">
                                Wash, Fold and Dry Clean
                            </p>
                            <p class="subtitle">
                                We are happy take care of your machine wash
                                items as well as your dry clean ones, We return
                                both to you once it's ready
                            </p>
                            <!-- <p class="read-more">
                                Read More
                            </p> -->
                        </div>
                    </div>
                    <div class="service-container mt-2">
                        <img src="/images/icons/car.svg" alt="" class="icon" />
                        <div class="service-info">
                            <p class="title">
                                Delivery Service Only
                            </p>
                            <p class="subtitle">
                                We take your dry cleaning items to your chosen
                                cleaner, and once ready, we pick it up and
                                deliver it back to you.
                            </p>
                            <!-- <p class="read-more">
                                Read More
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-packages section item reverse">
            <div class="title-container">
                <p class="title">
                    Our Packages
                </p>
                <div class="blue-underline"></div>

                <p class="subtitle">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s
                </p>
            </div>

            <p class="packages-title">
                Ad Hoc Packages
            </p>
            <div class="packages-container">
                <PackageContainer
                    v-for="(item, index) in packagesadhoclist"
                    :key="index"
                    :title="item.title"
                    :price="item.price"
                    :description="item.description"
                    :button="item.button"
                    @show-package-details="goToPackageDetails(item.id)"
                />
            </div>

            <p class="packages-title">
                Bi-Weekly Packages
            </p>

            <div class="packages-container">
                <PackageContainer
                    v-for="(item, index) in packagebiweeklylist"
                    :key="index"
                    :title="item.title"
                    :price="item.price"
                    :description="item.description"
                    :button="item.button"
                    @show-package-details="goToPackageDetails(item.id)"
                />
            </div>

            <p class="packages-title">
                Monthly Packages
            </p>

            <div class="packages-container">
                <PackageContainer
                    v-for="(item, index) in packagesmonthlylist"
                    :key="index"
                    :title="item.title"
                    :price="item.price"
                    :description="item.description"
                    :button="item.button"
                    @show-package-details="goToPackageDetails(item.id)"
                />
            </div>

            <p class="packages-title">
                Create Your Package
            </p>

            <div class="packages-container">
                <PackageContainer
                    title="Create your package"
                    description="Lorem Ipsum is simply dummy text of the printing and typesetting industry"
                    button="Create"
                    :buttonroute="packagecreateroute"
                />
            </div>
        </div>
        <div class="how-it-works section item" id="howItWork">
            <div class="title-container">
                <p class="title">
                    How It Work
                </p>
                <div class="blue-underline"></div>
                <p class="subtitle">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s
                </p>
            </div>

            <div class="steps-container">
                <div class="step-container">
                    <div class="step-text">
                        <p class="title">
                            01 - Register
                        </p>
                        <p class="subtitle">
                            Create your profile by entering your information
                            such as your full name, e‐mail and phone number, and
                            your pickup address.
                        </p>
                    </div>
                    <img src="/images/step1.svg" alt="" class="step-image" />
                </div>

                <div class="step-container reverse">
                    <img src="/images/step2.svg" alt="" class="step-image" />
                    <div class="step-text">
                        <p class="title">
                            02 - Select Service
                        </p>
                        <p class="subtitle">
                            Select your desired service from our wide range of
                            services and packages.
                        </p>
                    </div>
                </div>

                <div class="step-container">
                    <div class="step-text">
                        <p class="title">
                            03 - Service Calendar
                        </p>
                        <p class="subtitle">
                            Choose your preferred pickup and delivery dates from
                            our Service Calendar
                        </p>
                    </div>
                    <img src="/images/step3.svg" alt="" class="step-image" />
                </div>

                <div class="step-container reverse">
                    <img src="/images/step4.svg" alt="" class="step-image" />
                    <div class="step-text">
                        <p class="title">
                            04 - Pick up Laundry
                        </p>
                        <p class="subtitle">
                            Once we receive your order, our driver collects your
                            laundry bag from your doorstep.
                        </p>
                    </div>
                </div>

                <div class="step-container">
                    <div class="step-text">
                        <p class="title">
                            05 - Check and separate laundry
                        </p>
                        <p class="subtitle">
                            We carefully check and separate your laundry items
                            according to your preferences and selected package,
                            and make sure every item receives the needed care.
                        </p>
                    </div>
                    <img src="/images/step5.svg" alt="" class="step-image" />
                </div>

                <div class="step-container reverse">
                    <img src="/images/step6.svg" alt="" class="step-image" />
                    <div class="step-text">
                        <p class="title">
                            06 - Pick up Laundry
                        </p>
                        <p class="subtitle">
                            Once we receive your order, our driver collects your
                            laundry bag from your doorstep.
                        </p>
                    </div>
                </div>
                <div class="step-container">
                    <div class="step-text">
                        <p class="title">
                            07 - Deliver Clean Laundry
                        </p>
                        <p class="subtitle">
                            Once your laundry items are ready, your laundry
                            placed in the next route making sure you receive it
                            on the designated delivery day.
                        </p>
                    </div>
                    <img src="/images/step7.svg" alt="" class="step-image" />
                </div>
            </div>
        </div>
        <div class="contact-us section item" id="contactUs">
            <div class="title-container">
                <p class="title">
                    Contact Us
                </p>
                <div class="blue-underline"></div>

                <p class="subtitle">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s
                </p>
            </div>

            <div class="contact-form row">
                <div class="left col-lg-6">
                    <img
                        src="/images/contact-us.svg"
                        alt=""
                        class="form-image"
                    />
                </div>
                <div class="right col-lg-6 mt-3">
                    <form action="/dummy" method="post">
                        <input
                            type="text"
                            placeholder="Name"
                            class="form-input"
                            name="name"
                        />
                        <input
                            type="text"
                            placeholder="Email"
                            class="form-input"
                            name="email"
                        />
                        <input
                            type="text"
                            placeholder="ZIP Code"
                            class="form-input"
                            name="zip-code"
                        />
                        <textarea
                            name="message"
                            placeholder="Message"
                            class="form-text-area"
                            rows="5"
                        ></textarea>
                        <div class="button-container">
                            <button class="submit-button" type="submit">
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="get-in-touch">
            <p class="title">
                Get In Touch
            </p>
            <div class="info">
                <div class="address info-section item">
                    <img
                        src="/images/icons/location-white.svg"
                        alt=""
                        class="icon"
                    />
                    <p class="text">Address</p>
                </div>

                <div class="double-info">
                    <div class="phone info-section item">
                        <img
                            src="/images/icons/phone-white.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="text">Phone Number</p>
                    </div>
                    <div class="email info-section item">
                        <img
                            src="/images/icons/email-white.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="text">Email</p>
                    </div>
                </div>
            </div>

            <div class="copyright">
                Copyright © 2020 Fluffit-Up
            </div>
        </div>
    </div>
</template>

<script>
import VueScrollSnap from "vue-scroll-snap";
import PackageContainer from "../components/User/Pages/Packages/Components/PackageContainer";
export default {
    data() {
        return {
            activefeature: 0
        };
    },
    components: {
        VueScrollSnap,
        PackageContainer
    },
    props: {
        packagesadhoclist: Array,
        packagebiweeklylist: Array,
        packagesmonthlylist: Array,
        packageshowroute: String,
        packagecreateroute: String
    },
    methods: {
        handleHover(id) {
            this.activefeature = id;
        }
    }
};
</script>

<style lang="scss">
.landing-container {
    background: #fff;
    z-index: 0;
    .our-packages {
        .packages-container {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: center;
        }
    }
}
</style>
