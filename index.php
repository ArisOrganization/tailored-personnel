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
  <main role="main">
    <div class='page-main-content' data-page="lead-page">

      <section class='hero'>
        <div class='container'>
          <div class='row'>
            <div class='col-12'>
              <div class="hero-header" data-aos="fade-up" data-aos-duration="800">
                <div class="hero-header-content">
                  <div class="title-container">
                    <h1 class='align-center'>Market Leading Talent Acquisition</h1>
                    <p>Find your next top employee</p>
                  </div>
                  <ul>
                    <li>Low recruitment fees - Only 8% commission </li>
                    <li>Dedicated recruitment representative</li>
                    <li>In-house meeting to map out your specific needs</li>
                    <li>Don’t pay any fees until we find you a new employee</li>
                  </ul>

                  <a href='/steps.php' class="cta cta-primary ">Find Your Next Employee Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class='process'>
        <div class='container'>
          <div class='row'>
            <div class='col-12'>
              <div>
                <h2>How we find you top talent</h2>
              </div>
              <div class="inner-process">
                <div class="process-item">
                  <img src="/assets/icons/process/facetoface.svg" />
                  <p>We Meet You Face to Face</p>
                </div>
                <div class="process-item">
                  <img src="/assets/icons/process/professional.svg" />
                  <p>Candidate / Client Profiling</p>
                </div>
                <div class="process-item">
                  <img src="/assets/icons/process/recruitment.svg" />
                  <p>History, References & Pre-screening</p>
                </div>
                <div class="process-item">
                  <img src="/assets/icons/process/candidate.svg" />
                  <p>CV Reviewed</p>
                </div>
                <div class="process-item">
                  <img src="/assets/icons/process/interview.svg" />
                  <p>Introduction & Interview </p>
                </div>
              </div>
              <div>
                <button class="cta top-scroller big-cta cta-primary">Enquire Now</button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class='clients'>
        <div class='container'>
          <div class='row'>
            <div class='col-12'>
              <div class="inner-clients">
                <div class="clients-title">
                  <p>
                    OUR HAPPY <br /> CLIENTS
                  </p>
                </div>
                <div class="clients-slider">
                  <div class="client-item">
                    <img src="/assets/img/logos/allay.svg" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/clickcarloans.svg" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/luks.png" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/airfair.png" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/bl.jpg" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/clickdrive.png" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/debt.png" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/nfg.png" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/purple-logo.png" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/smooth.png" />
                  </div>
                  <div class="client-item">
                    <img src="/assets/img/logos/tgg.jpg" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class='choosing'>
        <div class='container'>
          <div class='row'>
            <div class='col-12 '>
              <p class="tagline">Choosing Tailored Personnel </p>
              <h2>A Fully Bespoke Tailored Service</h2>
            </div>
            <div class='col-12 col-md-6'>
              <div class="chose-content">
                <div class="inner-chose-content">
                  <h4 class="thin">Competitive fee for Tailored Service</h4>
                  <p>
                    The industry standard is 15%. Tailored personnel operate on 8% commission, offering our one of a
                    kind, totally bespoke talent acquisition service that guarantees we find you the right person for
                    the job.
                  </p>
                </div>
              </div>
            </div>
            <div class='col-12 col-md-6'>
              <div class="chose-content">
                <div class="inner-chose-content">
                  <h4 class="thin">Fast, Effficent, Effective</h4>
                  <p>
                    We aim to deliver candidates within 14 days. Once approved we push through the application to
                    completion, all while ensuring highest quality service to you and your new employee.
                  </p>
                </div>
              </div>
            </div>
            <div class='col-12 col-md-6'>
              <div class="chose-content">
                <div class="inner-chose-content">
                  <h4 class="thin">A dedicated specialist</h4>
                  <p>Your specialist recruiter is assigned to your business as your point of contact from start to
                    finish, always available to discuss new developments. </p>
                </div>
              </div>
            </div>
            <div class='col-12 col-md-6'>
              <div class="chose-content">
                <div class="inner-chose-content">
                  <h4 class="thin">Acquisition & Retention</h4>
                  <p>Our specific process that includes, pre screening and a 5 stage recruitment process ensures that we
                    fulfill your requirements to your exact specification, making sure you only acquire and retain the
                    talent you need for business success.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class='roles'>
        <div class='container'>
          <div class='row'>
            <div class='col-12 col-md-7'>
              <div class="roles-content">
                <h3 class="thin"><span class="thick "> All Sectors</span>, All Levels</h3>
                <p>
                  Whether you are looking to hire a senior executive through to a junior role, we put our team to work
                  to help you find the right person for the job. We cover all business sectors providing you bespoke
                  staff for your companies needs.
                  <br />
                  <br />
                  Typical roles we recruit for include:
                </p>
                <ul>
                  <li>Senior Management</li>
                  <li>Marketing/business development</li>
                  <li>Accounting/finance</li>
                  <li>IT/software development</li>
                  <li>Sales/Administration</li>
                </ul>
                <p><a class="cta top-scroller big-cta cta-primary">Enquire Now</a></p>
              </div>
            </div>
            <div class='col-12 col-md-5'>
              <div class="image-container">
                <div data-aos="fade-up" data-delay="0" style="background-image: url('assets/img/roles/manager.jpg');">
                </div>
                <div data-aos="fade-up" data-delay="0" style="background-image: url('assets/img/roles/artist.jpg');">
                </div>
                <div data-aos="fade-up" data-delay="0" style="background-image: url('assets/img/roles/engineer.jpg');">
                </div>
                <!-- <img src="/assets/img/hero-bg1.jpg" alt="Overlapping Image"/> -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class='faqs'>
        <div class='container'>
          <div class='row'>
            <div class='col-12'>
              <div class="faq-title-container">
                <h4>Frequently Asked Questions</h4>
                <p>
                  There's alot of information to take in when
                  embarking on a search for new staff,
                  so we've put together a list of FAQ's in one handy place for you.
                </p>
              </div>
              <div class="faq-content-container">
                <div class="faq-item">
                  <p class="faq-q">What is the recruitment process?</p>
                  <p class="faq-a">
                    The recruitment process is made up of several stages; including identifying, attracting,
                    shortlisting, interviewing, hiring and onboarding candidates. The recruitment process can be
                    time-consuming (something that recruitment agencies can help with), and many companies choose to
                    create an effective recruitment strategy to help them plan their hiring in the short-term and
                    long-term.
                  </p>
                </div>
                <div class="faq-item">
                  <p class="faq-q">What is your recruitment agency fee structure?</p>
                  <p class="faq-a">
                    Our recruitment fee structure depends on the type of hire you are looking to make. These include
                    permanent hiring fees and a range of other recruitment services. We also offer a flexible
                    recruitment pricing structure depending on whether you are looking to make a one-off hire or
                    multiple hires. If you would like to find out more about our recruitment agency fees, please get in
                    touch today on .
                  </p>
                </div>
                <div class="faq-item">
                  <p class="faq-q">
                    Do recruitment agencies charge candidates?
                  </p>
                  <p class="faq-a">
                    Recruitment agencies do not usually charge candidates, but charge the employer a fee. This is
                    typically a percentage of the annual salary for the job role once a successful candidate has been
                    placed.
                  </p>
                </div>
                <div class="faq-item">
                  <p class="faq-q">
                    What is the recruitment industry?
                  </p>
                  <p class="faq-a">
                    The recruitment industry encompasses all personnel, companies and software relating to sourcing
                    talent, hiring and job seeking. Recruitment is one of the biggest industries in the world, with
                    almost 40,000 recruitment agencies in the UK alone, and hundreds of thousands of employees. Within
                    the recruitment industry, Recruiters or Recruitment Consultants act as the intermediary between
                    companies looking to hire candidates, and jobseekers searching for a new career opportunity.
                  </p>
                </div>
              </div>

              <div>
                <button class="cta top-scroller big-cta cta-primary">Enquire Now</button>
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