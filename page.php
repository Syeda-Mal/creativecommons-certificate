<?php
	get_header();
	the_post();
?>
<section class="main-content">
	<header class="page-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column">
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">', '</p>' );
					}
					?>
					<h2 class="page-title"><?php echo CC_Site::page_title(); ?></h2>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="columns padding-vertical-larger">
			<div class="column is-8">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						echo Components::simple_entry( get_the_ID(), true, true );
						endwhile;
					the_posts_pagination(
						array(
							'screen_reader_text' => ' ',
							'prev_text'          => '<i class="icon chevron-left"></i>',
							'next_text'          => '<i class="icon chevron-right"></i>',
						)
					);
				endif;
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
