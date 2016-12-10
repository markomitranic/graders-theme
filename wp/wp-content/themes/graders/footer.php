<?php
	$menu_name = 'header-menu';
	 
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
	    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	    $menu_items = wp_get_nav_menu_items($menu->term_id);

	    // Remove current item from menu
	    foreach ( (array) $menu_items as $key => $menu_item ) {
	    	if ($menu_items[$key]->object_id == get_the_ID()) {
	    		array_splice($menu_items, $key, 1);
	    	}
	    }
	}
?>


<footer class="row footer">
	<div class="middleboxwrap">
		<a href="#top">
			<div class="middlebox">
				<div class="cube">
					<div class="arrow"></div>
				</div>
				<div class="lineleft"></div>
			</div>
			<div class="footermenuitem">
				<span class="toprow">Back to</span><span class="botrow">top</span>
			</div>
		</a>
	</div>
	<div class="leftboxwrap">
		<a href="<?php echo $menu_items[0]->url; ?>">
			<div class="leftbox">
				<div class="cube">
					<div class="arrow"></div>
				</div>
				<div class="lineleft"></div>
			</div>
			<div class="footermenuitem">
				<span class="toprow"><?php echo $menu_items[0]->attr_title; ?></span><span class="botrow"><?php echo $menu_items[0]->title; ?></span>
			</div>
		</a>
	</div>
	<div class="rightboxwrap">
		<a href="<?php echo $menu_items[1]->url; ?>">
			<div class="rightbox">
				<div class="cube">
					<div class="arrow"></div>
				</div>
				<div class="lineleft"></div>
			</div>
			<div class="footermenuitem">
				<span class="toprow"><?php echo $menu_items[1]->attr_title; ?></span><span class="botrow"><?php echo $menu_items[1]->title; ?></span>
			</div>
		</a>
	</div>
	<div class="copyright"><?php the_field('footer_disclaimer', 'option'); ?></div>
</footer>


<aside class="triangleswrapper">
	<ul id="triangles">
	</ul>
</aside>
<?php wp_footer(); ?>
</body>
</html>