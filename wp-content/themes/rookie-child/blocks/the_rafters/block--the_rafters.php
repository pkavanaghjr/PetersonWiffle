<?php
/**
 * BLOCK: Tournament Winners
 */

$args = array(
  'post_type'       => 'sp_tournament',
  'post_status'     => 'publish',
  'posts_per_page'  => '-1',
  'orderby'         => 'post_title',
  'order'           => 'desc'
);
$block__winners['query'] = new WP_Query($args);

?>


<section class="block block--winners">
    <i class="winners__fireworks--trigger fa-solid fa-explosion"></i>

    <?php if($block__winners['query']->have_posts()) : ?>
        <?php while($block__winners['query']->have_posts()) : $block__winners['query']->the_post();
            $tourney = get_post(get_the_id());
            echo debug_to_console($tourney, '$tourney');
            if (str_contains(get_the_title(), '2021') || str_contains(get_the_title(), '2022')) { 
                continue;
            }

        ?>
        
            <div class='winner'>
                <div class='winner__inner'>
                    <?php 
                        $winner = get_post(get_field('sp_winner'));
                        echo debug_to_console($winner, '$winner');
                    ?>
                    <a href="<?php echo get_the_permalink($winner->ID); ?>">
                        <i class="winner__icon fa-solid fa-trophy"></i>
                        <h2 class="winner__team"><?php echo $winner->post_title; ?></h2>
                    </a>
                    <div class="winner__team">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <h3 class="winner__tourney"><?php echo get_the_title(); ?></h3>
                        </a>
                    </div>
                </div>
            </div>

        <?php endwhile ?>
    <?php endif ?>

</section>


<?php 
/**
 * 
 * STYLES
 * 
 */
?>
<style type="text/css">
    /****** Wrapper ******/
    .block--winners{
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-items: flex-start;
        overflow: hidden;
    }
    body.active--fireworks,
    body.active--fireworks #masthead,
    body.active--fireworks #masthead h1.site-title,
    body.active--fireworks #masthead h2.site-description,
    body.active--fireworks #primary,
    body.active--fireworks .site-info{
        background: #111;
        color: white;
    }
    body.active--fireworks .block--winners .winner:before{
        background: #111;
    }
    .block--winners .winners__fireworks--canvas{
        position: fixed;
        width: 100%;
        height: 100vh;
        top: 0; right: 0; bottom: 0; left: 0;
        z-index: 999;
    }
    .block--winners .winners__fireworks--trigger{
        position: fixed;
        width: 50px;
        height: 50px;
        border: solid 5px #c51d27;
        background: white;
        color: #c51d27;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        right: 30px; 
        bottom: 30px;
        z-index: 999;
        box-shadow: 0 0 3px 3px rgba(0,0,0,0.35);
    }
    .block--winners .winners__fireworks--trigger.active{
        background: #c51d27;
        color: white;
        animation: fireworks 3s infinite;
    }
    @keyframes fireworks {
      0% {
        background: #c51d27;
        color: white;
      }
      50% {
        background: white;
        color: #c51d27;
      }
      100% {
        background: #c51d27;
        color: white;
      }
    }

    /****** BANNER ******/
    .block--winners .winner{
        flex: 1 1 32%;
        max-width: 32%;
        position: relative;
        background-color: #0d4785;
        margin:0 0 450px;
        text-align: center;
        transition: all 0.5s;
        /*overflow: hidden;*/
    }
    .block--winners .winner:after{
        content: '';
        pointer-events: none;
        position: absolute;
        display: block;
        left: 0;
        right: 0;
        bottom: -199px;
        height: 200px;
        width: 100%;
        background: #0d4785;
        border: solid 10px #c51d27;
        border-top: none; border-bottom: none;
        transition: all 0.5s;
        /*border: 1.5em solid #0d4785;
        border-right-width: 1.5em;
        border-bottom-color: transparent;*/
        /*z-index: -1;*/
    }
    .block--winners .winner:before{
        content: '';
        pointer-events: none;
        position: absolute;
        bottom: -85%;
        left: 0; right: 0;
        width: 100%;
        padding-top: 100%;
        background: white;
        transform: rotate(45deg);
        transition: position 0.5s, bottom 0.5s;
        z-index: 10;
    }
    .block--winners .winner__inner{
        position: relative;
        padding: 80px 30px;
        height: 100%;
        min-height: 400px;
    }
    .block--winners .winner__inner:before{
        content: '';
        pointer-events: none;
        position: absolute;
        top: 0; right: 0; bottom: 0; left: 0;
        border: solid 10px #c51d27;
        border-bottom: none;
    }

    /****** CONTENT ******/
    .block--winners .winner__icon{
        display: block;
        font-size: 60px;
        color: white;
        margin: 0 0 15px;
        transition: all 0.5s;
    }
    .block--winners .winner__team{
        color: white;
        margin-bottom: 10px;
    }
    /*.block--winners .winner__team strong{
        font-size: 12px;
        font-style: italic;
    }*/
    .block--winners .winner__tourney{
        color: #ccc;
        font-size: 18px;
        margin-bottom: 50px;
        position: relative;
    }
    .block--winners .winner__tourney:after{
        content: '';
        width: 70%;
        height: 1px;
        background-color: #ccc;
        position: absolute;
        bottom: -7px;
        left: 15%;
        right: 15%;
        transition: all 0.5s;
    }
    /*.block--winners .winner__team:hover,
    .block--winners .winner__tourney:hover{
        font-size: 105%;
    }*/


/*=======================
    RESPONSIVE RIBBON
=======================*/
    @media (max-width: 1024px){  
        .block--winners .winner:before{ bottom: -70%;}
    }
    @media (max-width: 768px){  
        .block--winners .winner:before{ bottom: -95%;}
    }
    @media (max-width: 700px){  
        .block--winners .winner:before{ bottom: -90%;}
    }
    @media (max-width: 600px){  
        .block--winners .winner:before{ bottom: -80%;}
    }
    @media (max-width: 530px){  
        .block--winners .winner:before{ bottom: -70%;}
    }
    @media (max-width: 450px){  
        .block--winners .winner{ margin: 0 0 600px; }
        .block--winners .winner:before{ bottom: -120%; }
    }
    @media (max-width: 350px){  .block--winners .winner:before{
        bottom: -80%;
    }}


/*==================
    INTERACTIVE
==================*/
    .block--winners .winner:hover .winner__tourney:after{
        bottom: -15px;
    }
    .block--winners .winner:hover .winner__icon{
        margin-bottom: 23px;
    }



/*==================
    TABLET
==================*/
    @media (max-width: 768px){
        .block--winners .winner{
            flex: 1 1 48%;
            max-width: 48%;
        }

    }

/*==================
    MOBILE
==================*/
    @media (max-width: 450px){
        .block--winners .winner{
            flex: 1 1 100%;
            max-width: 100%;
        }
    }
</style>
