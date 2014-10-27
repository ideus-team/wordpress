<?php
// Mobile Detect
locate_template('lib/Mobile_Detect.php', true, true);
$detect = new Mobile_Detect();
function nc_device() {
  global $detect;
  $device = (!$detect->isMobile()) ? 'desktop' : ($detect->isTablet() ? 'tablet' : 'mobile');
  $device = (isset($_COOKIE['device']) && $_COOKIE['device']) ? $_COOKIE['device'] : $device;
  return $device;
}
?>