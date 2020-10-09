<?php  
    session_start();
    if(!isset($_SESSION["enquiry_id"])){
        header("Location: /");
    }  
?>
<!doctype html>
<html lang="en-GB" class="no-js">
    <head>
        <meta charset="UTF-8">
        <title>Details Received</title>
        <meta name="description" content="  "> 

        <?php include "partials/head.php" ?>
         
        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '212428966840264');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=212428966840264&ev=PageView&noscript=1"
        /></noscript>
            <!-- End Facebook Pixel Code -->
        <script>
            fbq('track', 'Lead');
        </script>

    </head>
    <body class="thankyou-body"> 


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZ8XVZ8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

        <!-- header --> 
        <?php include "partials/header.php" ?>
        <!-- /header -->

        <main role="main">
            <div class='page-main-content'  data-page="thankyou-page"> 
                <section class="hero-slim">   
                    <div class='container'>
                        <div class="row">
                            <div class="col-12">
                                <div class="inner-hero-slim">
                                    <div class="slim-hero-text">
                                        <h1>Thank you <span class="capitalise"><?php echo $_SESSION["name"]; ?></span></h1>
                                        <p class="thanks-tagline">
                                            We have now received all your details and will be in touch soon to discuss.
                                        </p>
                                        <!-- <p class="explain-tagline"> In order for us to better understand how we can help you, please complete the form below:</p>  -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>   
 
            </div>
        </main> 
        <!-- footer -->
        <?php include "partials/footer.php" ?>
        <!-- /footer -->  
        <script src="/dist/js/main.js"></script>  
    </body>  
</html>
