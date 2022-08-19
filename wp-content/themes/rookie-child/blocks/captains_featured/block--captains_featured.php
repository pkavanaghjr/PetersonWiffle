<?php
/**
 * BLOCK: Captains - Featured
 */

$args = array(
  'post_type'       => 'sp_team',
  'post_status'     => 'publish',
  'posts_per_page'  => '-1',
  'orderby'         => 'post_title',
  'order'           => 'asc'
);
$block__captains['query'] = new WP_Query($args);

?>

<section class="block block--captains">

    <?php if($block__captains['query']->have_posts()) : ?>
        <?php while($block__captains['query']->have_posts()) : $block__captains['query']->the_post() ?>
        
            <div class='captain'>
                <?php 
                    echo debug_to_console(get_post());
                    $captain = get_field('captain', get_the_id())[0];
                    echo debug_to_console($captain);
                    $captain_wins = '1';
                ?>
                <a href="<?php echo get_the_permalink($captain->ID); ?>"><h2 class="captain__name"><?php echo get_the_title($captain->ID); ?></h2></a>
                <div>
                    <h3>STATS</h3>
                    <ul>
                        <li>Championships: <?php echo $captain_wins; ?></li>
                    </ul>
                </div>
            </div>

        <?php endwhile ?>
    <?php endif ?>

</section>

<style type="text/css">
    .block--captains .captain{
        padding-bottom: 30px;
        border-bottom: solid 2px lightgray;
        margin-bottom: 30px;
    }
    .block--captains .captain h3{
        font-size: 18px;
        color: #0d4785
    }
</style>