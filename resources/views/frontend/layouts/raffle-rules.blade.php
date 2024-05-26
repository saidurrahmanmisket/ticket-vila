@extends('frontend.app')

@section('title', 'Ticket Villa')

@section('content')
      <section
        class="imprint--banner--area--wrapper section--bottom--gap banner--top--gap raffle--rules"
      >
        <div class="container">
          <div class="imprint--banner--area--content">
            <div class="left">
              <h3
                data-aos="fade-down"
                data-aos-duration="600"
                class="banner--main--text"
              >
                Raffle Rules
              </h3>
              <p
                data-aos="fade-up"
                data-aos-duration="800"
                class="banner--para"
              >
                Step into Your Future Home: Dive Deep into the Details with Our
                Comprehensive Guide to the Raffle Rules and Regulations.
              </p>
            </div>
            <div data-aos="fade-left" data-aos-duration="600" class="right">
              <img src="{{ asset('frontend/images/raffle-rules-bg.png') }}" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- banner area ends -->

      <!-- raffle rules content starts -->
      <section class="raffle--rules--content--wrapper section--bottom--gap">
        <div class="container">
          <div class="raffle--rules--content">
            <div class="single--raffle--rule">
              <div class="left">
                <img src="{{ asset('frontend/images/raffle1.png') }}" alt="" />
              </div>
              <div class="right">
                <h3 class="main--text">§1 Eligibility</h3>
                <p class="sub--text">
                  I Participants must be 18 years or older. Proof of age and
                  residency may be required.
                </p>
              </div>
            </div>
            <div class="single--raffle--rule">
              <div class="left">
                <img src="{{ asset('frontend/images/raffle2.png') }}" alt="" />
              </div>
              <div class="right">
                <h3 class="main--text">§2 Ticket Purchase</h3>
                <p class="sub--text">
                  Each raffle ticket costs €99 Tickets can be purchased through
                  our official website. Participants may buy multiple tickets
                  for increased chances of winning.
                </p>

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
                        d="M16.25 7.72607L1.25 7.72607"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M10.2002 1.70149L16.2502 7.72549L10.2002 13.7505"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="single--raffle--rule">
              <div class="left">
                <img src="{{ asset('frontend/images/raffle3.png') }}" alt="" />
              </div>
              <div class="right">
                <h3 class="main--text">§3 Raffle Period</h3>
                <p class="sub--text">
                  The raffle opens on [Start Date] and closes on [End Date].
                  Besides that, the raffle will take place until at least 15,000
                  tickets are sold.
                </p>
              </div>
            </div>
            <div class="single--raffle--rule">
              <div class="left">
                <img src="{{ asset('frontend/images/raffle4.png') }}" alt="" />
              </div>
              <div class="right">
                <h3 class="main--text">§4 Winner Selection</h3>
                <p class="sub--text">
                  The winner will be selected randomly in a public draw. The
                  drawing process will be supervised by an independent auditor
                  to ensure fairness.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- raffle rules content ends -->

      <!-- our commitment area starts -->
      <section
        data-aos="fade-up"
        data-aos-duration="600"
        class="our--commitment--area--wrapper section--bottom--gap"
      >
        <div class="container">
          <div class="our--commitment--area--content">
            <h3
              data-aos="fade-up"
              data-aos-duration="600"
              class="common--heading--title"
            >
              Our Commitment to Transparency, Security, and Fairness in the
              <span class="gold--text">Raffle Process</span>
            </h3>

            <p data-aos="fade-up" data-aos-duration="700" class="sub--text">
              At House Villa, we prioritize transparency, security, and fairness
              throughout the entire raffle process. We believe in providing our
              participants with a trustworthy and reliable experience, ensuring
              that every ticket purchased has an equal chance of winning the
              house.
            </p>

            <a href="#" class="btn--fill">
              <span>Join now</span>
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
      </section>
      <!-- our commitment area ends -->
@endsection