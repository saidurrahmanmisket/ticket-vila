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



<!-- Hotjar Tracking Code for Site 4998564 (name missing) -->
<script>
    (function(h, o, t, j, a, r) {
        h.hj = h.hj || function() {
            (h.hj.q = h.hj.q || []).push(arguments)
        };
        h._hjSettings = {
            hjid: 4998564,
            hjsv: 6
        };
        a = o.getElementsByTagName('head')[0];
        r = o.createElement('script');
        r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5QHWEZJLXC"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-5QHWEZJLXC');
</script>

<script>
    // We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/dkremsz8'
    (function() {
        var w = window;
        var ic = w.Intercom;
        if (typeof ic === "function") {
            ic('reattach_activator');
            ic('update', w.intercomSettings);
        } else {
            var d = document;
            var i = function() {
                i.c(arguments);
            };
            i.q = [];
            i.c = function(args) {
                i.q.push(args);
            };
            w.Intercom = i;
            var l = function() {
                var s = d.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = 'https://widget.intercom.io/widget/dkremsz8';
                var x = d.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            };
            if (document.readyState === 'complete') {
                l();
            } else if (w.attachEvent) {
                w.attachEvent('onload', l);
            } else {
                w.addEventListener('load', l, false);
            }
        }
    })();
</script>
<!-- weglot API -->
{{--<script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>--}}
{{--<script>--}}
{{--    Weglot.initialize({--}}
{{--        api_key: 'wg_dd3db602f930ad509000a13c0c89cd593'--}}
{{--    });--}}
{{--</script>--}}
<!-- Intercom -->
<script>
    @if(Auth::check())
    let user = @json(Auth::user())
        window.intercomSettings = {
        api_base: "https://api-iam.intercom.io",
        app_id: "dkremsz8",
        user_id: user?.id, // IMPORTANT: Replace "user.id" with the variable you use to capture the user's ID
        name: user?.first_name + ' ' + user?.list_name, // IMPORTANT: Replace "user.name" with the variable you use to capture the user's name
        email: user?.email, // IMPORTANT: Replace "user.email" with the variable you use to capture the user's email address
        created_at: user?.created_at, // IMPORTANT: Replace "user.createdAt" with the variable you use to capture the user's sign-up date
    };
    @else
    function getGuestID() {
        let guestID = localStorage.getItem('guestID')
        if (!guestID) {
            guestID = 'guest_{{request()->ip()}}' + Math.random().toString(36).substr(2, 9);
            localStorage.setItem('guestID', guestID)
        }
        return guestID;
    }
    window.intercomSettings = {
        api_base: "https://api-iam.intercom.io",
        app_id: "dkremsz8",
        user_id: getGuestID(), // IMPORTANT: Replace "user.id" with the variable you use to capture the user's ID
        name: 'Guest', // IMPORTANT: Replace "user.name" with the variable you use to capture the user's name
        created_at: Math.floor(Date.now() / 1000),
        custom_attributes: {
            guest: true
        }
    };
    @endif

</script>
{{-- custom css --}}

<!-- Meta Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '426725466924864');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=426725466924864&ev=PageView&noscript=1"
    /></noscript>
<!-- End Meta Pixel Code -->

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=426725466924864&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->


<style>
    /* expose  styles  */
    :root {
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

    .cursor--pointer {
        cursor: pointer;
    }

    /* expose  styles end */


    /* faq numbering  styles start */
    .faq--area--content .accordion .accordion-button::before {
        display: none
    }

    /* expose  styles end */



    /* updated styles */
    .language-dropdown .lang--icon {
        display: none;
    }

    .header--content--wrapper .button--area .profile.btn--fill {
        gap: 6px;
        width: 35px;
        height: 35px;
        padding: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .profile.btn--fill span{
        display: none;
    }

    .header--content--wrapper .button--area {

    gap: 12px;
}

.form-select {

    padding: .375rem 0.25rem .375rem .75rem;

}



    /* updated styles */


    /* updated styles header */


    @media only screen and (min-width:992px) and (max-width:1199px) {

    }



    @media only screen and (min-width: 320px) and (max-width: 479px) {


        .header--content--wrapper .button--area .profile.btn--fill {
            padding: 0px;
            background: transparent;
        }

        .profile.btn--fill span {
            display: none;

        }

        .language-dropdown .form-select {
            width: 40px;
            --bs-form-select-bg-img: none;
            background: transparent;
            z-index: 30;
            position: relative;
            border: none;
            padding: .375rem 2.25rem .375rem .75rem;
        }



        .language-dropdown {
            position: relative;
        }

        .language-dropdown .lang--icon {
            display: flex;
            width: 20px;
            height: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            z-index: 1010;
        }



        .language-dropdown .lang--icon svg {
            width: 100%;
            height: 100%;
        }

        .header--content--wrapper .button--area {
            gap: 12px;
        }

    }

    /* updated styles header */

    /* updated styles house image start*/
    .house--tour--area--wrapper .modal-content {
        background: transparent !important;
        border: none
    }
    .house--tour--area--wrapper .modal-body img{
        width: 100%;
    }

    .house--image--grid--wrapper .modal-content {
        background: transparent !important;
        border: none
    }
    .house--image--grid--wrapper .modal-body img{
        width: 100%;
    }
    /* updated styles house image end */

</style>

{{--Promotional Banner CSS --}}
<style>
    .promotion-banner img {
        width: 100%;
        height: auto;
        border-radius: 25px;
    }

    .promotion-banner {
        width: 100%;
        max-height: 500px;
        margin-top: -50px;
        margin-bottom: 70px;
    }

    .mobile .promotion-banner {
        display: none;
    }
    .hero-buy-btn {
        margin-top: -226px;
    }

    @media only screen and (min-width: 1601px) and (max-width: 1800px) {
        .hero-buy-btn {
            margin-top: -132px;
        }
    }

    /* large laptop devices */
    @media only screen and (min-width: 1366px) and (max-width: 1600px) {
        .hero-buy-btn {
            margin-top: -150px;
        }
    }

    /* laptop devices */
    @media only screen and (min-width: 1200px) and (max-width: 1365px) {
        .promotion-banner {
            margin-top: -30px;
            margin-bottom: 50px;
        }

        .hero-buy-btn {
            margin-top: -80px;
        }
    }

    /* large tablet devices */
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .promotion-banner {
            margin-top: -30px;
            margin-bottom: 50px;
        }

        .hero-buy-btn {
            margin-top: -80px;
        }
    }

    /* medium tablet devices */
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .promotion-banner {
            margin-top: -30px;
            margin-bottom: 40px;
        }

        .hero-buy-btn {
            margin-top: -80px;
        }
    }

    /* small tablet devices */
    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .promotion-banner {
            margin-top: -30px;
            margin-bottom: 40px;
        }

        .hero-buy-btn {
            margin-top: -80px;
        }
    }

    /* large mobile devices */
    @media only screen and (min-width: 480px) and (max-width: 575px) {
        .desktop .promotion-banner {
            display: none;
            margin-top: -20px;
            margin-bottom: 50px;
        }

        .mobile .promotion-banner {
            display: block;
            margin-top: -30px;
            margin-bottom: 40px;
            height: auto !important;
            max-height: none !important;
        }
        .hero-buy-btn {
            margin-top: -80px;
        }
    }

    /* mobile devices */
    @media only screen and (min-width: 200px) and (max-width: 479px) {
        .desktop .promotion-banner {
            display: none;
        }

        .mobile .promotion-banner {
            display: block;
            margin-top: -30px;
            height: auto !important;
            max-height: none !important;
            margin-bottom: 40px;
        }
        .hero-buy-btn {
            margin-top: -80px;
        }
    }

</style>
{{--Required CSS--}}
<style>
    .required:after {
        content: "*";
        position: relative;
        font-size: inherit;
        color: rgba(var(--bs-danger-rgb)) !important;
        padding-left: 0.15rem;
        font-weight: 600;
    }
</style>

@stack('style')
