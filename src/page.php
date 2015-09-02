<?php get_header(); ?>

<?php if (is_page('tecnologia')) {
	get_template_part('escolha');
} ?>

	<?php if (is_tree('14')) {
		get_template_part('content', 'pfc');
	} else {
		get_template_part('content');
	} ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
