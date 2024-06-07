@extends('admin.app')

@section('title', 'Notification')
@section('header_title')
    Notification
@endsection;
@section('content')
    <section class="app--content--main">
    <!-- top title  -->
    <div class="notification--area">
        <div class="top--title">
            <h3>You have 3 unread message</h3>
            <a href="#" class="button">Mark All as Read</a>
        </div>
        <div class="notification--wrapper">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link active"
                        id="pills-all-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-all"
                        type="button"
                        role="tab"
                        aria-controls="pills-all"
                        aria-selected="true"
                    >
                        All
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="pills-new-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-new"
                        type="button"
                        role="tab"
                        aria-controls="pills-new"
                        aria-selected="false"
                    >
                        New
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="pills-unread-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-unread"
                        type="button"
                        role="tab"
                        aria-controls="pills-unread"
                        aria-selected="false"
                    >
                        Unread
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div
                    class="tab-pane fade show active"
                    id="pills-all"
                    role="tabpanel"
                    aria-labelledby="pills-all-tab"
                    tabindex="0"
                >
                    <div class="notifications default--scrollbar pr_20">
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: linear-gradient(
                            90deg,
                            rgba(239, 159, 60, 0.12) 0%,
                            rgba(255, 210, 135, 0.12) 100%
                          );
                        "
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="32"
                                        height="32"
                                        viewBox="0 0 32 32"
                                        fill="none"
                                    >
                                        <path
                                            d="M24.6693 26H19.3359"
                                            stroke="url(#paint0_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M22 28.6663V23.333"
                                            stroke="url(#paint1_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M16.2115 14.4937C16.0782 14.4803 15.9182 14.4803 15.7715 14.4937C12.5982 14.387 10.0782 11.787 10.0782 8.58699C10.0648 5.32033 12.7182 2.66699 15.9848 2.66699C19.2515 2.66699 21.9048 5.32033 21.9048 8.58699C21.9048 11.787 19.3715 14.387 16.2115 14.4937Z"
                                            stroke="url(#paint2_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M15.9828 29.0799C13.5561 29.0799 11.1428 28.4666 9.30281 27.2399C6.07615 25.0799 6.07615 21.5599 9.30281 19.4132C12.9695 16.9599 18.9828 16.9599 22.6495 19.4132"
                                            stroke="url(#paint3_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_14038_2529"
                                                x1="19.3359"
                                                y1="26.5"
                                                x2="24.6693"
                                                y2="26.5"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint1_linear_14038_2529"
                                                x1="22"
                                                y1="25.9997"
                                                x2="23"
                                                y2="25.9997"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint2_linear_14038_2529"
                                                x1="10.0781"
                                                y1="8.58033"
                                                x2="21.9048"
                                                y2="8.58033"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint3_linear_14038_2529"
                                                x1="6.88281"
                                                y1="23.3266"
                                                x2="22.6495"
                                                y2="23.3266"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                    <p>
                                        lorum Sed ut perspIdatis unde omnis Iste natus error
                                        sit voluptatem accusantlum.
                                    </p>
                                </div>
                            </div>
                            <p class="status text-green">New</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: rgba(255, 86, 48, 0.10);
                        "
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M16 12V18.6667" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.9967 28.547H7.91665C3.28999 28.547 1.35666 25.2404 3.59666 21.2004L7.75666 13.707L11.6767 6.66703C14.05 2.38703 17.9433 2.38703 20.3167 6.66703L24.2367 13.7204L28.3967 21.2137C30.6367 25.2537 28.69 28.5604 24.0767 28.5604H15.9967V28.547Z" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.9922 22.667H16.0042" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>Error processing payment!</h4>
                                    <p>
                                        Please review the wallet detals and fix the error to process your payments.
                                    </p>
                                </div>
                            </div>
                            <p class="status text-green">New</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: rgba(59, 171, 255, 0.14);
                        "
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="#04BAFF"/>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>New 3 ticket parches</h4>
                                    <p>
                                        lorum Sed ut perspIdatis unde omnis Iste natus error sit voluptatem accusantlum.
                                    </p>
                                </div>
                            </div>
                            <p class="status text-green">New</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: linear-gradient(90deg, rgba(239, 159, 60, 0.12) 0%, rgba(255, 210, 135, 0.12) 100%);
                        "
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="url(#paint0_linear_14578_1664)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_14578_1664" x1="4" y1="16.0003" x2="26.6667" y2="16.0003" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#EF9F3C"/>
                                                <stop offset="1" stop-color="#FFD287"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                    <p>
                                        lorum Sed ut perspIdatis unde omnis Iste natus error
                                        sit voluptatem accusantlum.
                                    </p>
                                </div>
                            </div>
                            <p class="status">03/04/2024</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: linear-gradient(
                            90deg,
                            rgba(239, 159, 60, 0.12) 0%,
                            rgba(255, 210, 135, 0.12) 100%
                          );
                        "
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="32"
                                        height="32"
                                        viewBox="0 0 32 32"
                                        fill="none"
                                    >
                                        <path
                                            d="M24.6693 26H19.3359"
                                            stroke="url(#paint0_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M22 28.6663V23.333"
                                            stroke="url(#paint1_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M16.2115 14.4937C16.0782 14.4803 15.9182 14.4803 15.7715 14.4937C12.5982 14.387 10.0782 11.787 10.0782 8.58699C10.0648 5.32033 12.7182 2.66699 15.9848 2.66699C19.2515 2.66699 21.9048 5.32033 21.9048 8.58699C21.9048 11.787 19.3715 14.387 16.2115 14.4937Z"
                                            stroke="url(#paint2_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M15.9828 29.0799C13.5561 29.0799 11.1428 28.4666 9.30281 27.2399C6.07615 25.0799 6.07615 21.5599 9.30281 19.4132C12.9695 16.9599 18.9828 16.9599 22.6495 19.4132"
                                            stroke="url(#paint3_linear_14038_2529)"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_14038_2529"
                                                x1="19.3359"
                                                y1="26.5"
                                                x2="24.6693"
                                                y2="26.5"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint1_linear_14038_2529"
                                                x1="22"
                                                y1="25.9997"
                                                x2="23"
                                                y2="25.9997"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint2_linear_14038_2529"
                                                x1="10.0781"
                                                y1="8.58033"
                                                x2="21.9048"
                                                y2="8.58033"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint3_linear_14038_2529"
                                                x1="6.88281"
                                                y1="23.3266"
                                                x2="22.6495"
                                                y2="23.3266"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#EF9F3C" />
                                                <stop offset="1" stop-color="#FFD287" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                    <p>
                                        lorum Sed ut perspIdatis unde omnis Iste natus error
                                        sit voluptatem accusantlum.
                                    </p>
                                </div>
                            </div>
                            <p class="status text-green">New</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: rgba(255, 86, 48, 0.10);
                        "
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M16 12V18.6667" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.9967 28.547H7.91665C3.28999 28.547 1.35666 25.2404 3.59666 21.2004L7.75666 13.707L11.6767 6.66703C14.05 2.38703 17.9433 2.38703 20.3167 6.66703L24.2367 13.7204L28.3967 21.2137C30.6367 25.2537 28.69 28.5604 24.0767 28.5604H15.9967V28.547Z" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.9922 22.667H16.0042" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>Error processing payment!</h4>
                                    <p>
                                        Please review the wallet detals and fix the error to process your payments.
                                    </p>
                                </div>
                            </div>
                            <p class="status text-green">New</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: rgba(59, 171, 255, 0.14);
                        "
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="#04BAFF"/>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>New 3 ticket parches</h4>
                                    <p>
                                        lorum Sed ut perspIdatis unde omnis Iste natus error sit voluptatem accusantlum.
                                    </p>
                                </div>
                            </div>
                            <p class="status text-green">New</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <!-- notification--card  -->
                        <div class="notification--card">
                            <!-- message  -->
                            <div class="message">
                                <!-- icon  -->
                                <div
                                    class="icon"
                                    style="
                          background: linear-gradient(90deg, rgba(239, 159, 60, 0.12) 0%, rgba(255, 210, 135, 0.12) 100%);
                        "
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="url(#paint0_linear_14578_1664)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_14578_1664" x1="4" y1="16.0003" x2="26.6667" y2="16.0003" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#EF9F3C"/>
                                                <stop offset="1" stop-color="#FFD287"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                    <p>
                                        lorum Sed ut perspIdatis unde omnis Iste natus error
                                        sit voluptatem accusantlum.
                                    </p>
                                </div>
                            </div>
                            <p class="status">03/04/2024</p>
                            <a href="#" class="action--btn">
                                Delete
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <path
                                        d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.8281 16.5H14.1581"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10 12.5H15"
                                        stroke="#FF5630"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="tab-pane fade"
                    id="pills-new"
                    role="tabpanel"
                    aria-labelledby="pills-new-tab"
                    tabindex="0"
                >
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: linear-gradient(
                            90deg,
                            rgba(239, 159, 60, 0.12) 0%,
                            rgba(255, 210, 135, 0.12) 100%
                          );
                        "
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 32 32"
                                    fill="none"
                                >
                                    <path
                                        d="M24.6693 26H19.3359"
                                        stroke="url(#paint0_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M22 28.6663V23.333"
                                        stroke="url(#paint1_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M16.2115 14.4937C16.0782 14.4803 15.9182 14.4803 15.7715 14.4937C12.5982 14.387 10.0782 11.787 10.0782 8.58699C10.0648 5.32033 12.7182 2.66699 15.9848 2.66699C19.2515 2.66699 21.9048 5.32033 21.9048 8.58699C21.9048 11.787 19.3715 14.387 16.2115 14.4937Z"
                                        stroke="url(#paint2_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M15.9828 29.0799C13.5561 29.0799 11.1428 28.4666 9.30281 27.2399C6.07615 25.0799 6.07615 21.5599 9.30281 19.4132C12.9695 16.9599 18.9828 16.9599 22.6495 19.4132"
                                        stroke="url(#paint3_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <defs>
                                        <linearGradient
                                            id="paint0_linear_14038_2529"
                                            x1="19.3359"
                                            y1="26.5"
                                            x2="24.6693"
                                            y2="26.5"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                        <linearGradient
                                            id="paint1_linear_14038_2529"
                                            x1="22"
                                            y1="25.9997"
                                            x2="23"
                                            y2="25.9997"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                        <linearGradient
                                            id="paint2_linear_14038_2529"
                                            x1="10.0781"
                                            y1="8.58033"
                                            x2="21.9048"
                                            y2="8.58033"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                        <linearGradient
                                            id="paint3_linear_14038_2529"
                                            x1="6.88281"
                                            y1="23.3266"
                                            x2="22.6495"
                                            y2="23.3266"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                <p>
                                    lorum Sed ut perspIdatis unde omnis Iste natus error
                                    sit voluptatem accusantlum.
                                </p>
                            </div>
                        </div>
                        <p class="status text-green">New</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: rgba(255, 86, 48, 0.10);
                        "
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M16 12V18.6667" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.9967 28.547H7.91665C3.28999 28.547 1.35666 25.2404 3.59666 21.2004L7.75666 13.707L11.6767 6.66703C14.05 2.38703 17.9433 2.38703 20.3167 6.66703L24.2367 13.7204L28.3967 21.2137C30.6367 25.2537 28.69 28.5604 24.0767 28.5604H15.9967V28.547Z" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.9922 22.667H16.0042" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>Error processing payment!</h4>
                                <p>
                                    Please review the wallet detals and fix the error to process your payments.
                                </p>
                            </div>
                        </div>
                        <p class="status text-green">New</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: rgba(59, 171, 255, 0.14);
                        "
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="#04BAFF"/>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>New 3 ticket parches</h4>
                                <p>
                                    lorum Sed ut perspIdatis unde omnis Iste natus error sit voluptatem accusantlum.
                                </p>
                            </div>
                        </div>
                        <p class="status text-green">New</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: linear-gradient(90deg, rgba(239, 159, 60, 0.12) 0%, rgba(255, 210, 135, 0.12) 100%);
                        "
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="url(#paint0_linear_14578_1664)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_14578_1664" x1="4" y1="16.0003" x2="26.6667" y2="16.0003" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#EF9F3C"/>
                                            <stop offset="1" stop-color="#FFD287"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                <p>
                                    lorum Sed ut perspIdatis unde omnis Iste natus error
                                    sit voluptatem accusantlum.
                                </p>
                            </div>
                        </div>
                        <p class="status">03/04/2024</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
                <div
                    class="tab-pane fade"
                    id="pills-unread"
                    role="tabpanel"
                    aria-labelledby="pills-unread-tab"
                    tabindex="0"
                >
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: linear-gradient(
                            90deg,
                            rgba(239, 159, 60, 0.12) 0%,
                            rgba(255, 210, 135, 0.12) 100%
                          );
                        "
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 32 32"
                                    fill="none"
                                >
                                    <path
                                        d="M24.6693 26H19.3359"
                                        stroke="url(#paint0_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M22 28.6663V23.333"
                                        stroke="url(#paint1_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M16.2115 14.4937C16.0782 14.4803 15.9182 14.4803 15.7715 14.4937C12.5982 14.387 10.0782 11.787 10.0782 8.58699C10.0648 5.32033 12.7182 2.66699 15.9848 2.66699C19.2515 2.66699 21.9048 5.32033 21.9048 8.58699C21.9048 11.787 19.3715 14.387 16.2115 14.4937Z"
                                        stroke="url(#paint2_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M15.9828 29.0799C13.5561 29.0799 11.1428 28.4666 9.30281 27.2399C6.07615 25.0799 6.07615 21.5599 9.30281 19.4132C12.9695 16.9599 18.9828 16.9599 22.6495 19.4132"
                                        stroke="url(#paint3_linear_14038_2529)"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <defs>
                                        <linearGradient
                                            id="paint0_linear_14038_2529"
                                            x1="19.3359"
                                            y1="26.5"
                                            x2="24.6693"
                                            y2="26.5"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                        <linearGradient
                                            id="paint1_linear_14038_2529"
                                            x1="22"
                                            y1="25.9997"
                                            x2="23"
                                            y2="25.9997"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                        <linearGradient
                                            id="paint2_linear_14038_2529"
                                            x1="10.0781"
                                            y1="8.58033"
                                            x2="21.9048"
                                            y2="8.58033"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                        <linearGradient
                                            id="paint3_linear_14038_2529"
                                            x1="6.88281"
                                            y1="23.3266"
                                            x2="22.6495"
                                            y2="23.3266"
                                            gradientUnits="userSpaceOnUse"
                                        >
                                            <stop stop-color="#EF9F3C" />
                                            <stop offset="1" stop-color="#FFD287" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                <p>
                                    lorum Sed ut perspIdatis unde omnis Iste natus error
                                    sit voluptatem accusantlum.
                                </p>
                            </div>
                        </div>
                        <p class="status text-green">New</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: rgba(255, 86, 48, 0.10);
                        "
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M16 12V18.6667" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.9967 28.547H7.91665C3.28999 28.547 1.35666 25.2404 3.59666 21.2004L7.75666 13.707L11.6767 6.66703C14.05 2.38703 17.9433 2.38703 20.3167 6.66703L24.2367 13.7204L28.3967 21.2137C30.6367 25.2537 28.69 28.5604 24.0767 28.5604H15.9967V28.547Z" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.9922 22.667H16.0042" stroke="#FF5630" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>Error processing payment!</h4>
                                <p>
                                    Please review the wallet detals and fix the error to process your payments.
                                </p>
                            </div>
                        </div>
                        <p class="status text-green">New</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: rgba(59, 171, 255, 0.14);
                        "
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="#04BAFF"/>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>New 3 ticket parches</h4>
                                <p>
                                    lorum Sed ut perspIdatis unde omnis Iste natus error sit voluptatem accusantlum.
                                </p>
                            </div>
                        </div>
                        <p class="status text-green">New</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                    <!-- notification--card  -->
                    <div class="notification--card">
                        <!-- message  -->
                        <div class="message">
                            <!-- icon  -->
                            <div
                                class="icon"
                                style="
                          background: linear-gradient(90deg, rgba(239, 159, 60, 0.12) 0%, rgba(255, 210, 135, 0.12) 100%);
                        "
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M26 4.89366C26 4.88033 26 4.86699 25.9733 4.85366C25.68 4.48033 25.2933 4.28033 24.84 4.28033C24.1333 4.28033 23.28 4.74699 22.36 5.73366C21.2667 6.90699 19.5867 6.81366 18.6267 5.53366L17.28 3.74699C16.7467 3.02699 16.04 2.66699 15.3333 2.66699C14.6267 2.66699 13.92 3.02699 13.3867 3.74699L12.0267 5.54699C11.08 6.81366 9.41333 6.90699 8.32 5.74699L8.30667 5.73366C6.8 4.12033 5.45333 3.88033 4.69333 4.85366C4.66667 4.86699 4.66667 4.88033 4.66667 4.89366C4.18667 5.92033 4 7.36033 4 9.38699V22.6137C4 24.6403 4.18667 26.0803 4.66667 27.107C4.66667 27.1203 4.68 27.147 4.69333 27.1603C5.46667 28.1203 6.8 27.8803 8.30667 26.267L8.32 26.2537C9.41333 25.0937 11.08 25.187 12.0267 26.4537L13.3867 28.2537C13.92 28.9737 14.6267 29.3337 15.3333 29.3337C16.04 29.3337 16.7467 28.9737 17.28 28.2537L18.6267 26.467C19.5867 25.187 21.2667 25.0937 22.36 26.267C23.28 27.2537 24.1333 27.7203 24.84 27.7203C25.2933 27.7203 25.68 27.5337 25.9733 27.1603C25.9867 27.147 26 27.1203 26 27.107C26.48 26.0803 26.6667 24.6403 26.6667 22.6137V9.38699C26.6667 7.36033 26.48 5.92033 26 4.89366ZM18.6667 19.3337H10.6667C10.12 19.3337 9.66667 18.8803 9.66667 18.3337C9.66667 17.787 10.12 17.3337 10.6667 17.3337H18.6667C19.2133 17.3337 19.6667 17.787 19.6667 18.3337C19.6667 18.8803 19.2133 19.3337 18.6667 19.3337ZM21.3333 14.667H10.6667C10.12 14.667 9.66667 14.2137 9.66667 13.667C9.66667 13.1203 10.12 12.667 10.6667 12.667H21.3333C21.88 12.667 22.3333 13.1203 22.3333 13.667C22.3333 14.2137 21.88 14.667 21.3333 14.667Z" fill="url(#paint0_linear_14578_1664)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_14578_1664" x1="4" y1="16.0003" x2="26.6667" y2="16.0003" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#EF9F3C"/>
                                            <stop offset="1" stop-color="#FFD287"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div class="text">
                                <h4>New Registration: Finibus Bonorum et Malorum</h4>
                                <p>
                                    lorum Sed ut perspIdatis unde omnis Iste natus error
                                    sit voluptatem accusantlum.
                                </p>
                            </div>
                        </div>
                        <p class="status">03/04/2024</p>
                        <a href="#" class="action--btn">
                            Delete
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="24"
                                viewBox="0 0 25 24"
                                fill="none"
                            >
                                <path
                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.8281 16.5H14.1581"
                                    stroke="#FF5630"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10 12.5H15"
                                    stroke="#FF5630"
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
@endsection
