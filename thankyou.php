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
  <title>Thank you</title>
  <meta name="description" content="  ">

  <?php include "partials/head.php" ?>

  <?php /*
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
            */
            ?>
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
  fbq('init', '656543581934778');
  fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=656543581934778&ev=PageView&noscript=1" /></noscript>
  <!-- End Facebook Pixel Code -->

  <script>
  fbq('track', 'Lead');
  </script>
  <!-- Event snippet for Submit lead form conversion page -->

  <!-- GOOGLE CONVERSION TRACKING CODE-->
  <script>
  gtag('event', 'conversion', {
    'send_to': 'AW-595277874/_ywYCJLcx90BELLw7JsC'
  });
  </script>
  <!-- END GOOGLE CONVERSION TRACKING CODE-->



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
    <div class='page-main-content' data-page="thankyou-page">
      <section class="hero-slim">
        <div class='container'>
          <div class="row">
            <div class="col-12">
              <div class="inner-hero-slim">
                <div class="slim-hero-text">
                  <h1>One more thing, <span class="capitalise"><?php echo $_SESSION["name"]; ?></span></h1>
                  <p class="thanks-tagline">
                    We have received your enquiry.
                  </p>
                  <p class="explain-tagline">
                    In order for us to better understand how we can help you, please complete the form below:
                  </p>
                  <a class="cta cta-primary cta-prep-form">Preperation Form</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <!-- <section class='clients'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-12'>
                                <div class="inner-clients">
                                    <div class="clients-title">
                                        <p>
                                            OUR HAPPY CLIENTS
                                        </p> 
                                    </div>
                                    <div class="clients-slider">
                                        <div class="client-item">
                                            <img src="/assets/img/logo.png" />
                                        </div>
                                        <div class="client-item">
                                            <img src="/assets/img/logo.png" />
                                        </div>
                                        <div class="client-item">
                                            <img src="/assets/img/logo.png" />
                                        </div>
                                        <div class="client-item">
                                            <img src="/assets/img/logo.png" />
                                        </div>
                                        <div class="client-item">
                                            <img src="/assets/img/logo.png" />
                                        </div>
                                        <div class="client-item">
                                            <img src="/assets/img/logo.png" />
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>  
                    </div>
                </section>  -->

      <section class='prep-form'>
        <div class='container'>
          <div class='row'>
            <div class='col-12 col-md-4'>
              <div class="prep-form-info">
                <div class="enquiry-prep-text">
                  <h3>Enquiry Preperation Form</h3>
                  <p>Complete this handy enquiry prep form, so we can get a few details ready for our initial meeting.
                  </p>
                </div>
                <div class="alt-call">
                  <h3>Get In Touch</h3>
                  <p>Alternatively feel free to get in touch directly to discuss the details.</p>
                  <p class="call-cta">
                    <span>Call us on:</span>
                    <a href="tel:+447597851249">+44 7597 851249</a>
                  </p>
                </div>
              </div>

            </div>
            <div class='col-12 col-md-8'>
              <div class="prep-form-container">
                <form id="prep-form">
                  <input type="hidden" id="enquiry_id" value="<?php echo $_SESSION["enquiry_id"]; ?>" />
                  <h4>Enquiry Preparation</h4>
                  <p>Please complete as much information as possible, so we can handle your enquiry efficiently.</p>
                  <div class="form-group">
                    <label>Company name</label>
                    <input type="text" name="company" id="company" placeholder="Company Name" />
                  </div>
                  <div class="form-group">
                    <label>Industry / Sector</label>
                    <input type="text" name="industry" id="industry" placeholder="Industry / sector" />
                  </div>
                  <div class="form-group">
                    <label>Company Location</label>
                    <input type="text" name="location" id="location" placeholder="Location" />
                  </div>
                  <div class="form-group">
                    <label>Role Title</label>
                    <input type="text" name="role" id="role" placeholder="Role" />
                  </div>
                  <div class="form-group">
                    <label>Basic Salary</label>
                    <input type="text" name="salary" id="salary" placeholder="Salary" />
                  </div>
                  <button class="cta cta-primary submit-prep-form">Submit</button>
                </form>

              </div>
              <p class="form-explain">*For guidelines on how to complete the preparation form, please see the <a
                  href="#">preparation form notes</a> below.</p>
            </div>
          </div>
        </div>
      </section>
      <section class='half-half-section'>
        <div class='container'>
          <div class='row'>
            <div class='col-12 col-md-5'>
              <div class="half-img prep-img">
                <div style='background-image: url("/assets/img/prep/prep-img2.jpg")'></div>
              </div>
            </div>
            <div class='col-12 col-md-7'>
              <div class="half-content prep-content">
                <div class="inner-prep-content">
                  <h2>How To Prepare</h2>
                  <p>
                    We'll be in touch shortly to discuss your enquiry, so it's best to prepare a few things in advance.
                    For us to deliver our <b class="gold"><i>"100% satisfaction guarantee"</i></b> service we'll need a
                    few key pieces of information about your business and the role itself.
                    <br /> <br />
                    If you've got time. please see below for our typical fact finding questions that get us started.
                  </p>
                  <ul>
                    <li>Point of Contact</li>
                    <li>Role Title</li>
                    <li>Company Name</li>
                    <li>Basic Salary</li>
                    <li>Industry / Sector</li>
                    <li>Benefits Package </li>
                    <li>Company Location</li>
                    <li>Working Patterns</li>
                  </ul>
                  <p>If you've got time, why not complete our <b><i>meeting preparation form</i></b> so we can come
                    prepared also.</p>
                  <a class="cta cta-primary cta-prep-form">Preperation Form</a>
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