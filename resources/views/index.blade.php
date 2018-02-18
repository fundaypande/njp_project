<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Keluarga Besar Nengah Nurita</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{!! asset('css/main.css') !!}" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="/img/icon.ico" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index.html">Keluarga <span>Nengah Nurita</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="/home">Home</a></li>

					<!-- Authentication Links -->
					@guest

						<li><a href="/login">Login</a></li>
						<li><a href="/register">Register</a></li>
					@else
							<li class="dropdown">
									<a href="profile/{{Auth::user()->id}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
											{{ Auth::user()->name }} <span class="caret"></span>
									</a>

									<ul class="dropdown-menu">
											<li>
													<a href="{{ route('logout') }}"
															onclick="event.preventDefault();
																			 document.getElementById('logout-form').submit();">
															Logout
													</a>

													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
													</form>
											</li>
									</ul>
							</li>
					@endguest


				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Nurita Jaya Putra</h1>
						<p>Gerakan kesadaran para punggawa Nurita Jaya<br />karena keyakinan bahwa dengan berjalan bersama <br /> kita dapat memecahkan semua permasalahan</p>
					</header>
					<a href="/home" class="button big scrolly">Lihat Hasil</a>
				</div>
			</section>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper style2">
						<div class="inner">
							<div class="flex flex-2">
								<div class="col col2">
									<h3>Apa Yang Kami Lakukan</h3>
                  <p style="font-size : 24px">"Kami melakukan apa yang seharusnya dilakukan seorang anak kepada orang yang telah merawat dan mengasihi kami sejak lahir"</p>
                  <h4>Dana Terhimpun Rp. {{ rupiah($realTotal) }}</h4>
									<p>Mungkin dengan mengumpulkan sejumlah uang untuk keperluan keluarga besar, tidak akan sebanding dengan apa yang telah diberikan orang tua kepada kami sedari lahir.
                  Namun dengan melakukan gerakan ini diharapkan kami mampu memperkuat rasa persatuan dan kebersamaan dengan saling membantu satu sama lain sebagai saudara kadung yang sehati dan sepemikiran</p>
									<a href="/transfer" class="button">Transfer Dana</a>
								</div>
								<div class="col col1 first">
									<div class="image round fit">
										<a href="generic.html" class="link"><img src="/gambar/parent.jpg" alt="" /></a>
									</div>
								</div>
							</div>
						</div>
					</section>

				<!-- Section -->
					<section class="wrapper style1">
						<div class="inner">
							<header class="align-center">
								<h2>3 Penyumbang Dana Terbanyak</h2>
								<p>Bukan sebagai pengahargaan, namun sebagai penyemangat para punggawa Nurita Jaya lainnya</p>
							</header>
							<div class="flex flex-3">
                @foreach($rank as $key => $ranks)
                <div class="col align-center">
                  <div class="image round fit">
                    <img src="/gambar/{{ $ranks -> user -> gambar }}" alt="" />
                  </div>
                  <h3> {{ ++$key }} </h3>
                  <p style="font-size: 20px;">{{$ranks -> user -> name}}</p>
                  <a href="profile/{{ $ranks -> user -> id }}" class="button">Lihat Profile</a>
                </div>
                @endforeach
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-snapchat"><span class="label">Snapchat</span></a></li>
					</ul>
					<p>&copy; Untitled. All rights reserved. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.</p>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="{!! asset('/js/jquery.min.js ') !!}"></script>
			<script src="{!! asset('/js/jquery.scrolly.min.js') !!}"></script>
			<script src="{!! asset('js/jquery.scrollex.min.js') !!}"></script>
			<script src="{!! asset('/js/skel.min.js') !!}"></script>
			<script src="{!! asset('/js/util.js') !!}"></script>
			<script src="{!! asset('/js/main.js') !!}"></script>

	</body>
</html>
