<br>
<br>
<footer class="content-info ui segment inverted basic vertical">
    <br>
    <div class="container">
        <div class="ui two column grid stackable">
            <div class="column">
                <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-dancefloor.png" alt="Dancefloor logo" class="ui image medium" /></a>
            </div>
            <div class="right aligned column">
                <h5 style="padding-top:10px"><a href="mailto:infos@dancefloorgenevasalsa.ch" style="color:white" target="_blank"><i class="mail icon"></i>infos@dancefloorgenevasalsa.ch</a></h5>
                <h5><a href="tel:+41786575056" style="color:white"><i class="phone icon"></i>+41 78 657 50 56</a></h5>
                <button class="ui circular facebook icon button">
                    <i class="facebook icon"></i>
                </button>
                <button class="ui circular youtube icon button">
                    <i class="youtube icon"></i>
                </button>
                <button class="ui circular google plus icon button">
                    <i class="google plus icon"></i>
                </button>
            </div>
        </div>
        <br>
        <?php dynamic_sidebar('sidebar-footer'); ?>
        <br>
    </div>
</footer>
