<!-- start sidebar area  -->
<div class="sidebar">
    <!-- logo -->
    <div class="sidebar-logo-container">
        <a href="/" class="sidebar--logo">
            <img src="{{ isset($systemSetting->logo) ? asset($systemSetting->logo) : asset('/user/images/logo.svg') }}"
                alt="" />
        </a>
    </div>
    <!-- mainmenu  -->
    <div class="main--menu">
        <h4>MAINMENU</h4>
        <ul class="menu">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="dashboard {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M18.6714 2.5H16.7714C14.5914 2.5 13.4414 3.65 13.4414 5.83V7.73C13.4414 9.91 14.5914 11.06 16.7714 11.06H18.6714C20.8514 11.06 22.0014 9.91 22.0014 7.73V5.83C22.0014 3.65 20.8514 2.5 18.6714 2.5Z"
                            fill="white" />
                        <path
                            d="M7.24 13.9297H5.34C3.15 13.9297 2 15.0797 2 17.2597V19.1597C2 21.3497 3.15 22.4997 5.33 22.4997H7.23C9.41 22.4997 10.56 21.3497 10.56 19.1697V17.2697C10.57 15.0797 9.42 13.9297 7.24 13.9297Z"
                            fill="white" />
                        <path
                            d="M6.29 11.08C8.6593 11.08 10.58 9.1593 10.58 6.79C10.58 4.4207 8.6593 2.5 6.29 2.5C3.9207 2.5 2 4.4207 2 6.79C2 9.1593 3.9207 11.08 6.29 11.08Z"
                            fill="white" />
                        <path
                            d="M17.7119 22.4999C20.0812 22.4999 22.0019 20.5792 22.0019 18.2099C22.0019 15.8406 20.0812 13.9199 17.7119 13.9199C15.3426 13.9199 13.4219 15.8406 13.4219 18.2099C13.4219 20.5792 15.3426 22.4999 17.7119 22.4999Z"
                            fill="white" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ticket.index') }}"
                    class="tickets {{ Route::is('admin.ticket.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M20 7.54V17.46C20 18.98 19.86 20.06 19.5 20.83C19.5 20.84 19.49 20.86 19.48 20.87C19.26 21.15 18.97 21.29 18.63 21.29C18.1 21.29 17.46 20.94 16.77 20.2C15.95 19.32 14.69 19.39 13.97 20.35L12.96 21.69C12.56 22.23 12.03 22.5 11.5 22.5C10.97 22.5 10.44 22.23 10.04 21.69L9.02002 20.34C8.31002 19.39 7.05999 19.32 6.23999 20.19L6.22998 20.2C5.09998 21.41 4.10002 21.59 3.52002 20.87C3.51002 20.86 3.5 20.84 3.5 20.83C3.14 20.06 3 18.98 3 17.46V7.54C3 6.02 3.14 4.94 3.5 4.17C3.5 4.16 3.50002 4.15 3.52002 4.14C4.09002 3.41 5.09998 3.59 6.22998 4.8L6.23999 4.81C7.05999 5.68 8.31002 5.61 9.02002 4.66L10.04 3.31C10.44 2.77 10.97 2.5 11.5 2.5C12.03 2.5 12.56 2.77 12.96 3.31L13.97 4.65C14.69 5.61 15.95 5.68 16.77 4.8C17.46 4.06 18.1 3.71 18.63 3.71C18.97 3.71 19.26 3.86 19.48 4.14C19.5 4.15 19.5 4.16 19.5 4.17C19.86 4.94 20 6.02 20 7.54Z"
                            stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 10.75H16" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M8 14.25H14" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Tickets
                </a>
            </li>
            <li>
                <a href="{{ route('admin.campaign.index') }}"
                    class="campaign {{ Route::is('admin.campaign.*') ? 'active' : '' }}">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z"
                            clip-rule="evenodd" />
                    </svg>

                    Campaign
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gift.index') }}" class="gift {{ Route::is('admin.gift.*') ? 'active' : '' }}">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 21v-9m3-4H7.5a2.5 2.5 0 1 1 0-5c1.5 0 2.875 1.25 3.875 2.5M14 21v-9m-9 0h14v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8ZM4 8h16a1 1 0 0 1 1 1v3H3V9a1 1 0 0 1 1-1Zm12.155-5c-3 0-5.5 5-5.5 5h5.5a2.5 2.5 0 0 0 0-5Z" />
                    </svg>
                    Gift
                </a>
            </li><li>
                <a href="{{ route('admin.key-feature.index') }}" class="gift {{ Route::is('admin.key-feature.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12.92 2.25997L19.43 5.76997C20.19 6.17997 20.19 7.34997 19.43 7.75997L12.92 11.27C12.34 11.58 11.66 11.58 11.08 11.27L4.57 7.75997C3.81 7.34997 3.81 6.17997 4.57 5.76997L11.08 2.25997C11.66 1.94997 12.34 1.94997 12.92 2.25997Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.61 10.13L9.66 13.16C10.41 13.54 10.89 14.31 10.89 15.15V20.8701C10.89 21.7001 10.02 22.2301 9.28 21.8601L3.23 18.83C2.48 18.45 2 17.68 2 16.84V11.12C2 10.29 2.87 9.76005 3.61 10.13Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.39 10.13L14.34 13.16C13.59 13.54 13.11 14.31 13.11 15.15V20.8701C13.11 21.7001 13.98 22.2301 14.72 21.8601L20.77 18.83C21.52 18.45 22 17.68 22 16.84V11.12C22 10.29 21.13 9.76005 20.39 10.13Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Gift Key Feature
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}" class="user {{ Route::is('admin.user.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M12.1586 11.37C12.0586 11.36 11.9386 11.36 11.8286 11.37C9.44859 11.29 7.55859 9.34 7.55859 6.94C7.55859 4.49 9.53859 2.5 11.9986 2.5C14.4486 2.5 16.4386 4.49 16.4386 6.94C16.4286 9.34 14.5386 11.29 12.1586 11.37Z"
                            stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M7.15875 15.06C4.73875 16.68 4.73875 19.32 7.15875 20.93C9.90875 22.77 14.4188 22.77 17.1688 20.93C19.5888 19.31 19.5888 16.67 17.1688 15.06C14.4288 13.23 9.91875 13.23 7.15875 15.06Z"
                            stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.statistics.index') }}"
                    class="statistics {{ Route::is('admin.statistics.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path d="M3 22.5H21" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M5.59998 8.87988H4C3.45 8.87988 3 9.32988 3 9.87988V18.4999C3 19.0499 3.45 19.4999 4 19.4999H5.59998C6.14998 19.4999 6.59998 19.0499 6.59998 18.4999V9.87988C6.59998 9.32988 6.14998 8.87988 5.59998 8.87988Z"
                            stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M12.7992 5.69043H11.1992C10.6492 5.69043 10.1992 6.14043 10.1992 6.69043V18.5004C10.1992 19.0504 10.6492 19.5004 11.1992 19.5004H12.7992C13.3492 19.5004 13.7992 19.0504 13.7992 18.5004V6.69043C13.7992 6.14043 13.3492 5.69043 12.7992 5.69043Z"
                            stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M19.9984 2.5H18.3984C17.8484 2.5 17.3984 2.95 17.3984 3.5V18.5C17.3984 19.05 17.8484 19.5 18.3984 19.5H19.9984C20.5484 19.5 20.9984 19.05 20.9984 18.5V3.5C20.9984 2.95 20.5484 2.5 19.9984 2.5Z"
                            stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Statistics
                </a>
            </li>
            <li>
                <a href="{{ route('admin.team.index') }}"
                    class="gift {{ Route::is('admin.team.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M18.0001 7.16C17.9401 7.15 17.8701 7.15 17.8101 7.16C16.4301 7.11 15.3301 5.98 15.3301 4.58C15.3301 3.15 16.4801 2 17.9101 2C19.3401 2 20.4901 3.16 20.4901 4.58C20.4801 5.98 19.3801 7.11 18.0001 7.16Z"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M16.9702 14.44C18.3402 14.67 19.8502 14.43 20.9102 13.72C22.3202 12.78 22.3202 11.24 20.9102 10.3C19.8402 9.59004 18.3102 9.35003 16.9402 9.59003"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M5.96998 7.16C6.02998 7.15 6.09998 7.15 6.15998 7.16C7.53998 7.11 8.63998 5.98 8.63998 4.58C8.63998 3.15 7.48998 2 6.05998 2C4.62998 2 3.47998 3.16 3.47998 4.58C3.48998 5.98 4.58998 7.11 5.96998 7.16Z"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M6.99994 14.44C5.62994 14.67 4.11994 14.43 3.05994 13.72C1.64994 12.78 1.64994 11.24 3.05994 10.3C4.12994 9.59004 5.65994 9.35003 7.02994 9.59003"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M12.0001 14.63C11.9401 14.62 11.8701 14.62 11.8101 14.63C10.4301 14.58 9.33008 13.45 9.33008 12.05C9.33008 10.62 10.4801 9.46997 11.9101 9.46997C13.3401 9.46997 14.4901 10.63 14.4901 12.05C14.4801 13.45 13.3801 14.59 12.0001 14.63Z"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.08997 17.78C7.67997 18.72 7.67997 20.26 9.08997 21.2C10.69 22.27 13.31 22.27 14.91 21.2C16.32 20.26 16.32 18.72 14.91 17.78C13.32 16.72 10.69 16.72 9.08997 17.78Z"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    Team
                </a>
            </li>
            <li class="accordion-item">
                <div class="accordion-header" id="headingBooks">
                    <a href="#"
                        class="accordion-button {{ Route::is('admin.cms.*') ? 'active' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#collapseBooks"
                        aria-expanded="{{ Route::is('admin.cms.*') ? 'true' : 'false' }}"
                        aria-controls="collapseBooks">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M21.93 6.76001L18.56 20.29C18.32 21.3 17.42 22 16.38 22H3.24001C1.73001 22 0.650023 20.5199 1.10002 19.0699L5.31001 5.55005C5.60001 4.61005 6.47003 3.95996 7.45003 3.95996H19.75C20.7 3.95996 21.49 4.53997 21.82 5.33997C22.01 5.76997 22.05 6.26001 21.93 6.76001Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" />
                            <path d="M16 22H20.78C22.07 22 23.08 20.91 22.99 19.62L22 6" stroke="#292D32"
                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.67999 6.38L10.72 2.06006" stroke="#292D32" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16.38 6.39001L17.32 2.05005" stroke="#292D32" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.70001 12H15.7" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.70001 16H14.7" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="accordion--header-text">CMS</span>
                        <span class="bi-chevron-down ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </span>
                    </a>
                </div>

                <div id="collapseBooks"
                    class="accordion-collapse collapse {{ Route::is('admin.cms.*') ? 'show' : '' }}"
                    aria-labelledby="headingBooks" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('admin.cms.hero.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.cms.hero.*') ? 'sub--active' : '' }}">
                                    Hero Section
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.cms.the-process.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.cms.the-process.*') ? 'sub--active' : '' }}">
                                    The Process
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.cms.three-d-map-or-video') }}"
                                    class="sub--menu--title {{ Route::is('admin.cms.three-d-map-or-video') ? 'sub--active' : '' }}">
                                    3D House Section
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.cms.home-page.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.cms.home-page.*') ? 'sub--active' : '' }}">
                                    Home Page
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.cms.about.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.cms.about.*') ? 'sub--active' : '' }}">
                                    About Page
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.cms.raffle-rules.index') }}"
                                   class="sub--menu--title {{ Route::is('admin.cms.raffle-rules.*') ? 'sub--active' : '' }}">
                                    Raffle Rules Page
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.faq.index') }}"
                    class="gift {{ Route::is('admin.faq.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M17 18.4301H13L8.54999 21.39C7.88999 21.83 7 21.3601 7 20.5601V18.4301C4 18.4301 2 16.4301 2 13.4301V7.42999C2 4.42999 4 2.42999 7 2.42999H17C20 2.42999 22 4.42999 22 7.42999V13.4301C22 16.4301 20 18.4301 17 18.4301Z"
                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M12 11.36V11.15C12 10.47 12.42 10.11 12.84 9.82001C13.25 9.54001 13.66 9.18002 13.66 8.52002C13.66 7.60002 12.92 6.85999 12 6.85999C11.08 6.85999 10.34 7.60002 10.34 8.52002"
                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9955 13.75H12.0045" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Faq
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dynamic-page.index') }}"
                    class="gift {{ Route::is('admin.dynamic-page.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M7 14H12" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 5.95996L3.25 2.20996" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.96002 2.25L3.21002 6" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 10H15" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 2H16C19.33 2.18 21 3.41 21 7.99V16" stroke="#292D32" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 9.01001V15.98C3 19.99 4 22 9 22H12C12.17 22 14.84 22 15 22" stroke="#292D32"
                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 16L15 22V19C15 17 16 16 18 16H21Z" stroke="#292D32" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Dynamic Page
                </a>
            </li>
            <li>
                <a href="{{ route('admin.house-files.index') }}"
                   class="gift {{ Route::is('admin.house-files.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M9 11V17L11 15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 17L7 15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    House Files
                </a>
            </li>
            <li>
                <a href="{{ route('admin.highlight-image.index') }}"
                   class="gift {{ Route::is('admin.highlight-image.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21.6799 16.9599L18.5499 9.64988C17.4899 7.16988 15.5399 7.06988 14.2299 9.42988L12.3399 12.8399C11.3799 14.5699 9.58993 14.7199 8.34993 13.1699L8.12993 12.8899C6.83993 11.2699 5.01993 11.4699 4.08993 13.3199L2.36993 16.7699C1.15993 19.1699 2.90993 21.9999 5.58993 21.9999H18.3499C20.9499 21.9999 22.6999 19.3499 21.6799 16.9599Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.96997 8C8.62682 8 9.96997 6.65685 9.96997 5C9.96997 3.34315 8.62682 2 6.96997 2C5.31312 2 3.96997 3.34315 3.96997 5C3.96997 6.65685 5.31312 8 6.96997 8Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Highlight Images
                </a>
            </li>
            <li>
                <a href="{{ route('admin.news.index') }}"
                   class="gift {{ Route::is('admin.news.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M20 12.2V13.9C20 17.05 18.2 18.4 15.5 18.4H6.5C3.8 18.4 2 17.05 2 13.9V8.5C2 5.35 3.8 4 6.5 4H9.2C9.07 4.38 9 4.8 9 5.25V9.15002C9 10.12 9.32 10.94 9.89 11.51C10.46 12.08 11.28 12.4 12.25 12.4V13.79C12.25 14.3 12.83 14.61 13.26 14.33L16.15 12.4H18.75C19.2 12.4 19.62 12.33 20 12.2Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 5.25V9.15002C22 10.64 21.24 11.76 20 12.2C19.62 12.33 19.2 12.4 18.75 12.4H16.15L13.26 14.33C12.83 14.61 12.25 14.3 12.25 13.79V12.4C11.28 12.4 10.46 12.08 9.89 11.51C9.32 10.94 9 10.12 9 9.15002V5.25C9 4.8 9.07 4.38 9.2 4C9.64 2.76 10.76 2 12.25 2H18.75C20.7 2 22 3.3 22 5.25Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.3999 22H14.5999" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 18.3999V21.9999" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.4955 7.25H18.5045" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.6957 7.25H15.7047" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.8954 7.25H12.9044" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    News
                </a>
            </li>
        </ul>
    </div>
    <!-- help and support  -->
    <div class="help---support">
        <h4>HELP & SUPPORT</h4>
        <ul class="menu">
            <li>
                <a href="{{ route('admin.help') }}" class="help {{ Route::is('admin.help') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M12 22.5C17.5 22.5 22 18 22 12.5C22 7 17.5 2.5 12 2.5C6.5 2.5 2 7 2 12.5C2 18 6.5 22.5 12 22.5Z"
                            stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 8.5V13.5" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11.9961 16.5H12.0051" stroke="#868A9B" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Help Center
                </a>
            </li>
            <li class="settings">

                <div class="accordion-header" id="setting_collaps">
                    <a href="#"
                        class="accordion-button {{ Route::is('admin.settings.*') ? 'active' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#setting_sidebar_section"
                        aria-expanded="{{ Route::is('admin.settings.*') ? 'true' : 'false' }}"
                        aria-controls="setting_sidebar_section">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M2 12.8799V11.1199C2 10.0799 2.85 9.21994 3.9 9.21994C5.71 9.21994 6.45 7.93994 5.54 6.36994C5.02 5.46994 5.33 4.29994 6.24 3.77994L7.97 2.78994C8.76 2.31994 9.78 2.59994 10.25 3.38994L10.36 3.57994C11.26 5.14994 12.74 5.14994 13.65 3.57994L13.76 3.38994C14.23 2.59994 15.25 2.31994 16.04 2.78994L17.77 3.77994C18.68 4.29994 18.99 5.46994 18.47 6.36994C17.56 7.93994 18.3 9.21994 20.11 9.21994C21.15 9.21994 22.01 10.0699 22.01 11.1199V12.8799C22.01 13.9199 21.16 14.7799 20.11 14.7799C18.3 14.7799 17.56 16.0599 18.47 17.6299C18.99 18.5399 18.68 19.6999 17.77 20.2199L16.04 21.2099C15.25 21.6799 14.23 21.3999 13.76 20.6099L13.65 20.4199C12.75 18.8499 11.27 18.8499 10.36 20.4199L10.25 20.6099C9.78 21.3999 8.76 21.6799 7.97 21.2099L6.24 20.2199C5.33 19.6999 5.02 18.5299 5.54 17.6299C6.45 16.0599 5.71 14.7799 3.9 14.7799C2.85 14.7799 2 13.9199 2 12.8799Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="accordion--header-text">Settings</span>
                        <span class="bi-chevron-down ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </span>
                    </a>
                </div>
                <div id="setting_sidebar_section"
                    class="accordion-collapse collapse {{ Route::is('admin.settings.*') ? 'show' : '' }}"
                    aria-labelledby="setting_collaps" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('admin.settings.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.settings.index') ? 'sub--active' : '' }}">
                                    Notifications
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.settings.system-setting.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.settings.system-setting.index') ? 'sub--active' : '' }}">
                                    System Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.settings.social-media.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.settings.social-media.*') ? 'sub--active' : '' }}">
                                    Social Media
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.settings.configuration.index') }}"
                                    class="sub--menu--title {{ Route::is('admin.settings.configuration.*') ? 'sub--active' : '' }}">
                                    Configuration
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


            </li>
            <li>
                <!-- logout  -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"
                        class="logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                            fill="none">
                            <path
                                d="M8.89844 8.06023C9.20844 4.46023 11.0584 2.99023 15.1084 2.99023H15.2384C19.7084 2.99023 21.4984 4.78023 21.4984 9.25023V15.7702C21.4984 20.2402 19.7084 22.0302 15.2384 22.0302H15.1084C11.0884 22.0302 9.23844 20.5802 8.90844 17.0402"
                                stroke="#868A9B" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M15.0011 12.5H3.62109" stroke="#868A9B" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.85 9.15039L2.5 12.5004L5.85 15.8504" stroke="#868A9B" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Log Out
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
