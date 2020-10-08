<?php
/**
 * @Author: ido_alit
 * @Date:   2015-11-12 18:45:37
 * @Last Modified by:   ido_alit
 * @Last Modified time: 2015-11-22 19:23:00
 */

/*
=========================
Be sure that this file not accessed directly
=========================
*/
if (!defined('INDEX_AUTH')) {
  die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
  die("can not access this file directly");
}

/*
=========================
Define current public template directory
=========================
*/
define('CURRENT_TEMPLATE_DIR', $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/');

/*
=========================
Load config template
=========================
*/
include 'tinfo.inc.php';
utility::loadSettings($dbs);

/*
=========================
Load custome function
=========================
*/
include 'function.php';

/*
=========================
Load header
- open html tag
- head tag
- open body tag
=========================
*/
include 'part/head.php';

/*
=========================
Load content
=========================
| You can change the layout of template part
| by change/move/remove structure of load content part
*/

include 'part/nav.php';

if (!isset($_GET['search']) || isset($_GET['p'])){
    include 'part/header.php';
    include 'part/promo.php';
    include 'part/services.php';
    include 'part/about.php';
    include 'part/team.php';
}

include 'part/simple-search.php';

// open row for grouping
include 'part/content/row_open.php';
include 'part/main-content.php';
include 'part/sidebar.php';
// close row
include 'part/content/row_close.php';

include 'part/content/row_close_end_wrap.php';


/*
=========================
Load footer
- close body tag
- close html tag
=========================
*/
include 'part/contact.php';
include 'part/footer.php';
