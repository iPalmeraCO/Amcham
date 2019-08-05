<?php
if (in_category(6)) {
include(TEMPLATEPATH . '/single-usaoutlook.php');
}
elseif (in_category(12)) {
    include(TEMPLATEPATH . '/single-revista-business-in-action.php');
    }
  elseif (in_category(13)) {
    include(TEMPLATEPATH . '/single-socios-en-accion.php');
    }
     elseif (in_category(14)) {
    include(TEMPLATEPATH . '/single-comunicados-de-prensa.php');
    }
else {
include(TEMPLATEPATH . '/single-default.php');
}