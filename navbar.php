<nav class="navbar navbar-default navbar-fixed-top" role='navigation'>
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_bloginfo('template_directory');?>/images/Logo-small-01.png"></a>
	</div>
	<?php 
		// logic for highlighting navbar items
		$cat = "about"; // highlight "About" by default
		$title = trim(wp_title('', false)); // page title
		if ($title == "The Magazine" || $title == "Past Issues") {
			$cat = "magazine";
		} elseif (is_single()) { // article page
			$cat = "latest";
		} elseif (is_author() || $title == "The Politic Blog") {
			$cat = "blog";
		}
	?>
	<div id="navbar" class="navbar-collapse collapse">
		<div class="navbar-links navbar-left">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="nav-link <?php if ($cat == "latest"): echo "active"; endif ?>">Latest</span>
			</a>
			<span class="nav-link-divider hidden-xs"></span>
			<a href="http://thepolitic.org/category/politic-blog/">
				<span class="nav-link <?php if ($cat == "blog"): echo "active"; endif ?>">Blog</span>
			</a>
			<span class="nav-link-divider hidden-xs"></span>
			<span class="dropdown">
				<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="nav-link <?php if ($cat == "magazine"): echo "active"; endif ?>">Magazine</span>
				</a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>magazine/">Current Issue</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues">Past Issues</a></li>
				</ul>
			</span>
			<span class="nav-link-divider hidden-xs"></span>
			<span class="dropdown">
				<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="nav-link <?php if ($cat == "about"): echo "active"; endif ?>">About</span>
				</a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>our-team">Masthead</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>our-sponsors">Our Sponsors</a></li>
				</ul>
			</span>
		</div>
	</div>
	<div class="navbar-progress"></div>
</nav>