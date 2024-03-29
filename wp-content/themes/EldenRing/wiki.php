<?php /* Template Name: Wiki*/ ?>


<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elden_Ring_Wiki
 */

get_header();
?>

<br>
<br>
<div class="content">
    <div class="headerbanner">
        <h1><u><?php single_post_title(); ?></u></h1>
    </div>
	<?php the_post(); ?>
</div>

<?php
get_footer();