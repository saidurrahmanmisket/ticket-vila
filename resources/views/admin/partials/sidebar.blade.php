<div class="sidebar">
    <!-- logo -->
    <a href="/" class="sidebar--logo">
        <img src="{{asset('/admin/images/logo.svg')}}" alt="" />
    </a>
    <!-- mainmenu  -->
    <div class="main--menu">
        <h4>MAINMENU</h4>
        <ul class="menu">
            <li>
                <a href="{{route('admin.dashboard')}}" class="dashboard {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                    >
                        <path
                            d="M18.6714 2.5H16.7714C14.5914 2.5 13.4414 3.65 13.4414 5.83V7.73C13.4414 9.91 14.5914 11.06 16.7714 11.06H18.6714C20.8514 11.06 22.0014 9.91 22.0014 7.73V5.83C22.0014 3.65 20.8514 2.5 18.6714 2.5Z"
                            fill="white"
                        />
                        <path
                            d="M7.24 13.9297H5.34C3.15 13.9297 2 15.0797 2 17.2597V19.1597C2 21.3497 3.15 22.4997 5.33 22.4997H7.23C9.41 22.4997 10.56 21.3497 10.56 19.1697V17.2697C10.57 15.0797 9.42 13.9297 7.24 13.9297Z"
                            fill="white"
                        />
                        <path
                            d="M6.29 11.08C8.6593 11.08 10.58 9.1593 10.58 6.79C10.58 4.4207 8.6593 2.5 6.29 2.5C3.9207 2.5 2 4.4207 2 6.79C2 9.1593 3.9207 11.08 6.29 11.08Z"
                            fill="white"
                        />
                        <path
                            d="M17.7119 22.4999C20.0812 22.4999 22.0019 20.5792 22.0019 18.2099C22.0019 15.8406 20.0812 13.9199 17.7119 13.9199C15.3426 13.9199 13.4219 15.8406 13.4219 18.2099C13.4219 20.5792 15.3426 22.4999 17.7119 22.4999Z"
                            fill="white"
                        />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ticket.index') }}" class="tickets {{ Route::is('admin.ticket.*') ? 'active' : '' }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                    >
                        <path
                            d="M20 7.54V17.46C20 18.98 19.86 20.06 19.5 20.83C19.5 20.84 19.49 20.86 19.48 20.87C19.26 21.15 18.97 21.29 18.63 21.29C18.1 21.29 17.46 20.94 16.77 20.2C15.95 19.32 14.69 19.39 13.97 20.35L12.96 21.69C12.56 22.23 12.03 22.5 11.5 22.5C10.97 22.5 10.44 22.23 10.04 21.69L9.02002 20.34C8.31002 19.39 7.05999 19.32 6.23999 20.19L6.22998 20.2C5.09998 21.41 4.10002 21.59 3.52002 20.87C3.51002 20.86 3.5 20.84 3.5 20.83C3.14 20.06 3 18.98 3 17.46V7.54C3 6.02 3.14 4.94 3.5 4.17C3.5 4.16 3.50002 4.15 3.52002 4.14C4.09002 3.41 5.09998 3.59 6.22998 4.8L6.23999 4.81C7.05999 5.68 8.31002 5.61 9.02002 4.66L10.04 3.31C10.44 2.77 10.97 2.5 11.5 2.5C12.03 2.5 12.56 2.77 12.96 3.31L13.97 4.65C14.69 5.61 15.95 5.68 16.77 4.8C17.46 4.06 18.1 3.71 18.63 3.71C18.97 3.71 19.26 3.86 19.48 4.14C19.5 4.15 19.5 4.16 19.5 4.17C19.86 4.94 20 6.02 20 7.54Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M8 10.75H16"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M8 14.25H14"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Tickets
                </a>
            </li>
            <li>
                <a href="{{ route('admin.campaign.index') }}" class="campaign {{ Route::is('admin.campaign.*') ? 'active' : '' }}">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z" clip-rule="evenodd"/>
                    </svg>

                    Campaign
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gift.index') }}" class="gift {{ Route::is('admin.gift.*') ? 'active' : '' }}">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21v-9m3-4H7.5a2.5 2.5 0 1 1 0-5c1.5 0 2.875 1.25 3.875 2.5M14 21v-9m-9 0h14v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8ZM4 8h16a1 1 0 0 1 1 1v3H3V9a1 1 0 0 1 1-1Zm12.155-5c-3 0-5.5 5-5.5 5h5.5a2.5 2.5 0 0 0 0-5Z"/>
                    </svg>
                    Gift
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}" class="user {{ Route::is('admin.user.*') ? 'active' : '' }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                    >
                        <path
                            d="M12.1586 11.37C12.0586 11.36 11.9386 11.36 11.8286 11.37C9.44859 11.29 7.55859 9.34 7.55859 6.94C7.55859 4.49 9.53859 2.5 11.9986 2.5C14.4486 2.5 16.4386 4.49 16.4386 6.94C16.4286 9.34 14.5386 11.29 12.1586 11.37Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M7.15875 15.06C4.73875 16.68 4.73875 19.32 7.15875 20.93C9.90875 22.77 14.4188 22.77 17.1688 20.93C19.5888 19.31 19.5888 16.67 17.1688 15.06C14.4288 13.23 9.91875 13.23 7.15875 15.06Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.statistics.index') }}" class="statistics {{ Route::is('admin.statistics.*') ? 'active' : '' }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                    >
                        <path
                            d="M3 22.5H21"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M5.59998 8.87988H4C3.45 8.87988 3 9.32988 3 9.87988V18.4999C3 19.0499 3.45 19.4999 4 19.4999H5.59998C6.14998 19.4999 6.59998 19.0499 6.59998 18.4999V9.87988C6.59998 9.32988 6.14998 8.87988 5.59998 8.87988Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M12.7992 5.69043H11.1992C10.6492 5.69043 10.1992 6.14043 10.1992 6.69043V18.5004C10.1992 19.0504 10.6492 19.5004 11.1992 19.5004H12.7992C13.3492 19.5004 13.7992 19.0504 13.7992 18.5004V6.69043C13.7992 6.14043 13.3492 5.69043 12.7992 5.69043Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M19.9984 2.5H18.3984C17.8484 2.5 17.3984 2.95 17.3984 3.5V18.5C17.3984 19.05 17.8484 19.5 18.3984 19.5H19.9984C20.5484 19.5 20.9984 19.05 20.9984 18.5V3.5C20.9984 2.95 20.5484 2.5 19.9984 2.5Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Statistics
                </a>
            </li>
        </ul>
    </div>
    <!-- help and support  -->
    <div class="help---support">
        <h4>HELP & SUPPORT</h4>
        <ul class="menu">
            <li>
                <a href="help.html" class="help">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                    >
                        <path
                            d="M12 22.5C17.5 22.5 22 18 22 12.5C22 7 17.5 2.5 12 2.5C6.5 2.5 2 7 2 12.5C2 18 6.5 22.5 12 22.5Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M12 8.5V13.5"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M11.9961 16.5H12.0051"
                            stroke="#868A9B"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Help & Center
                </a>
            </li>
            <li>
                <a href="settings.html" class="settings">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                    >
                        <path
                            d="M12 15.5C13.6569 15.5 15 14.1569 15 12.5C15 10.8431 13.6569 9.5 12 9.5C10.3431 9.5 9 10.8431 9 12.5C9 14.1569 10.3431 15.5 12 15.5Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M2 13.3804V11.6204C2 10.5804 2.85 9.72043 3.9 9.72043C5.71 9.72043 6.45 8.44042 5.54 6.87042C5.02 5.97042 5.33 4.80042 6.24 4.28042L7.97 3.29042C8.76 2.82042 9.78 3.10042 10.25 3.89042L10.36 4.08042C11.26 5.65042 12.74 5.65042 13.65 4.08042L13.76 3.89042C14.23 3.10042 15.25 2.82042 16.04 3.29042L17.77 4.28042C18.68 4.80042 18.99 5.97042 18.47 6.87042C17.56 8.44042 18.3 9.72043 20.11 9.72043C21.15 9.72043 22.01 10.5704 22.01 11.6204V13.3804C22.01 14.4204 21.16 15.2804 20.11 15.2804C18.3 15.2804 17.56 16.5604 18.47 18.1304C18.99 19.0404 18.68 20.2004 17.77 20.7204L16.04 21.7104C15.25 22.1804 14.23 21.9004 13.76 21.1104L13.65 20.9204C12.75 19.3504 11.27 19.3504 10.36 20.9204L10.25 21.1104C9.78 21.9004 8.76 22.1804 7.97 21.7104L6.24 20.7204C5.33 20.2004 5.02 19.0304 5.54 18.1304C6.45 16.5604 5.71 15.2804 3.9 15.2804C2.85 15.2804 2 14.4204 2 13.3804Z"
                            stroke="#868A9B"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Settings
                </a>
            </li>
        </ul>
    </div>
    <!-- logout  -->
    <a href="#" class="logout">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="25"
            viewBox="0 0 24 25"
            fill="none"
        >
            <path
                d="M8.89844 8.06023C9.20844 4.46023 11.0584 2.99023 15.1084 2.99023H15.2384C19.7084 2.99023 21.4984 4.78023 21.4984 9.25023V15.7702C21.4984 20.2402 19.7084 22.0302 15.2384 22.0302H15.1084C11.0884 22.0302 9.23844 20.5802 8.90844 17.0402"
                stroke="#868A9B"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M15.0011 12.5H3.62109"
                stroke="#868A9B"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M5.85 9.15039L2.5 12.5004L5.85 15.8504"
                stroke="#868A9B"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
        </svg>
        Log Out
    </a>
</div>
