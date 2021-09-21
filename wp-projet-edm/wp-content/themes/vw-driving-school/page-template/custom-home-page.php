<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_driving_school_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_driving_school_slider_hide_show', false) != '' || get_theme_mod( 'vw_driving_school_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_driving_school_slider_speed',4000)) ?>"> 
        <?php $slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_driving_school_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $slider_page[] = $mod;
            }
          }
          if( !empty($slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_driving_school_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_driving_school_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_driving_school_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-lg red"><span><i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_slider_btn_icon','fas fa-bookmark')); ?>"></i></span><?php echo esc_html(get_theme_mod('vw_driving_school_slider_button_text',__('READ MORE','vw-driving-school')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_driving_school_slider_button_text',__('READ MORE','vw-driving-school')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="prev-next"><?php esc_html_e('PREV','vw-driving-school'); ?></span>
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-driving-school' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="prev-next"><?php esc_html_e('NEXT','vw-driving-school'); ?></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-driving-school' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'vw_driving_school_after_slider' ); ?>

  <section id="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 conatct-info">
          <?php if(get_theme_mod('vw_driving_school_phone') != ''){ ?>
            <i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_phone_icon','fas fa-phone')); ?>"></i><span><a href="tel:<?php echo esc_attr( get_theme_mod('vw_driving_school_phone','') ); ?>"><?php echo esc_html(get_theme_mod('vw_driving_school_phone',''));?></a></span>
          <?php }?>
        </div>
        <div class="col-lg-4 col-md-6 conatct-info">
          <?php if(get_theme_mod('vw_driving_school_email_address') != ''){ ?>
            <i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_email_address_icon','fas fa-envelope-open')); ?>"></i><span><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_driving_school_email_address',''));?>"><?php echo esc_html(get_theme_mod('vw_driving_school_email_address',''));?></a></span>
          <?php }?>
        </div>
        <div class="col-lg-5 col-md-12">
          <?php dynamic_sidebar('social-widget'); ?>
        </div>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_driving_school_after_contact' ); ?>

  <section id="about">
    <div class="container">
      <div class="row">
        <?php $about_page = array();
          $mod = absint( get_theme_mod( 'vw_driving_school_about_page' ));
          if ( 'page-none-selected' != $mod ) {
            $about_page[] = $mod;
          }
        if( !empty($about_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $about_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-lg-6 col-md-6">
                <h2><i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_about_icon','fas fa-road')); ?>"></i><?php the_title(); ?></h2>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_driving_school_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_driving_school_about_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_driving_school_about_button_text','READ MORE') != ''){ ?>
                  <div class="more-btn">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-lg red"><span><i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_about_button_icon','fas fa-bookmark')); ?>"></i></span><?php echo esc_html(get_theme_mod('vw_driving_school_about_button_text',__('READ MORE','vw-driving-school')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_driving_school_about_button_text',__('READ MORE','vw-driving-school')));?></span></a>
                  </div>
                <?php } ?>
              </div>
              <div class="col-lg-6 col-md-6">            
                <?php the_post_thumbnail(); ?>
              </div>          
            <?php endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;
        wp_reset_postdata()?>
        <div class="clearfix"></div> 
      </div>
    </div>
  </section>

  <?php do_action( 'vw_driving_school_after_about' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>