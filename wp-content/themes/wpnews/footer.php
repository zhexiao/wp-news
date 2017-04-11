<!-- footer content -->		
<div class="clearix"></div>
<div class="container footer-container">
    <footer class="clearfix">
        <div class="footer-copy clearfix col-md-8">
            Copyright © <?=date('Y')?> Zhe Xiao. All rights reserved.
        </div>

        <div class="col-md-4 text-center footer-social">
            <a href="http://www.facebook.com/sharer.php?u=<?=get_home_url();?>" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="http://twitter.com/home?status=<?=get_home_url();?>" target="_blank">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=get_home_url();?>" target="_blank">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="http://plus.google.com/share?url=<?=get_home_url();?>" target="_blank">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>