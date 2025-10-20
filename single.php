<?php
if ( in_category( array('letter', 'makehouse', 'works', 'event', 'news', 'openhouse') ) ) {
  get_template_part( 'single-blog' , false );
} elseif ( in_category( array('casestudy', 'reform', 'store', 'woodenhouse', 'wooden') ) ) {
  get_template_part( 'single-works' , false );
} else {
  get_template_part( 'single-default' , 'normal');
}
?>