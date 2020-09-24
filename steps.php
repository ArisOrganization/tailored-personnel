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
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=212428966840264&ev=PageView&noscript=1" /></noscript>
  <!-- End Facebook Pixel Code -->
  <script>
  fbq('track', 'ViewContent');
  </script>
</head>

<body class="body">
  <!-- header -->
  <?php include "partials/header.php" ?>
  <!-- /header -->
  <main role="main">
    <div class="page-main-content">
      <section>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="steps-form-container">
                <div class="steps-form-container-inner">
                  <h1>Complete four simple steps to find your next top employee.</h1>
                  <div class="steps-progress">
                    <div class="single-step step-completed">
                      <div class="step-number">
                        <p>1</p>
                      </div>
                      <p>Bussines Info</p>
                    </div>
                    <div class="single-step">
                      <div class="step-number">
                        <p>2</p>
                      </div>
                      <p>Salary</p>
                    </div>
                    <div class="single-step">
                      <div class="step-number">
                        <p>3</p>
                      </div>
                      <p>Location</p>
                    </div>
                    <div class="single-step">
                      <div class="step-number">
                        <p>4</p>
                      </div>
                      <p>Business Contact</p>
                    </div>
                  </div>
                </div>

                <form class='steps-form'>
                  <div class="form-step step-1 step-current ">
                    <div class="step-title">
                      <p>Step 1 - Role You are recruiting for</p>
                      <p class="step-req">
                        Please provide information regarding the position your company is recruiting for.
                      </p>
                    </div>
                    <div class="form-fields">
                      <fieldset>
                        <label>Sector:</label>
                        <input type="text" name="sector" id="sector" placeholder="Business Sector">
                      </fieldset>
                      <fieldset>
                        <label>Role Title:</label>
                        <input type="text" name="role" id="role" placeholder="Position / Role">
                      </fieldset>
                    </div>
                    <button class="cta cta-primary">NEXT</button>
                  </div>


                  <div class="form-button-container submit-container " style="display: none">
                    <button class="form-button form-submit">Find Top Talent Now </button>
                  </div>
                </form>
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