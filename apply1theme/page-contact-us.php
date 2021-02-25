<?php get_header(); ?>

<main>

    <?php if(have_posts()): ?>

        <header class="row tm-welcome-section">

            <?php while(have_posts()): the_post(); ?>

                <h2 class="col-12 text-center tm-section-title"><?php the_title(); ?></h2>

                <p class="col-12 text-center">
                    <?php the_content(); ?>
                </p>

            <?php endwhile; ?>

        </header>

    <?php endif; ?>

    <div class="tm-container-inner-2 tm-contact-section">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST" class="tm-contact-form">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="" />
                    </div>
                    
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                    </div>
        
                    <div class="form-group">
                        <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
                    </div>
            
                    <div class="form-group tm-d-flex">
                        <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
                        Send
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="tm-address-box">
                    <h4 class="tm-info-title tm-text-success">Our Address</h4>
                    <address>
                        180 Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus 10550
                    </address>
                    <a href="tel:080-090-0110" class="tm-contact-link">
                        <i class="fas fa-phone tm-contact-icon"></i>080-090-0110
                    </a>
                    <a href="mailto:info@company.co" class="tm-contact-link">
                        <i class="fas fa-envelope tm-contact-icon"></i>info@company.co
                    </a>
                    <div class="tm-contact-social">
                        <a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
                        <a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
                        <a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- How to change your own map point
1. Go to Google Maps
2. Click on your location point
3. Click "Share" and choose "Embed map" tab
4. Copy only URL and paste it within the src="" field below
-->
    <div class="tm-container-inner-2 tm-map-section">
        <div class="row">
            <div class="col-12">
                <div class="tm-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.1458606703063!2d-7.635338535465838!3d33.601519727977035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d2f5ad6774c1%3A0x63af8e41054e5836!2sPharmacie%20Loubila!5e0!3m2!1sen!2sma!4v1613949821431!5m2!1sen!2sma" loading="lazy" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="tm-container-inner-2 tm-info-section">
        <div class="row">
            <!-- FAQ -->
            <div class="col-12 tm-faq">
                <h2 class="text-center tm-section-title">FAQs</h2>
                <p class="text-center">This section comes with Accordion tabs for different questions and answers about Simple House HTML CSS template. Thank you. #666</p>
                <div class="tm-accordion">
                    <button class="accordion">1. Fusce eu lorem et dui #09C maximus varius?</button>
                    <div class="panel">
                        <p>#666 Duis blandit purus vel nenenatis rutrum. Pellentesque pellentesque tindicunt lorem, ac egestas massa sollicitudin vel. Nam scelerisque vulputate quam mollis pretium. Morbi condimentum volutpat.</p>
                    </div>
                    
                    <button class="accordion">2. Vestibulum #999 ante ipsum primis in faucibus orci?</button>
                    <div class="panel">
                        <p>Mauris euismod odio at commodo rhoncus. Maecenas nec interdum purus, sed auctor est. Sed eleifend urna nec diam consectetur, a aliquet turpis facilisis. Integer est sapien, sagittis vel massa vel, interdum euismod erat. Aenean sollicitudin nisi neque, efficitur posuere urna rutrum porta.</p>
                    </div>
                    
                    <button class="accordion">3. Can I redistribute this template as a ZIP file?</button>
                    <div class="panel">
                        <p>Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a href="https://templatemo.com/contact">contact TemplateMo</a> for additional permissions about our templates. Thank you.</p>
                    </div>
                    
                    <button class="accordion">4. Ut ac erat sit amet neque efficitur faucibus et in lectus?</button>
                    <div class="panel">
                        <p>Vivamus viverra pretium ultricies. Praesent feugiat, sapien vitae blandit efficitur, sem nulla venenatis nunc, vel maximus ligula sem a sem. Pellentesque ligula ex, facilisis ac libero a, blandit ullamcorper enim.</p>
                    </div>
                </div>	
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>