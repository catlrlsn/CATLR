<?php 

$parent_id = get_top_parent_id($post);

$banner_url = get_field('banner_image', $parent_id);

?>

<?php if ( $banner_url ) : ?>
<figure class="entry-hero" style="margin-top:-30px;">
    <img src="<?= $banner_url; ?>">
</figure>
<?php endif; ?>
