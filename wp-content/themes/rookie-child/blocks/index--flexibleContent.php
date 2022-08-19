<?php 
/**
 * CUSTOM BLOCKS INDEX
 */



if( have_rows('flexible_content') ):
	echo '<div class="flexibleContent">';
	$blocks_url = './blocks/';
    while ( have_rows('flexible_content') ) : the_row();
        
        // TOURNEY WINNERS
        if( get_row_layout() == 'the_rafters' ):
			include('the_rafters/block--the_rafters.php');

		// PLAYER TITLES
		elseif( get_row_layout() == 'winners_players' ):
			include('winners_players/block--winners_players.php');

		// CAPTAINS FEATURED
		elseif( get_row_layout() == 'captains_featured' ):
			include('captains_featured/block--captains_featured.php');
			
		endif;
    endwhile;
    echo '</div>';
else :
    // Do something...

endif;
?>	