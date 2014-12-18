<?php if( get_field( "shareable" ) ): ?>
    <span class="share-button"></span>
    <aside class="share-options">
        <!-- AddThis Button BEGIN -->
        <!--<h5 class="pull-left sharing-name">Share: </h5> -->
        <?php if(get_field( "link_to_page" )) { ?>
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_field("link_to_page" )?>">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_pinterest_share"></a>
                <a class="addthis_button_google_plusone_share"></a>
                <a class="addthis_button_email"></a>
            </div>
        <?php } else { ?>
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink();?>">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_pinterest_share"></a>
                <a class="addthis_button_google_plusone_share"></a>
                <a class="addthis_button_email"></a>
            </div>
        <?php } ?>
        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d9b516371593d6d"></script>
        <!-- AddThis Button END -->

        <span class="close-share"><i class="glyphicon glyphicon-remove"></i></span>
    </aside>
<?php endif;?>

