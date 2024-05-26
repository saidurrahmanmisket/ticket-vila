@extends('frontend.app')

@section('title', 'Home')

@section('content')
      <!-- banner area starts -->
      <section
        class="imprint--banner--area--wrapper section--bottom--gap banner--top--gap"
      >
        <div class="container">
          <div class="imprint--banner--area--content">
            <div class="left">
              <h3
                data-aos="fade-down"
                data-aos-duration="600"
                class="banner--main--text"
              >
                Imprint
              </h3>
              <p
                data-aos="fade-up"
                data-aos-duration="800"
                class="banner--para"
              >
                Legal information regarding TicketVilla
              </p>
            </div>
            <div data-aos="fade-left" data-aos-duration="600" class="right">
              <img src="{{ asset('frontend/images/imprint-banner-bg.png') }}" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- banner area ends -->

      <!-- main content area starts -->
      <section
        class="imprint--main--content--area--wrapper section--bottom--gap"
      >
        <div class="container">
          <div class="imprint--main--content">
            <h3
              data-aos="fade-up"
              data-aos-duration="500"
              class="common--heading--title"
            >
              Imprint
            </h3>
            <div
              data-aos="fade-up"
              data-aos-duration="700"
              class="single--text--info--section"
            >
              <div>
                <p class="bold--title">Company Name:</p>
                <p class="gray--text">TicketVilla</p>
              </div>
              <div>
                <p class="bold--title">Legal Form:</p>
                <p class="gray--text">
                  Lorem ipsum dolor sit amet consectetur.
                </p>
              </div>
              <div>
                <p class="bold--title">Registered Office:</p>
                <p class="gray--text">HouseVilla, Musterstreet 434543 Muster</p>
              </div>
              <div>
                <p class="bold--title">Commercial Register:</p>
                <p class="gray--text">Lorem ipsum</p>
              </div>
              <div>
                <p class="bold--title">VAT ID:</p>
                <p class="gray--text">ATU - 2201 0027 55925</p>
              </div>
              <div>
                <p class="bold--title">Managing Directors:</p>
                <p class="gray--text">Lorem ipsum</p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="700"
              class="single--text--info--section"
            >
              <p class="bold--title">Contact Information</p>

              <div class="contact--holder">
                <div class="holder">
                  <div class="icon">
                    <img src="{{ asset('frontend/images/contact-info-icon3.svg') }}" alt="" />
                  </div>
                  <p>
                    HouseVilla, Musterstreet <br />
                    434543 Muster
                  </p>
                </div>
                <div class="holder">
                  <div class="icon">
                    <img src="{{ asset('frontend/images/contact-info-icon1.svg') }}" alt="" />
                  </div>
                  <p>info@housevilla.com</p>
                </div>
                <div class="holder">
                  <div class="icon">
                    <img src="{{ asset('frontend/images/contact-info-icon4.svg') }}" alt="" />
                  </div>
                  <p>+4 57494- 4985213</p>
                </div>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="700"
              class="single--text--info--section"
            >
              <div>
                <p class="bold--title">
                  Responsible for Content According to § 25 Mediengesetz:
                </p>
                <p class="gray--text">
                  Lorem ipsum dolor sit amet consectetur.
                </p>
              </div>
              <div>
                <p class="bold--title">Regulatory Authority:</p>
                <p class="gray--text">Lorem ipsum</p>
              </div>
              <div>
                <p class="bold--title">Chamber Affiliation:</p>
                <p class="gray--text">HouseVilla, Musterstreet 434543 Muster</p>
              </div>
              <div>
                <p class="bold--title">Applicable Legislation:</p>
                <p class="gray--text">Lorem ipsum</p>
              </div>
              <div>
                <p class="bold--title">Purpose of the Business:</p>
                <p class="gray--text">
                  Lorem ipsum dolor sit amet consectetur.
                </p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="700"
              class="single--text--info--section"
            >
              <div>
                <p class="bold--title">Disclaimer:</p>
                <p class="gray--text">
                  The content of our pages has been created with the utmost
                  care. However, we cannot guarantee the accuracy, completeness,
                  and timeliness of the content. As a service provider, we are
                  responsible for our own content on these pages under general
                  laws. We are not obligated to monitor transmitted or stored
                  third-party information or to investigate circumstances that
                  indicate illegal activity. Obligations to remove or block the
                  use of information under general laws remain unaffected.
                  However, liability in this regard is only possible from the
                  time of knowledge of a specific infringement. Upon
                  notification of appropriate violations, we will remove this
                  content immediately.
                </p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="700"
              class="single--text--info--section"
            >
              <div>
                <p class="bold--title">Copyright Notice:</p>
                <p class="gray--text">
                  All content and works on these web pages created by the site
                  operators are subject to Austrian copyright law. Duplication,
                  processing, distribution, or any form of commercialization of
                  such material beyond the scope of the copyright law shall
                  require the prior written consent of its respective author or
                  creator.
                </p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="700"
              class="single--text--info--section"
            >
              <div>
                <p class="bold--title">External Links:</p>
                <p class="gray--text">
                  Our offer includes links to external third-party websites,
                  over whose content we have no control. Therefore, we cannot
                  assume any liability for this external content. The respective
                  provider or operator of the pages is always responsible for
                  the content of the linked pages. The linked pages were checked
                  for possible legal violations at the time of linking. Illegal
                  content was not recognizable at the time of linking. [Note:[
                  This is a generic template for an imprint for a company based
                  in Austria named HouseVilla. Please ensure that all
                  placeholders are filled out with the specific details of your
                  company, and consider consulting with a legal advisor to
                  ensure compliance with Austrian law and the specific
                  requirements for your business.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- main content area ends -->
  @endsection