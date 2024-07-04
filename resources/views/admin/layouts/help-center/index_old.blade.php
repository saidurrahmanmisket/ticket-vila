@extends('admin.app')

@section('title', 'Help Center')
@section('header_title')
    Help Center
@endsection;
@section('content')
    <section class="app--content--main">
    <!-- tickets area  -->
    <div class="help--area tickets--area">
        <h4 class="common--title">Support Ticket</h4>
        <!-- filter--and--search  -->
        <div class="filter--and--search">
            <form action="#">
                <!-- select  -->
                <div class="select">
                    <select id="sortby-date">
                        <option value="1">All Tickets</option>
                        <option value="2">Started</option>
                        <option value="3">Snoozed</option>
                        <option value="4">Drifts</option>
                        <option value="5">Deleted</option>
                    </select>
                    <div class="sort--icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewBox="0 0 18 18"
                            fill="none"
                        >
                            <path
                                d="M2.25 5.25H15.75"
                                stroke="#868A9B"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            />
                            <path
                                d="M4.5 9H13.5"
                                stroke="#868A9B"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            />
                            <path
                                d="M7.5 12.75H10.5"
                                stroke="#868A9B"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            />
                        </svg>
                    </div>
                </div>
                <!-- search  -->
                <div class="search">
                    <input type="search" placeholder="Search Ticket" />
                    <button>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="19"
                            viewBox="0 0 18 19"
                            fill="none"
                        >
                            <ellipse
                                cx="8.80687"
                                cy="8.80592"
                                rx="7.49047"
                                ry="7.45533"
                                stroke="#868A9B"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M14.0156 14.3789L16.9523 17.2942"
                                stroke="#868A9B"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <!-- help post wrapper  -->
        <div class="help--post--wrapper default--scrollbar">
            <!-- single card  -->
            <div class="ticket--post--card">
                <!-- top -->
                <div class="top">
                    <div class="ticket--info">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M19.5 3.67C19.5 3.66 19.5 3.65 19.48 3.64C19.26 3.36 18.97 3.21 18.63 3.21C18.1 3.21 17.46 3.56 16.77 4.3C15.95 5.18 14.69 5.11 13.97 4.15L12.96 2.81C12.56 2.27 12.03 2 11.5 2C10.97 2 10.44 2.27 10.04 2.81L9.02 4.16C8.31 5.11 7.06 5.18 6.24 4.31L6.23 4.3C5.1 3.09 4.09 2.91 3.52 3.64C3.5 3.65 3.5 3.66 3.5 3.67C3.14 4.44 3 5.52 3 7.04V16.96C3 18.48 3.14 19.56 3.5 20.33C3.5 20.34 3.51 20.36 3.52 20.37C4.1 21.09 5.1 20.91 6.23 19.7L6.24 19.69C7.06 18.82 8.31 18.89 9.02 19.84L10.04 21.19C10.44 21.73 10.97 22 11.5 22C12.03 22 12.56 21.73 12.96 21.19L13.97 19.85C14.69 18.89 15.95 18.82 16.77 19.7C17.46 20.44 18.1 20.79 18.63 20.79C18.97 20.79 19.26 20.65 19.48 20.37C19.49 20.36 19.5 20.34 19.5 20.33C19.86 19.56 20 18.48 20 16.96V7.04C20 5.52 19.86 4.44 19.5 3.67ZM14 14.5H8C7.59 14.5 7.25 14.16 7.25 13.75C7.25 13.34 7.59 13 8 13H14C14.41 13 14.75 13.34 14.75 13.75C14.75 14.16 14.41 14.5 14 14.5ZM16 11H8C7.59 11 7.25 10.66 7.25 10.25C7.25 9.84 7.59 9.5 8 9.5H16C16.41 9.5 16.75 9.84 16.75 10.25C16.75 10.66 16.41 11 16 11Z"
                                    fill="#04BAFF"
                                />
                            </svg>
                        </div>
                        <p>Ticket #2020 - 3054</p>
                    </div>
                    <!-- date and actions  -->
                    <div class="date--and--actions">
                        <p class="date">03/04/2024 - 11:20 AM</p>
                        <div class="action">
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
                        </div>
                    </div>
                </div>
                <p class="message">Lorem ipsum dolor sit amet consectetur. Suscipit consequat eget orci ultricies sed lacus interdum aliquam at. Ut urna viverra nulla ut est quam et. Euismod volutpat habitasse ornare nisl ipsum. Non augue convallis sem magna aliquet ullamcorper massa....</p>
                <div class="moderator--area">
                    <!-- moderator  -->
                    <div class="moderator">
                        <img src="{{ asset('/admin/images/profile.png') }}" alt="">
                        <p>Max Musternann</p>
                    </div>
                    <p class="tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.8296 15.2998L15.2996 19.8298C13.4396 21.6898 10.4196 21.6898 8.54962 19.8298L4.15962 15.4398C2.29962 13.5798 2.29962 10.5598 4.15962 8.6898L8.69962 4.1698C9.64962 3.2198 10.9596 2.7098 12.2996 2.7798L17.2996 3.0198C19.2996 3.1098 20.8896 4.6998 20.9896 6.6898L21.2296 11.6898C21.2896 13.0398 20.7796 14.3498 19.8296 15.2998Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.5 12C13.1193 12 12 10.8807 12 9.5C12 8.11929 13.1193 7 14.5 7C15.8807 7 17 8.11929 17 9.5C17 10.8807 15.8807 12 14.5 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        My account breaks when I try to up...
                    </p>
                </div>
            </div>
            <!-- single card  -->
            <div class="ticket--post--card">
                <!-- top -->
                <div class="top">
                    <div class="ticket--info">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M19.5 3.67C19.5 3.66 19.5 3.65 19.48 3.64C19.26 3.36 18.97 3.21 18.63 3.21C18.1 3.21 17.46 3.56 16.77 4.3C15.95 5.18 14.69 5.11 13.97 4.15L12.96 2.81C12.56 2.27 12.03 2 11.5 2C10.97 2 10.44 2.27 10.04 2.81L9.02 4.16C8.31 5.11 7.06 5.18 6.24 4.31L6.23 4.3C5.1 3.09 4.09 2.91 3.52 3.64C3.5 3.65 3.5 3.66 3.5 3.67C3.14 4.44 3 5.52 3 7.04V16.96C3 18.48 3.14 19.56 3.5 20.33C3.5 20.34 3.51 20.36 3.52 20.37C4.1 21.09 5.1 20.91 6.23 19.7L6.24 19.69C7.06 18.82 8.31 18.89 9.02 19.84L10.04 21.19C10.44 21.73 10.97 22 11.5 22C12.03 22 12.56 21.73 12.96 21.19L13.97 19.85C14.69 18.89 15.95 18.82 16.77 19.7C17.46 20.44 18.1 20.79 18.63 20.79C18.97 20.79 19.26 20.65 19.48 20.37C19.49 20.36 19.5 20.34 19.5 20.33C19.86 19.56 20 18.48 20 16.96V7.04C20 5.52 19.86 4.44 19.5 3.67ZM14 14.5H8C7.59 14.5 7.25 14.16 7.25 13.75C7.25 13.34 7.59 13 8 13H14C14.41 13 14.75 13.34 14.75 13.75C14.75 14.16 14.41 14.5 14 14.5ZM16 11H8C7.59 11 7.25 10.66 7.25 10.25C7.25 9.84 7.59 9.5 8 9.5H16C16.41 9.5 16.75 9.84 16.75 10.25C16.75 10.66 16.41 11 16 11Z"
                                    fill="#04BAFF"
                                />
                            </svg>
                        </div>
                        <p>Ticket #2020 - 3054</p>
                    </div>
                    <!-- date and actions  -->
                    <div class="date--and--actions">
                        <p class="date">03/04/2024 - 11:20 AM</p>
                        <div class="action">
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
                        </div>
                    </div>
                </div>
                <p class="message">Lorem ipsum dolor sit amet consectetur. Suscipit consequat eget orci ultricies sed lacus interdum aliquam at. Ut urna viverra nulla ut est quam et. Euismod volutpat habitasse ornare nisl ipsum. Non augue convallis sem magna aliquet ullamcorper massa....</p>
                <div class="moderator--area">
                    <!-- moderator  -->
                    <div class="moderator">
                        <img src="{{ asset('/admin/images/profile.png') }}" alt="">
                        <p>Max Musternann</p>
                    </div>
                    <p class="tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.8296 15.2998L15.2996 19.8298C13.4396 21.6898 10.4196 21.6898 8.54962 19.8298L4.15962 15.4398C2.29962 13.5798 2.29962 10.5598 4.15962 8.6898L8.69962 4.1698C9.64962 3.2198 10.9596 2.7098 12.2996 2.7798L17.2996 3.0198C19.2996 3.1098 20.8896 4.6998 20.9896 6.6898L21.2296 11.6898C21.2896 13.0398 20.7796 14.3498 19.8296 15.2998Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.5 12C13.1193 12 12 10.8807 12 9.5C12 8.11929 13.1193 7 14.5 7C15.8807 7 17 8.11929 17 9.5C17 10.8807 15.8807 12 14.5 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        My account breaks when I try to up...
                    </p>
                </div>
            </div>
            <!-- single card  -->
            <div class="ticket--post--card">
                <!-- top -->
                <div class="top">
                    <div class="ticket--info">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M19.5 3.67C19.5 3.66 19.5 3.65 19.48 3.64C19.26 3.36 18.97 3.21 18.63 3.21C18.1 3.21 17.46 3.56 16.77 4.3C15.95 5.18 14.69 5.11 13.97 4.15L12.96 2.81C12.56 2.27 12.03 2 11.5 2C10.97 2 10.44 2.27 10.04 2.81L9.02 4.16C8.31 5.11 7.06 5.18 6.24 4.31L6.23 4.3C5.1 3.09 4.09 2.91 3.52 3.64C3.5 3.65 3.5 3.66 3.5 3.67C3.14 4.44 3 5.52 3 7.04V16.96C3 18.48 3.14 19.56 3.5 20.33C3.5 20.34 3.51 20.36 3.52 20.37C4.1 21.09 5.1 20.91 6.23 19.7L6.24 19.69C7.06 18.82 8.31 18.89 9.02 19.84L10.04 21.19C10.44 21.73 10.97 22 11.5 22C12.03 22 12.56 21.73 12.96 21.19L13.97 19.85C14.69 18.89 15.95 18.82 16.77 19.7C17.46 20.44 18.1 20.79 18.63 20.79C18.97 20.79 19.26 20.65 19.48 20.37C19.49 20.36 19.5 20.34 19.5 20.33C19.86 19.56 20 18.48 20 16.96V7.04C20 5.52 19.86 4.44 19.5 3.67ZM14 14.5H8C7.59 14.5 7.25 14.16 7.25 13.75C7.25 13.34 7.59 13 8 13H14C14.41 13 14.75 13.34 14.75 13.75C14.75 14.16 14.41 14.5 14 14.5ZM16 11H8C7.59 11 7.25 10.66 7.25 10.25C7.25 9.84 7.59 9.5 8 9.5H16C16.41 9.5 16.75 9.84 16.75 10.25C16.75 10.66 16.41 11 16 11Z"
                                    fill="#04BAFF"
                                />
                            </svg>
                        </div>
                        <p>Ticket #2020 - 3054</p>
                    </div>
                    <!-- date and actions  -->
                    <div class="date--and--actions">
                        <p class="date">03/04/2024 - 11:20 AM</p>
                        <div class="action">
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
                        </div>
                    </div>
                </div>
                <p class="message">Lorem ipsum dolor sit amet consectetur. Suscipit consequat eget orci ultricies sed lacus interdum aliquam at. Ut urna viverra nulla ut est quam et. Euismod volutpat habitasse ornare nisl ipsum. Non augue convallis sem magna aliquet ullamcorper massa....</p>
                <div class="moderator--area">
                    <!-- moderator  -->
                    <div class="moderator">
                        <img src="{{ asset('/admin/images/profile.png') }}" alt="">
                        <p>Max Musternann</p>
                    </div>
                    <p class="tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.8296 15.2998L15.2996 19.8298C13.4396 21.6898 10.4196 21.6898 8.54962 19.8298L4.15962 15.4398C2.29962 13.5798 2.29962 10.5598 4.15962 8.6898L8.69962 4.1698C9.64962 3.2198 10.9596 2.7098 12.2996 2.7798L17.2996 3.0198C19.2996 3.1098 20.8896 4.6998 20.9896 6.6898L21.2296 11.6898C21.2896 13.0398 20.7796 14.3498 19.8296 15.2998Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.5 12C13.1193 12 12 10.8807 12 9.5C12 8.11929 13.1193 7 14.5 7C15.8807 7 17 8.11929 17 9.5C17 10.8807 15.8807 12 14.5 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        My account breaks when I try to up...
                    </p>
                </div>
            </div>
            <!-- single card  -->
            <div class="ticket--post--card">
                <!-- top -->
                <div class="top">
                    <div class="ticket--info">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M19.5 3.67C19.5 3.66 19.5 3.65 19.48 3.64C19.26 3.36 18.97 3.21 18.63 3.21C18.1 3.21 17.46 3.56 16.77 4.3C15.95 5.18 14.69 5.11 13.97 4.15L12.96 2.81C12.56 2.27 12.03 2 11.5 2C10.97 2 10.44 2.27 10.04 2.81L9.02 4.16C8.31 5.11 7.06 5.18 6.24 4.31L6.23 4.3C5.1 3.09 4.09 2.91 3.52 3.64C3.5 3.65 3.5 3.66 3.5 3.67C3.14 4.44 3 5.52 3 7.04V16.96C3 18.48 3.14 19.56 3.5 20.33C3.5 20.34 3.51 20.36 3.52 20.37C4.1 21.09 5.1 20.91 6.23 19.7L6.24 19.69C7.06 18.82 8.31 18.89 9.02 19.84L10.04 21.19C10.44 21.73 10.97 22 11.5 22C12.03 22 12.56 21.73 12.96 21.19L13.97 19.85C14.69 18.89 15.95 18.82 16.77 19.7C17.46 20.44 18.1 20.79 18.63 20.79C18.97 20.79 19.26 20.65 19.48 20.37C19.49 20.36 19.5 20.34 19.5 20.33C19.86 19.56 20 18.48 20 16.96V7.04C20 5.52 19.86 4.44 19.5 3.67ZM14 14.5H8C7.59 14.5 7.25 14.16 7.25 13.75C7.25 13.34 7.59 13 8 13H14C14.41 13 14.75 13.34 14.75 13.75C14.75 14.16 14.41 14.5 14 14.5ZM16 11H8C7.59 11 7.25 10.66 7.25 10.25C7.25 9.84 7.59 9.5 8 9.5H16C16.41 9.5 16.75 9.84 16.75 10.25C16.75 10.66 16.41 11 16 11Z"
                                    fill="#04BAFF"
                                />
                            </svg>
                        </div>
                        <p>Ticket #2020 - 3054</p>
                    </div>
                    <!-- date and actions  -->
                    <div class="date--and--actions">
                        <p class="date">03/04/2024 - 11:20 AM</p>
                        <div class="action">
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
                        </div>
                    </div>
                </div>
                <p class="message">Lorem ipsum dolor sit amet consectetur. Suscipit consequat eget orci ultricies sed lacus interdum aliquam at. Ut urna viverra nulla ut est quam et. Euismod volutpat habitasse ornare nisl ipsum. Non augue convallis sem magna aliquet ullamcorper massa....</p>
                <div class="moderator--area">
                    <!-- moderator  -->
                    <div class="moderator">
                        <img src="{{ asset('/admin/images/profile.png') }}" alt="">
                        <p>Max Musternann</p>
                    </div>
                    <p class="tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.8296 15.2998L15.2996 19.8298C13.4396 21.6898 10.4196 21.6898 8.54962 19.8298L4.15962 15.4398C2.29962 13.5798 2.29962 10.5598 4.15962 8.6898L8.69962 4.1698C9.64962 3.2198 10.9596 2.7098 12.2996 2.7798L17.2996 3.0198C19.2996 3.1098 20.8896 4.6998 20.9896 6.6898L21.2296 11.6898C21.2896 13.0398 20.7796 14.3498 19.8296 15.2998Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.5 12C13.1193 12 12 10.8807 12 9.5C12 8.11929 13.1193 7 14.5 7C15.8807 7 17 8.11929 17 9.5C17 10.8807 15.8807 12 14.5 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        My account breaks when I try to up...
                    </p>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
