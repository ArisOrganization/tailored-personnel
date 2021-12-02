<?php
session_start();
?>
<!doctype html>
<html lang="en-GB" class="no-js">

<head>
    <meta charset="UTF-8">

    <title>Tailored Personel</title>
    <meta name="description" content="A totally bespoke and tailored talent acquisition service.">
    <?php include "partials/head.php" ?>


    <style>
        .body-privacy {
            margin-top: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .txct {
            text-align: left;

        }
    </style>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
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
        fbq('init', '212428966840264');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=212428966840264&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <script>
        fbq('track', 'ViewContent');
    </script>
</head>

<body class="body">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZ8XVZ8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- header -->
    <?php include "partials/header.php" ?>
    <!-- /header -->
    <main class="body-privacy px-5 pb-5" role="main">

        <h2 class="mt-2">
            Cookie Policy
        </h2>

        <h5>This site uses cookies – small text files that are placed on your machine to
            help the site provide a better user experience. In general, cookies are used
            to retain user preferences, store information for things like shopping
            baskets, and provide anonymised tracking data to third party applications
            like Google Analytics. As a rule, cookies will make your browsing
            experience better. However, you may prefer to disable cookies on this site
            and on others. The most effective way to do this is to disable cookies in
            your browser. We suggest consulting the Help section of your browser or
            taking a look at <a target="_blank" href="https://www.aboutcookies.org/">https://www.aboutcookies.org/</a> which offers guidance for all
            modern browsers

        </h5>




    </main>
    <!-- footer -->
    <?php include "partials/footer.php" ?>
    <!-- /footer -->
    <script src=" /dist/js/main.js">
    </script>
</body>

</html>