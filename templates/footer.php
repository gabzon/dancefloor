<br>
<br>
<footer class="content-info ui segment inverted basic vertical">
    <br>
    <div class="container">
        <div class="ui three column grid stackable">
            <div class="column">
                <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-dancefloor.png" alt="Dancefloor logo" class="ui image medium" /></a>
            </div>
            <div class="center aligned column">
                <br>                
                <a class="ui circular facebook icon button" target="_blank" href="https://www.facebook.com/DancefloorGeneva/">
                    <i class="facebook icon"></i>
                </a>
                <a class="ui circular youtube icon button" target="_blank" href="https://www.youtube.com/channel/UCPHPIzyomTiHI9uRuRfbsLQ">
                    <i class="youtube icon"></i>
                </a>
                <a class="ui circular google plus icon button" target="_blank" href="https://plus.google.com/+DancefloorgenevasalsaCh/videos">
                    <i class="google plus icon"></i>
                </a>
                <a class="ui circular twitter icon button" target="_blank" href="https://twitter.com/DancefloorGe">
                    <i class="twitter icon"></i>
                </a>
            </div>
            <div class="right aligned column">
                <h5 style="padding-top:10px"><a href="mailto:infos@dancefloorgenevasalsa.ch" style="color:white" target="_blank" class="email"><i class="mail icon"></i>infos@dancefloorgenevasalsa.ch</a></h5>
                <h5><a href="tel:+41786575056" style="color:white" class="phone"><i class="phone icon"></i>+41 78 657 50 56</a></h5>
                <div class="fb-like" data-href="https://www.facebook.com/DancefloorGeneva/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
            </div>
        </div>
        <br>
        <?php dynamic_sidebar('sidebar-footer'); ?>
        <br>
    </div>
</footer>
