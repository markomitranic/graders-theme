<?php

// Front Page
// This is a special type of template. If present, it will automatically be set as the front page for your website.
// Wordpress Tags Usage: https://codex.wordpress.org/Template_Tags


get_header();

?>


<?php 
	// check if the repeater field has rows of data
	$heroes = "";
	$thumbnails = "";
	$i = 0;

	if( have_rows('slider') ):
	    while ( have_rows('slider') ) : the_row();
	        $image = get_sub_field('image')['sizes']['hero'];
	        $thumb = get_sub_field('image')['sizes']['thumbnail'];
	        $alt = get_sub_field('image')['alt'];

	        $heroes .= '<li data-id="'. $i .'" style="background-image: url('. $image .');">';
	        $heroes .= '<img src="'. $image .'" alt="'. $alt .'">';
	        $heroes .= '</li>';
	        
	        // $thumbnails .= '<img data-id="'. $i .'" src="'. $thumb .'">';

	        $i++;
	    endwhile;
	endif;
 ?>


			<article id="slider">
				<ul>
					<?php echo $heroes; ?>
				</ul>
				<div id="thumbs">
					<?php echo $thumbnails; ?>
				</div>
			</article>
		</div>
	</div>
	<main>
		<section class="row">
			<div class="whitebox">
				<div class="centering">
					<a name="heading"></a>
					<?php if (get_field('section_header')) : ?>
						<h2>
							<?php the_field('section_header'); ?>
						</h2>
					<?php endif; ?>
					<div class="wysiwyg">
						<?php the_field('content'); ?>
					</div>
				</div>
			</div>
		</section>
		<section class="row black-bg showreel">
			<?php the_field('showreel'); ?>
		</section>
		<section class="row">
			<div class="whitebox">
				<div class="centering">
					<?php if (get_field('section_header_2')) : ?>
						<h2>
							<?php the_field('section_header_2'); ?>
						</h2>
					<?php endif; ?>
					<div class="wysiwyg">
						<?php the_field('content_2'); ?>
					</div>
				</div>
			</div>
		</section>
	</main>


<?php

	get_footer();

?>