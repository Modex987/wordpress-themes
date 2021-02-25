    </div>

    <footer>
        <div class="d-flex justify-content-between">
            <div>
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer'
                )); ?>
            </div>

            <div>
                <?php
                    dynamic_sidebar('sidebar-2');
                ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>