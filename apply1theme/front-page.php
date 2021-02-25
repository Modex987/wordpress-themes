<?php get_header(); ?>


    <!-- Top box -->

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to <?php bloginfo('title'); ?></h2>
                <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post(); ?>

                        <p class="col-12 text-center">
                            <?php the_content(); ?>
                        </p>

                    <?php endwhile; ?>
                <?php endif; ?>
			</header>
			
			<div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="<?php site_url(); ?>" class="tm-paging-link active">Home</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Blog</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Protfolio</a></li>
					</ul>
				</nav>
			</div>

			<div class="row tm-gallery">

                <div id="tm-gallery-page-pizza" class="tm-gallery-page">
                    <h1>content here</h1>
                </div>

			</div>

			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
							<img src="<?php bloginfo('template_url') ?>/assets/img/img-01.jpg" alt="Image" class="img-fluid" />
						</figure>
					</div>

					<div class="col-md-6">
						<div class="tm-description-box">
							<h4 class="tm-gallery-title">Maecenas nulla neque</h4>
							<p class="tm-mb-45">Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a rel="nofollow" href="https://templatemo.com/contact">talk to us</a> for additional permissions about our templates. Thank you.</p>
							<a href="about.html" class="tm-btn tm-btn-default tm-right">Read More</a>
						</div>
					</div>
				</div>
			</div>

		</main>

<?php get_footer(); ?>