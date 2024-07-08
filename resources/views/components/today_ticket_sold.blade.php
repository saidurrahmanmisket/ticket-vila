<div class="tickets--box w-100 position-relative">
    <img src="{{ asset('user/images/tickets.png') }}" alt="" />
    <h3>{{ !empty($ticketsSoldToday) ? $ticketsSoldToday : '0'  }} {{ __("Tickets") }}</h3>
    <p>Sold Today</p>
    <p class="last-week">
        @if(!empty($todayProgress) && $todayProgress < 0)
            <span class="text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M18.0699 14.4301L11.9999 20.5001L5.92993 14.4301" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 3.5V20.33" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14"
                 fill="none">
                <path d="M11.0426 5.58282L7.50177 2.04199L3.96094 5.58282" stroke="#12AF6C"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                <path d="M7.5 11.9581V2.14062" stroke="#12AF6C" stroke-width="1.5" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        @endif
        <strong class="{{ !empty($todayProgress) && $todayProgress < 0 ? 'text-danger' : '' }}">{{ !empty($todayProgress) ? $todayProgress : '0'  }}% </strong> Since last day
    </p>
    <div class="blur--box">
        <p>
            You can't see this section, buy a eBook to get full data
            access
        </p>
    </div>
</div>
