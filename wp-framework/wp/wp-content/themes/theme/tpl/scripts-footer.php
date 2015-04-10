<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<!-- Net-Craft.Dev Monitoring -->
<script>
  jQuery.error = function (message) {
    _gaq.push(['_trackEvent', 'jQuery Error', message, navigator.userAgent, 0, true]);
  }
</script>
<!-- /Net-Craft.Dev Monitoring -->