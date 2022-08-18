<?php
/**
 * BLOCK: Winners
 */

$block__winners = array(
  'key' => 'value',
  // 'key' => 'value',
);


$args = array(
  'post_type'       => 'sp_tournament',
  'post_status'     => 'publish',
  'posts_per_page'  => '-1',
  'orderby'         => 'post_title',
  'order'           => 'desc'
);
$block__winners['query'] = new WP_Query($args);

?>

<style type="text/css">
    .block--winners .winner{
        padding-bottom: 30px;
        border-bottom: solid 2px lightgray;
        margin-bottom: 30px;
    }

    .block--winners .winner__team strong{
        font-size: 12px;
        font-style: italic;
    }

    .block--winners .winner__title{
        font-size: 21px;
        color: #0d4785
    }
</style>
<section class="block block--winners">

    <?php if($block__winners['query']->have_posts()) : ?>
        <?php while($block__winners['query']->have_posts()) : $block__winners['query']->the_post() ?>
        
            <div class='winner'>
                <?php 
                    $winner = get_post(get_field('sp_winner'));
                ?>
                <a href="<?php echo get_the_permalink(); ?>">
                    <h2 class="winner__tourney"><?php echo get_the_title(); ?></h2>
                </a>
                <div class="winner__team">
                    <strong>WINNING TEAM: </strong>
                    <a href="<?php echo get_the_permalink($winner->ID); ?>">
                        <h3 class="winner__title"><?php echo $winner->post_title; ?></h3>
                    </a>
                </div>
            </div>

        <?php endwhile ?>
    <?php endif ?>

</section>
