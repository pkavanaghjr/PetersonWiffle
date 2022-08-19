<?php
/**
 * BLOCK: Player Titles
 */

$block__winnersPlayers = array(

);


$args_tourneys = array(
  'post_type'       => 'sp_tournament',
  'post_status'     => 'publish',
  'posts_per_page'  => '-1',
  'orderby'         => 'post_title',
  'order'           => 'desc'
);
$block__winnersPlayers['tourneys'] = new WP_Query($args_tourneys);
?>



<section class="block block--winnersPlayers">

    <?php if($block__winnersPlayers['tourneys']->have_posts()) : ?>
        <?php // ====== BUILD WINNERS ====== ?>
        <?php while($block__winnersPlayers['tourneys']->have_posts()) : $block__winnersPlayers['tourneys']->the_post() ?>
            <?php
                $winningTeam = get_post(get_field('sp_winner'), get_the_id());
                echo debug_to_console($winningTeam, '$winningTeam');

                if($winningTeam):
                    // Get Player list of winning team
                    $winningTeamList = get_post(get_field('sp_list', $winningTeam->ID));
                    echo debug_to_console($winningTeamList, '$winningTeamList');

                    // Get players from winning team
                    $winningPlayers = get_field('sp_players', $winningTeamList->ID);
                    echo debug_to_console($winningPlayers, '$winningPlayers');

                    // Get player
                    // $player = get_field('sp_past_team', 225);
                    // echo debug_to_console($player, '$player');
                    
                    global $wpdb;
                    $playersTeams = $wpdb->get_results("SELECT * FROM `wp_postmeta` where `meta_key` = 'sp_past_team' AND 'post_id' = 225");
                    echo debug_to_console($playersTeams, '$playersTeams');

                    $block__winnersPlayers['champions'][] = '';
                else:
                    continue;
                endif;

            ?>
        <?php endwhile ?>


        <?php // ====== PRINT WINNERS ====== ?>
        <?php if( !empty($block__winnersPlayers['champions']) ): ?>
            <?php foreach($block__winnersPlayers['champions'] as $key => $champion): ?>
                <div class='champion'>
                    <?php 
                        echo debug_to_console($champion);
                    ?>
                    <a href="<?php echo get_the_permalink($champion->ID); ?>">
                        <h2 class=""><?php echo get_the_title($champion->ID); ?></h2>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif ?>

    <?php endif ?>

<?php 
echo debug_to_console($block__winnersPlayers);
?>
</section>


<style type="text/css">
    .block--winnersPlayers .champion{
        padding-bottom: 30px;
        border-bottom: solid 2px lightgray;
        margin-bottom: 30px;
    }
</style>