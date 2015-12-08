<?php if ( is_page() ) : ?>

<aside id="sidebar-page" role="sidebar">
	<div class="entry-sidebar-simple">
		<header class="sidebar-heading">
			<?= get_subnavigation('title'); ?>
		</header>
		<ul>
			<?= get_subnavigation(); ?>
		</ul>
	</div>
</aside><!-- /sidebar -->
<!-- /#sidebar -->

<?php endif; ?>