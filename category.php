

<?php
get_header();
?>

<div class="container">
    <div id="inner-template" class="no-white">
<ul>
<?php
// we add this, to show all posts in our 
// Grocery sorted alphabetically
$args = array( 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' );
$groceryposts = get_posts( $args ); 
// here comes The Loop!
foreach( $groceryposts as $post ) :	setup_postdata($post);  ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>
</div>
</div>
<?php get_footer(); ?>
