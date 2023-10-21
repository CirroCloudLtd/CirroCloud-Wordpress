<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/*
 * Theme options
 */
require_once 'theme-options/theme-options.php';

/*
 * Video Post options
 */
require_once 'post-format/post-video.php';

/*
 * Gallery Post options
 */
require_once 'post-format/post-gallery.php';

/*
 * Audio Post options
 */
require_once 'post-format/post-audio.php';

/*
 * metabox options
 */
require_once 'metabox/metabox-options.php';


/*
 * Team Meta options
 */
if (defined('TRONIX_CORE')) {
    require_once 'metabox/team-metabox.php';
}


/*
 * Navication options
 */
require_once 'metabox/nav-metabox.php';
