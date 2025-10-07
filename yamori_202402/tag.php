<?php
if ( in_category( array('letter', 'makehouse') ) ) {
  get_template_part( 'tag-blog' , false );
} elseif ( in_category( array('casestudy', 'reform', 'store', 'woodenhouse', 'wooden') ) ) {
  get_template_part( 'tag-works' , false );
} else {
  get_template_part( 'tag-blog' , 'normal');
}
?>