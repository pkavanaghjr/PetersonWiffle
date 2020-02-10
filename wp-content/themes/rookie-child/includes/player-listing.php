<?php /***** PLAYER STATS *****/

	$homepage = array(
		'queryArgs_players' => '',
		'query_players' => '',
		'table_headers' => array(
			'name' => 'Player',
			'hr' => 'HR',
			'so' => 'SO',
		)
	);



	$homepage['queryArgs_players'] = array(
	    'post_type' => 'sp_player',
	    'posts_per_page' => '-1',
	    'order' => 'DESC',
	    'orderby' => 'post_title',
	    'post_status' => 'publish',
	    // 'tax_query' => array(
	    //     array(
	    //         'taxonomy' => $homepage['taxonomy'],
	    //         'terms' => $homepage_cats_query,
	    //         'field' => 'id',
	    //         'include_children' => true,
	    //         'operator' => 'IN'
	    //     ),
	    // ),
	);
	$homepage['query_players'] = new WP_Query( $homepage['queryArgs_players'] );
	echo '<script type="text/javascript" data-debug="true">console.log("query_players: ",' . json_encode( $homepage['query_players'] ) . ');</script>';
?>


<?php /*********************** START LAYOUT ***********************/ ?>
<div class="sp-widget-align-none">
	<aside id="sportspress-player-list-custom" class="widget widget_sportspress widget_player_list widget_sp_player_list">
		<div class="sp-template sp-template-player-list">
			<div class="sp-table-wrapper">
				<div class="sp-scrollable-table-wrapper">
					<div id="DataTables_Table_custom_wrapper" class="dataTables_wrapper no-footer">

						<?php /*********************** PLAYER STAT STANDINGS TABLE ***********************/ ?>
						<table class="sp-player-list sp-data-table sp-sortable-table sp-responsive-table playerlist_5e3f7a38f0873 sp-scrollable-table sp-paginated-table dataTable no-footer" data-sp-rows="10" id="DataTables_Table_custom" role="grid">
							<thead>
								<tr role="row">
									<?php foreach($homepage['table_headers'] as $key => $th): ?>
										<th class="data-<?php echo $key; ?> sorting" tabindex="0" aria-controls="DataTables_Table_custom" rowspan="1" colspan="1" aria-label="<?php echo $th; ?>"><?php echo $th; ?></th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody>
								<?php
									if ($homepage['query_players']->have_posts()):
										$count = 0;
										while ($homepage['query_players']->have_posts()): $homepage['query_players']->the_post();
											$count++;
											$row = array(
												'post' => get_post( get_the_id() ),
												'player' => new SP_Player( get_the_id() ),
												'classes' => ($count % 2 == 0 ? 'even' : 'odd' ),
												'name' => get_the_title(),
												'link' => get_the_permalink(),
												'hr' => $count,
												'so' => 0,
											);
											$row['p_data'] = $row['player']->data( 0, false, 1 );
											if($row['name'] === 'Cal Peterson'):
												echo '<script type="text/javascript" data-debug="true">console.log("$row: ",' . json_encode( $row ) . ');</script>';
											endif;
										?>
									
											<tr class="<?php echo $row['classes']; ?>" role="row">

												<?php 
													// Loop over headers for matching key data
													foreach($homepage['table_headers'] as $key => $td): 
												?>
												<?php the_content(); ?>
													<?php if($key === 'name'): ?>
														<td class="data-<?php echo $key; ?>" data-label="<?php echo $td; ?>">
															<a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
														</td>
													<?php else: ?>
														<td class="data-<?php echo $key; ?>" data-label="<?php echo $key; ?>"><?php echo $row[$key]; ?></td>
													<?php endif; ?>
												<?php endforeach; ?>

											</tr>

									<?php
										 endwhile;
									endif;
									wp_reset_postdata();
								?>
							</tbody>
						</table><?php /******** CLOSE: table ********/ ?>

					</div>
				</div>
			</div>
		</div>
	</aside>
</div>
