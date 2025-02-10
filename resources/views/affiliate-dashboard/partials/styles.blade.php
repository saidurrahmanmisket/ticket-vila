{{-- Dropify CDN --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>

<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/boxicons/css/boxicons.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/owl.carousel.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/nice-select.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/apexcharts.min.css') }}"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/helper.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/responsive.css') }}"/>


<style>
    .nice-select {
        margin-bottom: 0px !important;
        padding-top: 0px !important;
    }

    .nice-select:after {
        display: none !important;
    }

    .profile--area.main-section-margin {
        margin-top: 30px;
    }

    .users--table--wrapper.campaign th:nth-child(1),
    .users--table--wrapper.campaign th:nth-child(2),
    .users--table--wrapper.campaign th:nth-child(3),
    .users--table--wrapper.campaign th:nth-child(4) {
        width: auto;
    }

    .select .nice-select .current {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar {
        overflow: scroll !important;
        -ms-overflow-style: none !important;
        scrollbar-width: none !important;
    }

    .sidebar::-webkit-scrollbar {
        display: none !important;
    }

    .sidebar .logout {
        position: static;
    }




    .sidebar-logo-container {
    position: sticky;
    top: -40px;
    left: 0;
    width: 100%;
    height: fit-content;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #010c0f;
    padding: 10px 0px;
    z-index: 50;
}
    .sidebar--logo {
        background-color: var(--sidebar-color) !important;
        display:block;
    }

    .sidebar .sidebar--logo {
    padding-left: 0px;
}

    .sidebar--logo img{
        width: 120px;
        height: 70px;
        object-fit: contain;
    }

    .sub-item {
        margin-left: -17px !important;
        padding-left: 93px !important;
    }

    span.current {
        display: block;
        padding-top: 7px;
    }

    .required:after {
        content: "*";
        position: relative;
        font-size: inherit;
        color: rgba(var(--bs-danger-rgb)) !important;
        padding-left: 0.15rem;
        font-weight: 600;
    }

    .accordion-button:not(.collapsed) {
        background-color: transparent !important;
    }

    .accordion-button .bi-chevron-down {
        transform: rotate(-90deg);
        transition: transform 0.3s;
    }

    .accordion-button.collapsed .bi-chevron-down {
        transform: rotate(0deg);
    }

    li .sub--menu--title {
        font-size: 15px !important;
    }

    .accordion-body ul {
        margin: 10px 0 10px 0;
        padding-left: 37px;
    }

    .sidebar ul li .accordion-body ul li a {
        padding: 10px 52px;
    }

    .sidebar--logo {
        z-index: 999 !important;
    }

    .accordion-header .accordion--header-text {
        flex-grow: 1;
        font-size: 18px;
        font-weight: 500;
    }

    .accordion-header .accordion-button.active .accordion--header-text {
        color: #ffffff;
    }

    .sidebar ul li .accordion-body ul li a:hover, .sidebar ul li .accordion-body ul li a.sub--active {
        color: #ffffff;
    }
    .references {
        margin-top: 2rem;
        font-size: 0.75rem;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
    }

    .references a {
        text-decoration: none;
        text-align: left;
    }
</style>

{{--Customize Style CSS--}}
<style>
    .ticket--single .ticket--and--name {
        gap: 32px;
        position: relative;
        min-width: 520px;
    }

    .action--btn {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        gap: 10px;
        padding: 10px 26px;
        border: 2px solid #f2f2f2;
        border-radius: 60px;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        color: var(--heading-color);
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .ticket--single .payment--and--actions {
        gap: 166px;
        position: relative;
    }

    .payment--informations {
        min-width: 365px;
    }

    .common--pair--text {
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        color: var(--para-color);
    }

    .common--pair--text span {
        font-size: 15px;
        line-height: 26px;
    }

    .action--btns {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        gap: 10px;
        padding: 10px 13px;
        border: 2px solid #f2f2f2;
        border-radius: 60px;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        color: var(--heading-color);
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    @media only screen and (min-width: 1440px) and (max-width: 1599px) {
        .ticket--single .payment--and--actions {
            gap: 50px;
            position: relative;
        }
    }

    /*for mobile hambarger start */

    .hamburger-menu span.current {
        display: block;
        padding-top: 0px;
    }

    /*for mobile hambarger end */
</style>

{{---Sweet Alert 2 CSS---}}
<style>
    .swal2-icon.swal2-error.swal2-icon-show {
        margin: 0 auto;
        margin-top: 30px;
    }
</style>
@stack('style')

