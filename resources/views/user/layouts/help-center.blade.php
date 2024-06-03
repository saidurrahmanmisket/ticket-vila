@extends('user.app')

@section('title', 'Dashboard')

@section('header_title')
Help Center
@endsection;

@section('content')

<!-- start app content area  -->
<section class="app--content--main user--portal statistics">
    <div class="help--area">
      <div class="row">
        <div class="col-md-8">
          <div class="faq--box h-100">
            <h4 class="common--title">Frequently Asked Questions</h4>
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
                      The house rattle operates by selling tickets to
                      participants each ticket offering a chance to win a
                      house. Here's a simplified process:

                      <br />
                      <ul class="mt_30">
                        <li>
                          1. 'Ticket Purchase: Buy your ticket’s from our
                          website.
                        </li>
                        <li>
                          2. Draw: Once sales close. a winner is randomly
                          selected.
                        </li>
                        <li>
                          3. Winner Notification: The winner gets notified
                          and receives the house.
                        </li>
                      </ul>
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
                      Is there a limit to how many tickets I can purchase?
                    </button>
                  </h2>
                  <div
                    id="collapseTwo"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Several factors determine how long the process of
                      buying or selling real estate takes. The most
                      important of these factors is the season in which you
                      begin to search for a property or offer it for
                      sale.The real estate market, like other investments,
                      is based on the principle of supply and demand. Real
                      estate is on-demand in certain seasons of the year.

                      <br />
                      <br />

                      It is not possible to ascertain a specific time as it
                      can vary according to the circumstances of each
                      season. You may find the right home for you within a
                      week, or the search process can last for months.
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
                      What happens if the minimum number of tickets isn't
                      sold?
                    </button>
                  </h2>
                  <div
                    id="collapseThree"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Several factors determine how long the process of
                      buying or selling real estate takes. The most
                      important of these factors is the season in which you
                      begin to search for a property or offer it for
                      sale.The real estate market, like other investments,
                      is based on the principle of supply and demand. Real
                      estate is on-demand in certain seasons of the year.

                      <br />
                      <br />

                      It is not possible to ascertain a specific time as it
                      can vary according to the circumstances of each
                      season. You may find the right home for you within a
                      week, or the search process can last for months.
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
                      Are there any additional costs for the house winner,
                      such as taxes or fees?
                    </button>
                  </h2>
                  <div
                    id="collapseFour"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Several factors determine how long the process of
                      buying or selling real estate takes. The most
                      important of these factors is the season in which you
                      begin to search for a property or offer it for
                      sale.The real estate market, like other investments,
                      is based on the principle of supply and demand. Real
                      estate is on-demand in certain seasons of the year.

                      <br />
                      <br />

                      It is not possible to ascertain a specific time as it
                      can vary according to the circumstances of each
                      season. You may find the right home for you within a
                      week, or the search process can last for months.
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
                      How is the property transferred to the winner?
                    </button>
                  </h2>
                  <div
                    id="collapseFive"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Several factors determine how long the process of
                      buying or selling real estate takes. The most
                      important of these factors is the season in which you
                      begin to search for a property or offer it for
                      sale.The real estate market, like other investments,
                      is based on the principle of supply and demand. Real
                      estate is on-demand in certain seasons of the year.

                      <br />
                      <br />

                      It is not possible to ascertain a specific time as it
                      can vary according to the circumstances of each
                      season. You may find the right home for you within a
                      week, or the search process can last for months.
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
                      Several factors determine how long the process of
                      buying or selling real estate takes. The most
                      important of these factors is the season in which you
                      begin to search for a property or offer it for
                      sale.The real estate market, like other investments,
                      is based on the principle of supply and demand. Real
                      estate is on-demand in certain seasons of the year.

                      <br />
                      <br />

                      It is not possible to ascertain a specific time as it
                      can vary according to the circumstances of each
                      season. You may find the right home for you within a
                      week, or the search process can last for months.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseeight"
                      aria-expanded="false"
                      aria-controls="collapseeight"
                    >
                      How is the property transferred to the winner?
                    </button>
                  </h2>
                  <div
                    id="collapseeight"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body">
                      Several factors determine how long the process of
                      buying or selling real estate takes. The most
                      important of these factors is the season in which you
                      begin to search for a property or offer it for
                      sale.The real estate market, like other investments,
                      is based on the principle of supply and demand. Real
                      estate is on-demand in certain seasons of the year.

                      <br />
                      <br />

                      It is not possible to ascertain a specific time as it
                      can vary according to the circumstances of each
                      season. You may find the right home for you within a
                      week, or the search process can last for months.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <!-- chat--box  -->
          <div class="chat--box">
            <h3>
              We are here to help, please do not hesitate to contact us!
            </h3>
            <p>24/7 Chat support with the help of all.</p>
            <a href="#" class="user--common--btn">Start Chat</a>
          </div>
          <!-- affiliate--box  -->
          <div class="affiliate--box text-center mt_35">
            <h3>Join Affiliate Program</h3>
            <p>Become an affiliates partner and earn extra money.</p>
            <a href="#" class="user--common--btn">Join Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end app content area  -->

@endsection