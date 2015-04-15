<?php
// Mobile Detect
if (!class_exists('Mobile_Detect')) {
  require_once WPMU_PLUGIN_DIR.'/nc-lib/Mobile_Detect.php';
}
$detect = new Mobile_Detect();

function nc_device() {
  global $detect;
  $device = (!$detect->isMobile()) ? 'desktop' : ($detect->isTablet() ? 'tablet' : 'mobile');
  $device = (isset($_COOKIE['device']) && $_COOKIE['device']) ? $_COOKIE['device'] : $device;
  return $device;
}

function nc_ie() {
  global $detect;
  $ie = $detect->isIE();
  return $ie;
}
?>