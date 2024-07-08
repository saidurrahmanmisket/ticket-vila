<!-- live statistics  -->
<div class="live--statistic--content">
    <div class="milestone--wrapper">
        <div class="single--one">
            <p><span>{{($data['totalTicketSold'] ?? 0) + 2000}}</span> {{ __('Tickets Sold') }}</p>
        </div>
        <div class="single--one">
            <p><span>{{ (($data['campaign']->limit ?? 0) - $data['totalTicketSold']) + 2000 }}</span> {{ __('to The Finish') }}</p>
        </div>
        <div class="single--one goal">
            <p>{{__('Goal')}} 🎉</p>
        </div>
        <div class="single--one bonus tickets">
            <p>
                <span>{{ (round((($data['campaign']->limit ?? 0) / 100) * 80)) + 2000 }}</span> {{__('Tickets')}}
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none">
                    <circle cx="5" cy="5.5" r="5" fill="url(#paint0_linear_13878_1385)" />
                    <defs>
                        <linearGradient id="paint0_linear_13878_1385" x1="0" y1="5.5" x2="10"
                            y2="5.5" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#E8880F" />
                            <stop offset="1" stop-color="#FFCF7E" />
                        </linearGradient>
                    </defs>
                </svg>
            </p>
        </div>
        <div class="single--one bonus">
            <p>
                <span>{{( $data['campaign']->limit ?? 0) + 2000 }}</span> {{__('Tickets')}}
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11"
                    fill="none">
                    <circle cx="5" cy="5.5" r="5" fill="url(#paint0_linear_13878_1385)" />
                    <defs>
                        <linearGradient id="paint0_linear_13878_1385" x1="0" y1="5.5" x2="10"
                            y2="5.5" gradientUnits="userSpaceOnUse">
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
        <div style="width: {{ $data['soldPercentage'] ?? 0 }}%" class="progress--bar"></div>
    </div>
</div>
