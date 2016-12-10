<?php 
/*
Template Name: Services Page Template
*/

// Template name must be unique and filled in. The template will automatically be shown as a Page Template.

get_header(); 

the_post(); 

the_content();

$heroimage = get_field('hero_image')['sizes']['hero'];

?>


	<style>
		.headerwrapper {
			background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("<?php echo $heroimage; ?>");
		}
	</style>

		</div>
	</div>
	<main>
		<section class="row">
			<div class="whitebox">
				<div class="centering">
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
		<section class="row portfolio-list">
			<div class="whitebox">
				<ul>


					<?php 
						// check if the repeater field has rows of data
						if( have_rows('portfolio_items') ):
						    while ( have_rows('portfolio_items') ) : the_row();
								$output = "";
								$title = get_sub_field('title');
						        $desc = get_sub_field('description');
						        $image = get_sub_field('image')['sizes'];
						        $url = get_sub_field('link');

						        $output .= '<li>';
						        $output .= '<a href="' . $url . '" target="_blank">';
						        $output .= '<figure class="left">';
						        $output .= '<img src="' . $image['portfoliox2'] . '" srcset="' . $image['portfolio'] . ' 768w, ' . $image['portfolio'] . ' 1x, ' . $image['portfoliox2'] . ' 2x" alt="Norman" data-postId="0">';
						        $output .= '</figure>';
						        $output .= '</a>';
						        $output .= '<div class="right">';
						        if ($title) {
						        	$output .= '<h3>' . $title . '</h3>';
						        }
						        $output .= $desc;
						        $output .= '</div>';
						        $output .= '</li>';

						        echo $output;

						    endwhile;
						endif;
					 ?>
					
				</ul>
			</div>
		</section>
	</main>


	<div id="curtain">
		<div id="close-modal"></div>
		<aside id="vise-content">
			
		</aside>
	</div>

<?php
	get_footer();
?>