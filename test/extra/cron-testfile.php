<?php
echo time()."<br>test";
echo filemtime('/var/www/cron-testfile')."<br>";
if(time() - filemtime('/var/www/cron-testfile') > 600) {
   echo "warning, cron not running";
}
?>