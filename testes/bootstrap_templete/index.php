<?php get_header(header.php); ?>

<main role="main">

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-3"><?php bloginfo('name'); ?></h1>
			<p><?php bloginfo('description'); ?></p>
			<p><a class="btn btn-primary btn-lg" href="<?php echo home_url('/'); ?>" role="button">Learn more &raquo;</a></p>
		</div>
	</div>

	<div class="container">
		<!-- Example row of columns -->


        <div class="row">

            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>



                <div class="col-md-4">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_content(); ?></p>
                    <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">View details &raquo;</a></p>
                </div>

            <?php endwhile; endif; ?>

        </div>

		<hr>

	</div> <!-- /container -->

</main>

<?php get_footer(); ?>