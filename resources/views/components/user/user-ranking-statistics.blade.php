@php
    use App\Models\Campaign;
    use App\Models\Ticket;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
    if (!empty($campaign)) {
        // all tickets
        $tickets = Ticket::with('user', 'order');

        //how many person buy tickets
        $totalUserPurchasing = $tickets
            ->where('campaign_id', $campaign->id)
            ->distinct('user_id')
            ->count('user_id');

        // logic for user rank
        $ticketCounts = DB::table('tickets')
            ->select('user_id', DB::raw('COUNT(*) as ticket_count'))
            ->where('campaign_id', $campaign->id)
            ->groupBy('user_id')
            ->orderBy('ticket_count', 'desc')
            ->get();
        $ticketCountsArray = $ticketCounts->toArray();
        $userCurrentRank = null;

        // Iterate through the array to find the current user's rank
    foreach ($ticketCountsArray as $index => $record) {
        if ($record->user_id == $user->id) {
            $userCurrentRank = $index + 1; // Rank is index + 1 (since ranks start from 1)
            break;
        }
    }

    // for user wininig chance
    $userTickets = $tickets
        ->where('campaign_id', $campaign->id)
        ->where('user_id', '=', $user->id)
        ->get();
    $totalTicketSold = $campaign->tickets_count ?? 0;
    $userTicketsCount = $userTickets->count() ?? 0;
    $userWiningChance = $totalTicketSold > 0 ? ($userTicketsCount / $totalTicketSold) * 100 : 0;
    $userWiningChance = number_format($userWiningChance);

    $data = [
        'totalUserPurchasing' => $totalUserPurchasing,
        'userCurrentRank' => $userCurrentRank,
        'userWiningChance' => $userWiningChance,
        'userTicketsCount' => $userTicketsCount,
    ];
} else {
    $data = [
        'totalUserPurchasing' => null,
        'userCurrentRank' => null,
        'userWiningChance' => null,
        'userTicketsCount' => null,
        ];
    }
@endphp

@if ($campaign && !empty($campaign))
    <div class="@if (isset($withTickets)) row @else col-md-9 @endif  mt_35 pr_17">
        <div class="cool--facts box--common @if (!isset($withTickets)) h-100 @endif position-relative">
            <h4 class="common--title">Some cool facts 😎</h4>
            <div class="row">
                <div class="@if (isset($withTickets)) col-md-3 @else col-md-4 @endif mt_20 pr_10">
                    <div class="facts--card">
                        <div class="details--card">
                            <!-- icon  -->
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28"
                                    fill="none">
                                    <path
                                        d="M20.3385 25.666H8.67188C8.19354 25.666 7.79688 25.2693 7.79688 24.791C7.79688 24.3127 8.19354 23.916 8.67188 23.916H20.3385C20.8169 23.916 21.2135 24.3127 21.2135 24.791C21.2135 25.2693 20.8169 25.666 20.3385 25.666Z"
                                        fill="url(#paint0_linear_14118_3078)" />
                                    <path
                                        d="M24.2429 6.43988L19.5762 9.77655C18.9579 10.2199 18.0712 9.95155 17.8029 9.23988L15.5979 3.35988C15.2246 2.34488 13.7896 2.34488 13.4162 3.35988L11.1996 9.22822C10.9312 9.95155 10.0562 10.2199 9.4379 9.76488L4.77123 6.42822C3.8379 5.77488 2.60123 6.69655 2.98623 7.78155L7.83957 21.3732C8.0029 21.8399 8.44623 22.1432 8.93623 22.1432H20.0546C20.5446 22.1432 20.9879 21.8282 21.1512 21.3732L26.0046 7.78155C26.4012 6.69655 25.1646 5.77488 24.2429 6.43988ZM17.4179 17.2082H11.5846C11.1062 17.2082 10.7096 16.8116 10.7096 16.3332C10.7096 15.8549 11.1062 15.4582 11.5846 15.4582H17.4179C17.8962 15.4582 18.2929 15.8549 18.2929 16.3332C18.2929 16.8116 17.8962 17.2082 17.4179 17.2082Z"
                                        fill="url(#paint1_linear_14118_3078)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_14118_3078" x1="7.79688" y1="24.791"
                                            x2="21.2135" y2="24.791" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_14118_3078" x1="2.91406" y1="12.3709"
                                            x2="26.0807" y2="12.3709" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <p>Winning Chance</p>
                                <h3>{{ $data['userWiningChance'] ?? 0 }} %</h3>
                            </div>
                        </div>
                        <p class="mt_40">Based on the amount of your current tickets.</p>
                    </div>
                </div>
                <div class="@if (isset($withTickets)) col-md-3 @else col-md-4 @endif mt_20 pr_10 pl_10">
                    <div class="facts--card">
                        <div class="details--card">
                            <!-- icon  -->
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28"
                                    viewBox="0 0 29 28" fill="none">
                                    <path
                                        d="M8.27646 16.334H5.16146C3.87813 16.334 2.82812 17.384 2.82812 18.6673V24.5007C2.82812 25.1423 3.35313 25.6673 3.99479 25.6673H8.27646C8.91813 25.6673 9.44313 25.1423 9.44313 24.5007V17.5007C9.44313 16.859 8.91813 16.334 8.27646 16.334Z"
                                        fill="url(#paint0_linear_14118_3070)" />
                                    <path
                                        d="M16.0499 11.666H12.9349C11.6516 11.666 10.6016 12.716 10.6016 13.9993V24.4993C10.6016 25.141 11.1266 25.666 11.7682 25.666H17.2166C17.8582 25.666 18.3832 25.141 18.3832 24.4993V13.9993C18.3832 12.716 17.3449 11.666 16.0499 11.666Z"
                                        fill="url(#paint1_linear_14118_3070)" />
                                    <path
                                        d="M23.8285 19.834H20.7135C20.0719 19.834 19.5469 20.359 19.5469 21.0007V24.5007C19.5469 25.1423 20.0719 25.6673 20.7135 25.6673H24.9952C25.6369 25.6673 26.1619 25.1423 26.1619 24.5007V22.1673C26.1619 20.884 25.1119 19.834 23.8285 19.834Z"
                                        fill="url(#paint2_linear_14118_3070)" />
                                    <path
                                        d="M18.011 5.65823C18.3727 5.29656 18.5127 4.8649 18.396 4.49156C18.2794 4.11823 17.9177 3.8499 17.4044 3.76823L16.2844 3.58156C16.2377 3.58156 16.1327 3.4999 16.1094 3.45323L15.491 2.21656C15.0244 1.27156 13.9627 1.27156 13.496 2.21656L12.8777 3.45323C12.866 3.4999 12.761 3.58156 12.7144 3.58156L11.5944 3.76823C11.081 3.8499 10.731 4.11823 10.6027 4.49156C10.486 4.8649 10.626 5.29656 10.9877 5.65823L11.851 6.53323C11.8977 6.56823 11.9327 6.70823 11.921 6.7549L11.676 7.82823C11.4894 8.63323 11.7927 8.9949 11.991 9.1349C12.1894 9.2749 12.621 9.46156 13.3327 9.04156L14.3827 8.42323C14.4294 8.38823 14.581 8.38823 14.6277 8.42323L15.666 9.04156C15.9927 9.2399 16.261 9.29823 16.471 9.29823C16.716 9.29823 16.891 9.2049 16.996 9.1349C17.1944 8.9949 17.4977 8.63323 17.311 7.82823L17.066 6.7549C17.0544 6.69656 17.0894 6.56823 17.136 6.53323L18.011 5.65823Z"
                                        fill="url(#paint3_linear_14118_3070)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_14118_3070" x1="2.82812" y1="21.0007"
                                            x2="9.44313" y2="21.0007" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_14118_3070" x1="10.6016" y1="18.666"
                                            x2="18.3832" y2="18.666" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_14118_3070" x1="19.5469" y1="22.7507"
                                            x2="26.1619" y2="22.7507" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint3_linear_14118_3070" x1="10.5625" y1="5.40373"
                                            x2="18.4362" y2="5.40373" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <p>your Current Rank</p>
                                <h3>#{{ $data['userCurrentRank'] }}</h3>
                            </div>
                        </div>
                        <p class="mt_40">Your amount of tickets compared to other Users.</p>
                    </div>
                </div>
                <div class="@if (isset($withTickets)) col-md-3 @else col-md-4 @endif mt_20 pl_10">
                    <div class="facts--card">
                        <div class="details--card">
                            <!-- icon  -->
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="20"
                                    viewBox="0 0 27 20" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18.3529 5.60434C18.3529 8.34564 16.1675 10.5437 13.4421 10.5437C10.7166 10.5437 8.53125 8.34564 8.53125 5.60434C8.53125 2.862 10.7166 0.666016 13.4421 0.666016C16.1675 0.666016 18.3529 2.862 18.3529 5.60434ZM13.4445 19.3328C9.44149 19.3328 6.02344 18.6982 6.02344 16.1597C6.02344 13.6201 9.41955 12.9624 13.4445 12.9624C17.4476 12.9624 20.8656 13.597 20.8656 16.1366C20.8656 18.6751 17.4695 19.3328 13.4445 19.3328ZM20.4566 5.69363C20.4566 7.09107 20.0398 8.3929 19.3085 9.47513C19.2333 9.5865 19.3002 9.73675 19.4328 9.75987C19.6156 9.79139 19.8047 9.80925 19.9969 9.81451C21.9138 9.86494 23.6344 8.62405 24.1097 6.75589C24.8138 3.98097 22.7464 1.48975 20.1139 1.48975C19.8277 1.48975 19.554 1.52022 19.2876 1.57485C19.2511 1.58326 19.2124 1.60007 19.1915 1.63264C19.1665 1.67257 19.1853 1.72616 19.2103 1.76083C20.0011 2.87563 20.4566 4.23525 20.4566 5.69363ZM23.6345 11.7642C24.9225 12.0175 25.7697 12.5344 26.1207 13.2857C26.4174 13.9024 26.4174 14.618 26.1207 15.2337C25.5838 16.3989 23.8528 16.773 23.1801 16.8696C23.0412 16.8906 22.9294 16.7698 22.944 16.6301C23.2877 13.4012 20.5539 11.8704 19.8467 11.5184C19.8164 11.5026 19.8101 11.4784 19.8132 11.4637C19.8153 11.4532 19.8279 11.4364 19.8508 11.4333C21.3812 11.4049 23.0265 11.615 23.6345 11.7642ZM7.01779 9.81402C7.21 9.80876 7.39803 9.79195 7.58189 9.75938C7.71456 9.73627 7.78142 9.58601 7.7062 9.47464C6.97496 8.39241 6.55815 7.09058 6.55815 5.69314C6.55815 4.23476 7.01361 2.87514 7.8044 1.76034C7.82947 1.72567 7.84723 1.67208 7.8232 1.63215C7.80231 1.60063 7.76261 1.58277 7.72709 1.57437C7.45967 1.51973 7.18597 1.48926 6.89974 1.48926C4.26726 1.48926 2.19992 3.98049 2.90505 6.75541C3.38036 8.62357 5.10088 9.86445 7.01779 9.81402ZM7.20164 11.4629C7.20477 11.4786 7.1985 11.5018 7.16925 11.5186C6.46099 11.8706 3.72718 13.4014 4.07086 16.6292C4.08549 16.77 3.97475 16.8898 3.83582 16.8698C3.16307 16.7732 1.43211 16.3991 0.895166 15.2339C0.597445 14.6171 0.597445 13.9026 0.895166 13.2859C1.24616 12.5346 2.09232 12.0177 3.38036 11.7634C3.98938 11.6152 5.63364 11.4051 7.16507 11.4335C7.18806 11.4366 7.19955 11.4534 7.20164 11.4629Z"
                                        fill="url(#paint0_linear_14118_3084)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_14118_3084" x1="0.671875" y1="9.99943"
                                            x2="26.3433" y2="9.99943" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <p>Total Users</p>
                                <h3>{{ $data['totalUserPurchasing'] - 1 ?? 0 }} + You</h3>
                            </div>
                        </div>
                        <p class="mt_40">Based on the amount of your current tickets.</p>
                    </div>
                </div>
                @if (isset($withTickets))
                    <div class="col-md-3 mt_20 pl_10">
                        <div class="facts--card">
                            <div class="details--card">
                                <!-- icon  -->
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="29"
                                        viewBox="0 0 28 29" fill="none">
                                        <g clip-path="url(#clip0_15302_3569)">
                                            <path
                                                d="M17.6626 10.669C26.7722 10.669 26.0992 10.6671 26.2395 10.6726C26.1547 10.3477 25.9848 10.0513 25.7472 9.81411L23.2496 7.31656C22.7099 6.77682 21.8813 6.61991 21.1876 6.92632C20.8151 7.09091 20.3712 7.00785 20.0831 6.71972C19.795 6.43165 19.7119 5.98777 19.8764 5.61526C20.1828 4.92168 20.026 4.09299 19.4862 3.5532L16.9887 1.05565C16.2484 0.315462 15.044 0.315407 14.3037 1.05565L11.179 4.18034L17.6626 10.669ZM10.0143 5.34503L4.69033 10.669H15.3333C15.314 10.6497 14.9067 10.242 10.0143 5.34503ZM26.8179 19.4807C27.5249 19.207 28 18.5101 28 17.7467V14.2147C28 13.1678 27.1483 12.3161 26.1014 12.3161H22.2353V28.4996H26.1014C27.1483 28.4996 28 27.6479 28 26.601V23.069C28 22.3057 27.525 21.6088 26.8179 21.335C26.4381 21.1878 26.1829 20.8153 26.1829 20.4078C26.1829 20.0004 26.4381 19.6278 26.8179 19.4807ZM0 14.2147V17.7467C0 18.5101 0.475067 19.207 1.18209 19.4807C1.56191 19.6278 1.81704 20.0004 1.81704 20.4078C1.81704 20.8153 1.56185 21.1878 1.18204 21.335C0.475012 21.6088 0 22.3056 0 23.069V26.601C0 27.6479 0.851749 28.4996 1.89862 28.4996H20.5882V12.3161H1.89862C0.851749 12.3161 0 13.1678 0 14.2147ZM5.76471 16.1467H18.1176V17.7937H5.76471V16.1467ZM5.76471 19.4408H18.1176V21.0878H5.76471V19.4408ZM5.76471 22.7349H18.1176V24.382H5.76471V22.7349Z"
                                                fill="url(#paint0_linear_15302_3569)" />
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_15302_3569" x1="0"
                                                y1="14.5" x2="28" y2="14.5"
                                                gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <clipPath id="clip0_15302_3569">
                                                <rect width="28" height="28" fill="white"
                                                    transform="translate(0 0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <p>{{ __('Your Ticket') }}s</p>
                                    <h3>{{ $data['userTicketsCount'] ?? 0 }}</h3>
                                </div>
                            </div>
                            <p class="mt_40">Based on the amount of your current tickets.</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="blur--box">
                <p>You can't see this section, buy a ticket to get full data access</p>
                <a href="#" class="user--common--btn">Buy a E-Book</a>
            </div>
        </div>
    </div>
@endif
