
<link rel="stylesheet" type="text/css" href="https://ticketvilla-admin.netlify.app/assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://ticketvilla-admin.netlify.app/assets/icon/boxicons/css/boxicons.min.css" />
<link rel="stylesheet" type="text/css" href="https://ticketvilla-admin.netlify.app/assets/css/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="https://ticketvilla-admin.netlify.app/assets/css/nice-select.min.css" />
<link rel="stylesheet" type="text/css" href="https://ticketvilla-admin.netlify.app/assets/css/apexcharts.min.css" />
<link rel="stylesheet" type="text/css" href="https://ticketvilla-admin.netlify.app/assets/css/helper.css" />
<link rel="stylesheet" type="text/css" href="https://ticketvilla-admin.netlify.app/assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="https://ticketvilla-admin.netlify.app/assets/css/responsive.css" />

<script>
    // We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/dkremsz8'
    (function () {
        var w = window;
        var ic = w.Intercom;
        if (typeof ic === "function") {
            ic('reattach_activator');
            ic('update', w.intercomSettings);
        } else {
            var d = document;
            var i = function () {
                i.c(arguments);
            };
            i.q = [];
            i.c = function (args) {
                i.q.push(args);
            };
            w.Intercom = i;
            var l = function () {
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
<script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script>
    Weglot.initialize({
        api_key: 'wg_dd3db602f930ad509000a13c0c89cd593'
    });
</script>
<!-- Intercom -->
@php
    $user = Auth::user();
@endphp
<script>
    window.intercomSettings = {
        api_base: "https://api-iam.intercom.io",
        app_id: "dkremsz8",
        user_id: "{{ $user ? $user->id : '0' }}", // IMPORTANT: Replace "user.id" with the variable you use to capture the user's ID
        name: "{{ $user ? $user->first_name.' '.$user->last_name : 'Guest' }}", // IMPORTANT: Replace "user.name" with the variable you use to capture the user's name
        email: "{{ $user ? $user->email : 'guest@gmail.com' }}", // IMPORTANT: Replace "user.email" with the variable you use to capture the user's email address
        created_at: "{{ $user ? $user->created_at : '' }}", // IMPORTANT: Replace "user.createdAt" with the variable you use to capture the user's sign-up date
    };
</script>
<!-- Meta Pixel Code -->
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '426725466924864');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=426725466924864&ev=PageView&noscript=1"
    /></noscript>
<!-- End Meta Pixel Code -->

<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=426725466924864&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->
<style>

    /* user dashboard has not any css for upload here is custom */
    .upload--wrapper {
        min-width: 220px;
        min-height: 220px;
        max-width: 220px;
        max-height: 220px;
        position: relative;
    }

    .upload--wrapper label {
        position: absolute;
        bottom: 14px;
        right: 10px;
        height: 42px;
        width: 42px;
        border-radius: 50%;
        background-color: var(--sky-blue);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        border: 4px solid var(--white);
        cursor: pointer;
    }
    .upload--wrapper .preview--img img{

        width: 220px;
    height: 220px;
    border-radius: 50%;
    }

    /* fix header dropdown issue  */
    .notification--and--profile .form-select {
        --bs-form-select-bg-img : url('') !important;
    }

    .cursor--pointer{
            cursor: pointer;
        }
</style>


@stack('style')
