<div class="sidebar" data-color="purple" data-image="{{ asset('img/sidebar-5.jpg') }}">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text">
                Aplikasi Kas Keluarga
            </a>
        </div>

        <ul class="nav">
          <li>
              <a href="/super">
                  <i class="pe-7s-graph"></i>
                  <p>Admin Panel</p>
              </a>
          </li>
            <li>
                <a href="/home">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="/transfer">
                    <i class="pe-7s-news-paper"></i>
                    <p>Transfer Uang</p>
                </a>
            </li>
            <li>
                <a href="/tarik">
                    <i class="pe-7s-news-paper"></i>
                    <p>Tarik Uang</p>
                </a>
            </li>

        </ul>
  </div>
</div>
<script type="text/javascript">
  var currentURL = $(location).attr("href"); //get all url
  var base_url = window.location.origin; //get base url ('http://localhost.com')

  currentURL = currentURL.replace(base_url, '');

  switch(currentURL) {
    case '/super':
        $("li").find('a[href="/super"]').parent().addClass('active');
        break;
    case '/home':
        $("li").find('a[href="/home"]').parent().addClass('active');
        break;
    case '/transfer':
        $("li").find('a[href="/transfer"]').parent().addClass('active');
        break;
    case '/tarik':
        $("li").find('a[href="/tarik"]').parent().addClass('active');
        break;
    default:
        $("li").find('a[href="/super"]').parent().addClass('active');
  }

</script>
