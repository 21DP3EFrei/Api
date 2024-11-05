<template>
	<div id="page-wrapper" class="landing is-preload">
	  <!-- Header -->
	  <header id="header" class="alt">
		<h1>
		  <router-link to="/">GifJam</router-link>
		</h1>
		<nav id="nav">
		  <ul>
			<li class="special">
			  <a href="#menu" class="menuToggle"><span>Menu</span></a>
			  <div id="menu">
				<ul>
				  <li><router-link to="/register">Sign Up</router-link></li>
				  <li><router-link to="/login">Log In</router-link></li>
				</ul>
			  </div>
			</li>
		  </ul>
		</nav>
	  </header>
  
	  <!-- Banner -->
	  <section id="banner">
		<div class="inner">
		  <h2>Welcome</h2>
		  <p>
			to the best site for content creators<br />
			Made by a <a href="https://www.youtube.com/@Epic_brawler_Gaming">student</a>.
		  </p>
		  <ul class="actions special">
			<li>
			  <router-link to="/login" class="button primary">Sign up now</router-link>
			</li>
		  </ul>
		</div>
		<a href="#one" class="more scrolly">Learn More</a>
	  </section>
  
	  <!-- One -->
	  <section id="one" class="wrapper style1 special">
		<div class="inner">
		  <header class="major">
			<h2>Get assets for anything<br /></h2>
			<p>Our site lets you use tons of memes, music, sound effects, and assets.</p>
		  </header>
		</div>
	  </section>
  
	  <!-- Three -->
	  <section id="three" class="wrapper style3 special">
		<div class="inner">
		  <header class="major">
			<h2>About us</h2>
			<p>
			  We want to boost your efforts in content creation by making it easier to find assets for your content<br />
			  Here's what we offer.
			</p>
		  </header>
		  <ul class="features">
			<li class="icon fa-paper-plane">
			  <h3>Anyone can contribute</h3>
			  <p>Our site lets you submit assets, so the more you submit, the more you help others.</p>
			</li>
			<li class="icon solid fa-laptop">
			  <h3>Tons of memes</h3>
			  <p>Our site aims to have the most memes and/or gifs than any other site.</p>
			</li>
			<li class="icon solid fa-headphones-alt">
			  <h3>A large selection of songs</h3>
			  <p>Our site has a ton of different music genres you can use for your videos (some may need to be credited).</p>
			</li>
			<li class="icon fa-heart">
			  <h3>Save assets you like</h3>
			  <p>You can save any meme or sound effect for free.</p>
			</li>
			<li class="icon fa-flag">
			  <h3>Help us</h3>
			  <p>If you see something broken or inappropriate, report it to us via Email.</p>
			</li>
		  </ul>
		</div>
	  </section>
  
	  <!-- CTA -->
	  <section id="cta" class="wrapper style4">
		<div class="inner">
		  <header>
			<h2>Gallery</h2>
			<p>View our gallery of assets here.</p>
		  </header>
		  <ul class="actions stacked">
			<li>
			  <router-link to="/gallery" class="button fit primary">Gallery</router-link>
			</li>
		  </ul>
		</div>
	  </section>
  
	  <!-- Footer -->
	  <footer id="footer">
		<ul class="icons">
		  <li>
			<a href="https://x.com/EpicbrawlerGam1" class="icon brands fa-twitter"><span class="label">Twitter</span></a>
		  </li>
		</ul>
		<ul class="copyright">
		  <li>&copy; GifJam 2024</li>
		</ul>
	  </footer>
	</div>
  </template>
  
  <script>
  export default {
	name: 'Home'
  }
  </script>
  <style>
</style>