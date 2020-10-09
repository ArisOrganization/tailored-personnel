<?php session_start(); 
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(16));
    }
    $token = $_SESSION['token'];?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta property="og:locale" content="en_GB" />
<meta property="og:site_name" content="tailored-personnel.com" />
<meta property="og:url" content="https://tailored-personnel.com/" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Tailored Personnel" />
<meta property="og:description" content="A totally bespoke and tailored talent acquisition service." />
<meta property="og:image" content="http://tailored-personnel.com/assets/img/logo.png" />
<meta property="og:image:secure_url" content="https://tailored-personnel.com/assets/img/logo.png" />
<meta property="og:image:width" content="370" />
<meta property="og:image:height" content="288" />

<meta name="twitter:title" content="Tailored Personnel " />
<meta name="twitter:card" content="summary_large_image" />


<link rel="apple-touch-icon" sizes="180x180" href="/assets/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/fav/favicon-16x16.png">
<link rel="manifest" href="/assets/fav/site.webmanifest">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<link rel="preload" as="style" href="/dist/style/custom_style.css">
<link rel="stylesheet" type="text/css" href="/dist/style/custom_style.css">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NZ8XVZ8');</script>
<!-- End Google Tag Manager --> 

<!-- Hotjar Tracking Code for https://tailored-personnel.com/ -->
<script>
(function(h, o, t, j, a, r) {
  h.hj = h.hj || function() {
    (h.hj.q = h.hj.q || []).push(arguments)
  };
  h._hjSettings = {
    hjid: 1959546,
    hjsv: 6
  };
  a = o.getElementsByTagName('head')[0];
  r = o.createElement('script');
  r.async = 1;
  r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
  a.appendChild(r);
})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177227058-1"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
  dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'UA-177227058-1');
gtag('config', 'AW-595277874');
</script>
<script>
const token = '<?php echo $token; ?>'
const api_key =
  `
<?php echo (!in_array(trim($_SERVER['REMOTE_ADDR']), ["localhost", "::1", "127.0.0.1"])) ? "K3UB-54SM-JD5E-EX5P" :"PJ7V-B47G-ZWCT-WKY9" ; ?>`;
</script>