<!-- favicon -->
<link rel="shortcut icon" href="{{ asset('frontend/images/logo.svg') }}" type="image/x-icon" />

<!-- ==== All Css Links ==== -->
<link rel="stylesheet" type="text/css" href="https://ticket-villa.netlify.app/assets/css/plugins/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://ticket-villa.netlify.app/assets/css/plugins/aos.css" />
<link rel="stylesheet" type="text/css" href="https://ticket-villa.netlify.app/assets/css/plugins/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://ticket-villa.netlify.app/assets/css/plugins/magnific-popup.min.css" />
<link rel="stylesheet" type="text/css" href="https://ticket-villa.netlify.app/assets/css/plugins/nice-select.min.css" />

<!-- All custom CSS Links -->
<link rel="stylesheet" type="text/css" href="https://ticket-villa.netlify.app/assets/css/helper.css" />
<link rel="stylesheet" type="text/css" href="https://ticket-villa.netlify.app/assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="https://ticket-villa.netlify.app/assets/css/responsive.css" />

{{-- custom css --}}
<style>
    /* expose  styles  */
    :root{
        --orange: #fc9719;
    }
    .expose--box ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        margin-top: 35px;
    }

    .expose--box ul li a {
        padding: 22px;
        width: 325px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        background: -webkit-gradient(linear,
                left top,
                right top,
                from(rgba(239, 159, 60, 0.15)),
                to(rgba(255, 210, 135, 0.15)));
        background: -o-linear-gradient(left,
                rgba(239, 159, 60, 0.15) 0%,
                rgba(255, 210, 135, 0.15) 100%);
        background: linear-gradient(90deg,
                rgba(239, 159, 60, 0.15) 0%,
                rgba(255, 210, 135, 0.15) 100%);
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        color: var(--orange);
        border-radius: 60px;
        gap: 10px;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .expose--box ul li a svg {
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .expose--box ul li a:hover svg {
        -webkit-transform: rotate(40deg);
        -ms-transform: rotate(40deg);
        transform: rotate(40deg);
    }

    .helping--hand--box {
        padding: 70px 40px 56px;
    }

    .helping--hand--box img {
        width: 827px;
        height: 374px;
    }

    .helping--hand--box h3 {
        width: 410px;
        font-size: 36px;
        font-weight: 600;
        margin: 70px auto 50px;
        text-align: center;
    }

    .helping--hand--box ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        gap: 32px;
    }

    .helping--hand--box li a.user--common--btn {
        padding: 22px;
        width: 282px;
        background-color: var(--sidebar-color);
        text-align: center;
        border-width: 2px;
    }

    .helping--hand--box li a.user--common--btn:hover {
        border-color: var(--sidebar-color);
        background-color: transparent;
        color: var(--sidebar-color);
    }
    .cursor--pointer{
            cursor: pointer;
        }

    /* expose  styles end */


    /* faq numbering  styles start */
    .faq--area--content .accordion .accordion-button::before{
        display: none
    }
    /* expose  styles end */
</style>
