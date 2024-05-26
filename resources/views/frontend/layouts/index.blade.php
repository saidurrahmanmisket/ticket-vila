@extends('frontend.app')

@section('title', 'Home')

@section('content')
        <!-- home banner area starts -->
        <section class="home--banner--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="home--banner--content">
                    <div class="left">
                        <h3
                            data-aos="fade-down"
                            data-aos-duration="500"
                            class="main--text"
                        >
                            dream house Raffle
                        </h3>
                        <p
                            data-aos="fade-up"
                            data-aos-duration="500"
                            class="main--subtext"
                        >
                            Be the lucky owner of a dream home, win €850,000.00 for the
                            purchase of a € 99.00 eBook
                        </p>

                        <div
                            data-aos="fade-up"
                            data-aos-duration="900"
                            class="btn--wrapper"
                        >
                            <a href="#" class="btn--fill">
                                <span>Join now</span>
                            </a>
                            <a href="#" class="btn--normal">
                                <span>How does this work?</span>
                            </a>
                        </div>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="600" class="right">
                        <img src="./assets/images/home-hero-banner.png" alt="" />
                        <!-- <video autoplay loop src="./assets/videos/ticketvilla EN.mp4"></video> -->
                        <!-- <iframe
                          src="https://player.vimeo.com/video/950150289?h=a62df445a8"
                          width="640"
                          height="360"
                          frameborder="0"
                          allow="autoplay; fullscreen; picture-in-picture"
                          allowfullscreen
                        ></iframe>
                        <p>
                          <a href="https://vimeo.com/950150289">ticketvilla-en</a> from
                          <a href="https://vimeo.com/user220176202">mashfikur rahman</a>
                          on <a href="https://vimeo.com">Vimeo</a>.
                        </p> -->
                    </div>

                    <!-- live statistics wrapper -->
                    <div
                        data-aos="fade-up"
                        data-aos-duration="800"
                        class="live--statistics--wrapper"
                    >
                        <p class="intro">Live Statistics</p>

                        <div class="live--statistic--content">
                            <div class="milestone--wrapper">
                                <div class="single--one">
                                    <p><span>4,358</span> E-Book Sold</p>
                                </div>
                                <div class="single--one">
                                    <p><span>10,642</span> to The Finish</p>
                                </div>
                                <div class="single--one goal">
                                    <p>Goal 🎉</p>
                                </div>
                                <div class="single--one bonus tickets">
                                    <p>
                                        <span>17,000</span> E-Book
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="10"
                                            height="11"
                                            viewBox="0 0 10 11"
                                            fill="none"
                                        >
                                            <circle
                                                cx="5"
                                                cy="5.5"
                                                r="5"
                                                fill="url(#paint0_linear_13878_1385)"
                                            />
                                            <defs>
                                                <linearGradient
                                                    id="paint0_linear_13878_1385"
                                                    x1="0"
                                                    y1="5.5"
                                                    x2="10"
                                                    y2="5.5"
                                                    gradientUnits="userSpaceOnUse"
                                                >
                                                    <stop stop-color="#E8880F" />
                                                    <stop offset="1" stop-color="#FFCF7E" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </p>
                                </div>
                                <div class="single--one bonus">
                                    <p>
                                        <span>20,000</span> E-Book
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="10"
                                            height="11"
                                            viewBox="0 0 10 11"
                                            fill="none"
                                        >
                                            <circle
                                                cx="5"
                                                cy="5.5"
                                                r="5"
                                                fill="url(#paint0_linear_13878_1385)"
                                            />
                                            <defs>
                                                <linearGradient
                                                    id="paint0_linear_13878_1385"
                                                    x1="0"
                                                    y1="5.5"
                                                    x2="10"
                                                    y2="5.5"
                                                    gradientUnits="userSpaceOnUse"
                                                >
                                                    <stop stop-color="#E8880F" />
                                                    <stop offset="1" stop-color="#FFCF7E" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </p>
                                </div>
                            </div>

                            <div class="progress--wrapper">
                                <span>34%</span>
                                <span>66%</span>
                                <span>Bonus</span>
                                <span>Bonus</span>
                                <div class="progress--bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home banner area ends -->

        <!-- some facts area starts -->
        <section class="some--facts--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="some--facts--area--content">
                    <h3
                        data-aos="fade-up"
                        data-aos-duration="600"
                        class="common--heading--title"
                    >
                        Here are some facts.
                    </h3>

                    <div class="facts--wrapper">
                        <div
                            data-aos="fade-up"
                            data-aos-duration="500"
                            class="single--facts"
                        >
                            <div class="icon">
                                <img src="./assets/images/facts1.svg" alt="" />
                            </div>

                            <div class="text--wrapper">
                                <p class="main"><span>6</span></p>
                                <p class="sub">Total Bedroom</p>
                            </div>
                        </div>
                        <div
                            data-aos="fade-up"
                            data-aos-duration="700"
                            class="single--facts"
                        >
                            <div class="icon">
                                <img src="./assets/images/facts2.svg" alt="" />
                            </div>

                            <div class="text--wrapper">
                                <p class="main"><span>4</span></p>
                                <p class="sub">Bathrooms</p>
                            </div>
                        </div>
                        <div
                            data-aos="fade-up"
                            data-aos-duration="900"
                            class="single--facts"
                        >
                            <div class="icon">
                                <img src="./assets/images/facts3.svg" alt="" />
                            </div>

                            <div class="text--wrapper">
                                <p class="main"><span>411</span> <sup>m2</sup></p>
                                <p class="sub">Living Space</p>
                            </div>
                        </div>
                        <div
                            data-aos="fade-up"
                            data-aos-duration="1100"
                            class="single--facts"
                        >
                            <div class="icon">
                                <img src="./assets/images/facts4.svg" alt="" />
                            </div>

                            <div class="text--wrapper">
                                <p class="main"><span>1230</span> <sup>m2</sup></p>
                                <p class="sub">Property Area</p>
                            </div>
                        </div>
                        <div
                            data-aos="fade-up"
                            data-aos-duration="1300"
                            class="single--facts"
                        >
                            <div class="icon">
                                <img src="./assets/images/facts1.svg" alt="" />
                            </div>

                            <div class="text--wrapper">
                                <p class="main"><span>850</span>.000 EUR</p>
                                <p class="sub">Purchase Price</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- some facts area ends -->

        <!-- home chance area starts -->
        <section class="home--chance--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="home--chance--area--content">
                    <div class="top--area">
                        <div data-aos="fade-up" data-aos-duration="600" class="left">
                            <h3 class="common--heading--title">
                                Your chance for a dream home.
                            </h3>

                            <p class="sub--text">
                                Experience the thrill of winning a house through our raffle
                                with just a 99€ ticket. Don't miss out on this incredible
                                opportunity!
                            </p>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="800" class="right">
                            <a href="#" class="btn--fill">
                                <span>Learn More</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="transparent"
                                >
                                    <path
                                        d="M15.75 7.72607L0.75 7.72607"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        fill="transparent"
                                    />

                                    <path
                                        d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        fill="transparent"
                                    />
                                </svg>
                            </a>
                            <a href="#" class="btn--fill blue--btn">
                                <span>Sign Up</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72607L0.75 7.72607"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- slider area -->
                    <div class="home--chance--slider">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="single--card">
                                    <img
                                        class="cover--img"
                                        src="./assets/images/single-chance1.png"
                                        alt=""
                                    />

                                    <div class="overlay"></div>

                                    <div class="content">
                                        <div class="icon">
                                            <img src="./assets/images/chance-icon1.png" alt="" />
                                        </div>
                                        <p class="text">Gallery</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single--card">
                                    <img
                                        class="cover--img"
                                        src="./assets/images/single-chance2.png"
                                        alt=""
                                    />

                                    <div class="overlay"></div>

                                    <div class="content">
                                        <div class="icon">
                                            <img src="./assets/images/chance-icon2.png" alt="" />
                                        </div>
                                        <p class="text">3D walkaround <span>(inside)</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single--card">
                                    <img
                                        class="cover--img"
                                        src="./assets/images/single-chance3.png"
                                        alt=""
                                    />

                                    <div class="overlay"></div>

                                    <div class="content">
                                        <div class="icon">
                                            <img src="./assets/images/chance-icon2.png" alt="" />
                                        </div>
                                        <p class="text">3D walkaround <span>(outside)</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single--card">
                                    <img
                                        class="cover--img"
                                        src="./assets/images/single-chance4.png"
                                        alt=""
                                    />

                                    <div class="overlay"></div>

                                    <div class="content">
                                        <div class="icon">
                                            <img src="./assets/images/chance-icon2.png" alt="" />
                                        </div>
                                        <p class="text">3D walkaround <span>(outside)</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single--card">
                                    <img
                                        class="cover--img"
                                        src="./assets/images/single-chance3.png"
                                        alt=""
                                    />

                                    <div class="overlay"></div>

                                    <div class="content">
                                        <div class="icon">
                                            <img src="./assets/images/chance-icon2.png" alt="" />
                                        </div>
                                        <p class="text">3D walkaround <span>(outside)</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single--card">
                                    <img
                                        class="cover--img"
                                        src="./assets/images/single-chance4.png"
                                        alt=""
                                    />

                                    <div class="overlay"></div>

                                    <div class="content">
                                        <div class="icon">
                                            <img src="./assets/images/chance-icon2.png" alt="" />
                                        </div>
                                        <p class="text">3D walkaround <span>(outside)</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home chance area ends -->

        <!-- the process area starts -->
        <section class="the--process--area--wrapper section--bottom--gap">
            <div class="container">
                <h3
                    data-aos="fade-up"
                    data-aos-duration="600"
                    class="common--heading--title"
                >
                    The Process
                </h3>

                <div class="the--process--area--content">
                    <div class="single--process">
                        <div class="img--container">
                            <img src="./assets/images/single-process.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">
                                We Are Officially Starting To Sell The e-Book
                            </h3>
                            <p class="subtext">
                                The eBooks are now on sale worldwide, accepting a wide range
                                of payment methods including methods including Euros, Dollars
                                and many other currencies to suit everyone's preferences. Each
                                e-book comes with a free numbered entry ticket for the Dream
                                House prize draw.
                            </p>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">E-BOOK SALE STARTS</p>
                                <img src="./assets/images/process-icon1.png" alt="" />

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container">
                            <img src="./assets/images/single-process.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">
                                One insider dashboard for all your needs.
                            </h3>
                            <p class="subtext">
                                Explore exposés, buy tickets, join our affiliate programme to
                                earn money, view live statistics, news updates and more. Our
                                dedicated dashboard streamlines the entire process for
                                seamless management.
                            </p>

                            <a href="#" class="btn--fill blue--btn">
                                <span>Buy Now</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72607L0.75 7.72607"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">All your needs</p>
                                <img src="./assets/images/process-icon2.png" alt="" />

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn extra--content">
                        <div class="img--container">
                            <img src="./assets/images/single-process.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">
                                We have reached our goal, the raffle is about to start!
                            </h3>
                            <p class="subtext">
                                We have reached our goal and the raffle can begin. But wait,
                                there is more! If we reach our goal within the target time
                                frame of 6 months, the lucky winner will receive substantial
                                bonuses. Bonus milestones are at 17,000 and 20,000 tickets
                                sold. Keep scrolling
                            </p>

                            <a href="#" class="btn--fill blue--btn">
                                <span>Buy Now</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72607L0.75 7.72607"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">15.000 E-book sold</p>
                                <img src="./assets/images/process-icon3.png" alt="" />

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container">
                            <img src="./assets/images/process-new1.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">€20,000 extra furniture voucher.</h3>
                            <p class="subtext">
                                At this point, the lucky winner will receive an extra €20,000
                                furniture voucher to go with the house! You might think there
                                is nothing left to be desired. A luxurious house for just €99,
                                plus a €20,000 furniture voucher or the winner can choose the
                                €20,000 cash. What more could you ask for?
                            </p>

                            <a href="#" class="btn--fill blue--btn">
                                <span>Buy Now</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72607L0.75 7.72607"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content bonus">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">17.000 tickets sold</p>
                                <img src="./assets/images/process-icon4.png" alt="" />
                                <p class="bonus--text">bonus</p>

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn less--content">
                        <div class="img--container">
                            <img src="./assets/images/single-process.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">Proven fair, legally secure</h3>
                            <p class="subtext">
                                Experience peace of mind with our raffle: proven fair and
                                legally secure. Enter for a chance to win your dream home!
                            </p>

                            <a href="#" class="btn--normal border blank">
                                <span>Learn More</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">Good to Know</p>
                                <img src="./assets/images/process-icon5.png" alt="" />

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn over--text extra--content">
                        <div class="img--container">
                            <img src="./assets/images/process-new2.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">
                                Installation of an additional solar-heated indoor pool.
                            </h3>
                            <p class="subtext">
                                Yes! When we reach 20,000 tickets sold, the winner will not
                                only receive the house and the €20,000 voucher, but also a
                                solar heated, fully indoor swimming pool for you, your family
                                and friends to enjoy. The value of this is €60,000.00 or the
                                winner can choose to claim the cash price instead.
                            </p>

                            <a href="#" class="btn--normal border blank">
                                <span>Learn More</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content bonus">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">20.000 tickets sold</p>
                                <img src="./assets/images/process-icon4.png" alt="" />
                                <p class="bonus--text">bonus</p>

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container">
                            <img src="./assets/images/single-process.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">
                                The odds are <span class="gold-span">9332</span> times better
                                than the lottery
                            </h3>
                            <p class="subtext">
                                Experience peace of mind with our raffle: proven fair and
                                legally secure. Enter for a chance to win your dream home!
                            </p>

                            <a href="#" class="btn--normal border blank">
                                <span>Learn More</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">Live drawing</p>
                                <img src="./assets/images/process-icon6.png" alt="" />

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container">
                            <img src="./assets/images/process-new3.png" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">
                                We guarantee 100% transparency! The winner is drawn live.
                            </h3>
                            <p class="subtext">
                                Pledge complete transparency with us! Our commitment to
                                fairness means that the winner will be drawn live on YouTube
                                by a Cypriot Notary Public so that the excitement can be
                                viewed by all. Don't miss your chance to win big!
                            </p>

                            <div class="btn--wrapper">
                                <a href="#" class="btn--fill">
                                    <span>Learn More</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="17"
                                        height="15"
                                        viewBox="0 0 17 15"
                                        fill="none"
                                    >
                                        <path
                                            d="M15.75 7.72559L0.75 7.72559"
                                            stroke="white"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                            stroke="white"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </a>
                                <a href="#" class="btn--normal border blank">
                                    <span>Learn More</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="17"
                                        height="15"
                                        viewBox="0 0 17 15"
                                        fill="none"
                                    >
                                        <path
                                            d="M15.75 7.72559L0.75 7.72559"
                                            stroke="#010C0F"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                            stroke="#010C0F"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- the process area ends -->

        <!-- ticket chance area starts -->
        <section class="ticket--chance--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="ticket--chance--area--content">
                    <div class="ticket--img--holder">
                        <div class="img--box">
                            <img
                                class="ticket1"
                                src="./assets/images/ticket-main.png"
                                alt=""
                            />
                            <img
                                class="ticket2"
                                src="./assets/images/ticket-main.png"
                                alt=""
                            />
                            <img
                                class="ticket3"
                                src="./assets/images/ticket-main.png"
                                alt=""
                            />
                        </div>

                        <div class="base--holder">
                            <img src="./assets/images/base-circle.svg" alt="" />
                        </div>
                    </div>

                    <div
                        data-aos="fade-left"
                        data-aos-duration="700"
                        class="text--holder"
                    >
                        <h3 class="common--heading--title">This is your Chance</h3>
                        <p class="subtext">
                            This could be the opportunity of a lifetime. It seems too too
                            good to be true, but it is, and that is the beauty of the House
                            Raffle. Buy an eBook for just £99 and get a ticket with a real,
                            proven, fair and legitimate to win the home of your dreams.
                        </p>

                        <a href="#" class="gold--link"
                        >This ticket can change your life.</a
                        >

                        <div class="btn--wrapper">
                            <a href="#" class="btn--fill blue--btn">
                                <span>Buy Now</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke="white"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                            <a href="#" class="btn--normal border blank">
                                <span>See More</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke="#010C0F"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ticket chance area ends -->

        <!-- spin area starts -->
        <section
            data-aos="fade-up"
            data-aos-duration="600"
            class="spin--area--wrapper section--bottom--gap"
        >
            <div class="container">
                <div class="spin--area--content">
                    <h3 class="main">Win yours</h3>
                    <h3 class="main gold--text">Dream Home</h3>

                    <a href="#" class="btn--fill blue--btn">
                        <span>Buy Now</span>
                    </a>
                </div>
            </div>

            <!-- spinner -->
            <div class="spinner--holder">
                <img class="spin" src="./assets/images/spinner.png" alt="" />

                <!-- spinner pointer -->
                <div class="pointer">
                    <img src="./assets/images/spinner-pointer.svg" alt="" />
                </div>
            </div>
        </section>
        <!-- spin area ends -->

        <!-- small steps area starts -->
        <section class="small--steps--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="small--steps--area--content">
                    <div
                        data-aos="fade-up"
                        data-aos-duration="500"
                        class="single--step"
                    >
                        <div class="icon">
                            <img src="./assets/images/small-step1.svg" alt="" />
                        </div>

                        <div class="text">
                            <p class="main">To Register</p>
                            <p class="sub">Create an account for free.</p>
                        </div>

                        <!-- id -->
                        <div class="id">
                            <img src="./assets/images/01.svg" alt="" />
                        </div>
                    </div>
                    <div
                        data-aos="fade-up"
                        data-aos-duration="800"
                        class="single--step"
                    >
                        <div class="icon">
                            <img src="./assets/images/small-step2.svg" alt="" />
                        </div>

                        <div class="text">
                            <p class="main">To buy a ticket</p>
                            <p class="sub">Buy any number of tickets.</p>
                        </div>
                        <!-- id -->
                        <div class="id"><img src="./assets/images/02.svg" alt="" /></div>
                    </div>
                    <div
                        data-aos="fade-up"
                        data-aos-duration="1100"
                        class="single--step"
                    >
                        <div class="icon">
                            <img src="./assets/images/small-step3.svg" alt="" />
                        </div>

                        <div class="text">
                            <p class="main">Live Raffle</p>
                            <p class="sub">Follow the status and the draw live.</p>
                        </div>
                        <!-- id -->
                        <div class="id"><img src="./assets/images/03.svg" alt="" /></div>
                    </div>
                    <div
                        data-aos="fade-up"
                        data-aos-duration="1400"
                        class="single--step"
                    >
                        <div class="icon">
                            <img src="./assets/images/small-step4.svg" alt="" />
                        </div>

                        <div class="text">
                            <p class="main">Win House</p>
                            <p class="sub">Enjoy your turnkey dream home.</p>
                        </div>
                        <!-- id -->
                        <div class="id"><img src="./assets/images/04.svg" alt="" /></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- small steps area ends -->

        <!-- special features area starts -->
        <section
            class="home--special--feature--area--wrapper section--bottom--gap"
        >
            <div class="container">
                <div class="home--special--feature--content">
                    <div
                        data-aos="fade-right"
                        data-aos-duration="600"
                        class="single--feature"
                    >
                        <h3 class="big--text">€850,000 Dream Home</h3>
                        <p class="big--para">no hidden additional costs!</p>
                    </div>
                    <div
                        data-aos="fade-left"
                        data-aos-duration="900"
                        class="single--feature"
                    >
                        <p class="gold--text">100%</p>
                        <p class="gold--para">Legally secure</p>
                    </div>
                    <div
                        data-aos="fade-right"
                        data-aos-duration="600"
                        class="single--feature common"
                    >
                        <div class="icon">
                            <img src="./assets/images/feature--book.svg" alt="" />
                        </div>
                        <div>
                            <p class="title">Done notarized</p>
                            <p class="sub--title">Absolutely serid and binding.</p>
                        </div>
                    </div>
                    <div
                        data-aos="fade-left"
                        data-aos-duration="900"
                        class="single--feature common"
                    >
                        <div>
                            <p class="title">Only 99€</p>
                            <p class="sub--title">Per ticket, the winner gets the house.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- special features area ends -->

        <!-- house tour area starts -->
        <section class="house--tour--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="house--tour--area--content">
                    <h3 class="title">3D house tour</h3>

                    <div class="area--wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!4v1716460175150!6m8!1m7!1sNY2kCM9GwhDdxMztNku49Q!2m2!1d47.03569798506084!2d16.01661381905965!3f16.892984!4f0!5f0.7820865974627469"
                            width="600"
                            height="450"
                            style="border: 0"
                            allowfullscreen="false"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>

                        <div class="overlay">
                            <div class="instruction--text">
                                <div class="icon">
                                    <img src="./assets/images/icon-360.png" alt="" />
                                </div>
                                <p>Click to start</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- house tour area ends -->

        <!-- get your ticket area starts -->
        <div
            data-aos="fade-up"
            data-aos-duration="600"
            class="get--your--tickets--area--wrapper section--bottom--gap"
        >
            <div class="container">
                <div class="get--your--tickets--area--content">
                    <h3 class="main">Get your Ticket</h3>
                    <a href="#" class="btn--fill blue--btn">
                        <span>Buy Now</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- get your ticket area ends -->

        <!-- business feature area starts -->
        <section class="business--feature--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="business--feature--area--content">
                    <div
                        data-aos="fade-up"
                        data-aos-duration="500"
                        class="single--feature"
                    >
                        <div class="icon">
                            <img src="./assets/images/business-feature1.png" alt="" />
                        </div>
                        <p class="title">Secure</p>
                    </div>
                    <div
                        data-aos="fade-up"
                        data-aos-duration="800"
                        class="single--feature"
                    >
                        <div class="icon">
                            <img src="./assets/images/business-feature2.png" alt="" />
                        </div>
                        <p class="title">Legal</p>
                    </div>
                    <div
                        data-aos="fade-up"
                        data-aos-duration="1100"
                        class="single--feature"
                    >
                        <div class="icon">
                            <img src="./assets/images/business-feature3.png" alt="" />
                        </div>
                        <p class="title">Fair</p>
                    </div>
                    <div
                        data-aos="fade-up"
                        data-aos-duration="1300"
                        class="single--feature"
                    >
                        <div class="icon">
                            <img src="./assets/images/business-feature4.png" alt="" />
                        </div>
                        <p class="title">Real opportunity</p>
                    </div>
                    <div
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        class="single--feature"
                    >
                        <div class="icon">
                            <img src="./assets/images/business-feature5.png" alt="" />
                        </div>
                        <p class="title">Cheap</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- business feature area ends -->
@endsection

