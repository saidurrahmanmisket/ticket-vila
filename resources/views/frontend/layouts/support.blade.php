@extends('frontend.app')

@section('title', 'Ticket Villa')

@section('content')
      <!-- banner area starts -->
      <section
        class="imprint--banner--area--wrapper section--bottom--gap banner--top--gap privacy"
      >
        <div class="container">
          <div class="imprint--banner--area--content">
            <div class="left">
              <h3
                data-aos="fade-down"
                data-aos-duration="600"
                class="banner--main--text"
              >
                Get Support
              </h3>
              <p
                data-aos="fade-up"
                data-aos-duration="800"
                class="banner--para"
              >
                Here to guide you every step of the way.
              </p>
            </div>
            <div data-aos="fade-left" data-aos-duration="600" class="right">
              <img src="{{ asset('frontend/images/support-banner.png') }}" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- banner area ends -->

      <!-- small steps area starts -->
      <section class="small--steps--area--wrapper section--bottom--gap">
        <div class="container">
          <div class="small--steps--area--content get--support">
            <div
              data-aos="fade-up"
              data-aos-duration="500"
              class="single--step"
            >
              <div class="icon">
                <img src="{{ asset('frontend/images/small-step1.svg') }}" alt="" />
              </div>

              <div class="text">
                <p class="main">Account</p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="800"
              class="single--step"
            >
              <div class="icon">
                <img src="{{ asset('frontend/images/small-step2.svg') }}" alt="" />
              </div>

              <div class="text">
                <p class="main">Security</p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="1100"
              class="single--step"
            >
              <div class="icon">
                <img src="{{ asset('frontend/images/small-step3.svg') }}" alt="" />
              </div>

              <div class="text">
                <p class="main">House</p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="1400"
              class="single--step"
            >
              <div class="icon">
                <img src="{{ asset('frontend/images/small-step4.svg') }}" alt="" />
              </div>

              <div class="text">
                <p class="main">Legal</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- small steps area ends -->

      <!-- faq area starts -->
      <section
        data-aos="fade-up"
        data-aos-duration="800"
        class="faq--area--wrapper section--bottom--gap"
      >
        <div class="container">
          <div class="text--area">
            <h3
              data-aos="fade-up"
              data-aos-duration="600"
              class="common--heading--title"
            >
              Frequently Asked Questions
            </h3>
            <p data-aos="fade-up" data-aos-duration="800" class="subtext">
              FAQs and answers on a particular topic you product on Residence
            </p>
          </div>
          <div class="faq--area--content">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    How does the house raffle work?
                  </button>
                </h2>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Several factors determine how long the process of buying or
                    selling real estate takes. The most important of these
                    factors is the season in which you begin to search for a
                    property or offer it for sale.The real estate market, like
                    other investments, is based on the principle of supply and
                    demand. Real estate is on-demand in certain seasons of the
                    year.

                    <br />
                    <br />

                    It is not possible to ascertain a specific time as it can
                    vary according to the circumstances of each season. You may
                    find the right home for you within a week, or the search
                    process can last for months.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    How is the winner selected and notified?
                  </button>
                </h2>
                <div
                  id="collapseTwo"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Several factors determine how long the process of buying or
                    selling real estate takes. The most important of these
                    factors is the season in which you begin to search for a
                    property or offer it for sale.The real estate market, like
                    other investments, is based on the principle of supply and
                    demand. Real estate is on-demand in certain seasons of the
                    year.

                    <br />
                    <br />

                    It is not possible to ascertain a specific time as it can
                    vary according to the circumstances of each season. You may
                    find the right home for you within a week, or the search
                    process can last for months.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    Can I participate in the raffle from any country?
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Several factors determine how long the process of buying or
                    selling real estate takes. The most important of these
                    factors is the season in which you begin to search for a
                    property or offer it for sale.The real estate market, like
                    other investments, is based on the principle of supply and
                    demand. Real estate is on-demand in certain seasons of the
                    year.

                    <br />
                    <br />

                    It is not possible to ascertain a specific time as it can
                    vary according to the circumstances of each season. You may
                    find the right home for you within a week, or the search
                    process can last for months.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFour"
                    aria-expanded="false"
                    aria-controls="collapseFour"
                  >
                    Is there a limit to how many tickets I can purchase?
                  </button>
                </h2>
                <div
                  id="collapseFour"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Several factors determine how long the process of buying or
                    selling real estate takes. The most important of these
                    factors is the season in which you begin to search for a
                    property or offer it for sale.The real estate market, like
                    other investments, is based on the principle of supply and
                    demand. Real estate is on-demand in certain seasons of the
                    year.

                    <br />
                    <br />

                    It is not possible to ascertain a specific time as it can
                    vary according to the circumstances of each season. You may
                    find the right home for you within a week, or the search
                    process can last for months.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFive"
                    aria-expanded="false"
                    aria-controls="collapseFive"
                  >
                    What happens if the minimum number of tickets isn't sold?
                  </button>
                </h2>
                <div
                  id="collapseFive"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Several factors determine how long the process of buying or
                    selling real estate takes. The most important of these
                    factors is the season in which you begin to search for a
                    property or offer it for sale.The real estate market, like
                    other investments, is based on the principle of supply and
                    demand. Real estate is on-demand in certain seasons of the
                    year.

                    <br />
                    <br />

                    It is not possible to ascertain a specific time as it can
                    vary according to the circumstances of each season. You may
                    find the right home for you within a week, or the search
                    process can last for months.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSix"
                    aria-expanded="false"
                    aria-controls="collapseSix"
                  >
                    Are there any additional costs for the house winner, such as
                    taxes or fees?
                  </button>
                </h2>
                <div
                  id="collapseSix"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Several factors determine how long the process of buying or
                    selling real estate takes. The most important of these
                    factors is the season in which you begin to search for a
                    property or offer it for sale.The real estate market, like
                    other investments, is based on the principle of supply and
                    demand. Real estate is on-demand in certain seasons of the
                    year.

                    <br />
                    <br />

                    It is not possible to ascertain a specific time as it can
                    vary according to the circumstances of each season. You may
                    find the right home for you within a week, or the search
                    process can last for months.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSeven"
                    aria-expanded="false"
                    aria-controls="collapseSeven"
                  >
                    How is the property transferred to the winner?
                  </button>
                </h2>
                <div
                  id="collapseSeven"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Several factors determine how long the process of buying or
                    selling real estate takes. The most important of these
                    factors is the season in which you begin to search for a
                    property or offer it for sale.The real estate market, like
                    other investments, is based on the principle of supply and
                    demand. Real estate is on-demand in certain seasons of the
                    year.

                    <br />
                    <br />

                    It is not possible to ascertain a specific time as it can
                    vary according to the circumstances of each season. You may
                    find the right home for you within a week, or the search
                    process can last for months.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- faq area ends -->

      <!-- special information starts -->
      <section class="special--information--area--wrapper section--bottom--gap">
        <div class="container">
          <div class="special--information--content">
            <div data-aos="fade-up" data-aos-duration="600" class="text--area">
              <p>Can’t Find Your Answers?</p>
            </div>

            <div data-aos="fade-up" data-aos-duration="700" class="btn--area">
              <a href="#" class="btn--fill">
                <span>Live Chat</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="19"
                  height="15"
                  viewBox="0 0 19 15"
                  fill="none"
                >
                  <path
                    d="M17.3959 7.70296L1.14587 7.70296"
                    stroke="#fff"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M10.8419 1.17641L17.3961 7.70241L10.8419 14.2295"
                    stroke="#fff"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>

              <a href="#" class="btn--normal blank border">
                <span>Contact Us</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="17"
                  height="15"
                  viewBox="0 0 17 15"
                  fill="none"
                >
                  <path
                    d="M15.75 7.72607L0.75 7.72607"
                    stroke="#010C0F"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
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
      </section>
      <!-- special information ends -->
@endsection