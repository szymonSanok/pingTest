<?php
use Crontab\Crontab;
use Crontab\Job;
$delay=5;
$job = new Job();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $host = $_GET['host'];
    $port = $_GET['port'];
    $timeout = $_GET['timeout'];
    $delay = $_GET['delay'];
  }
$job
	->setMinute('*/5')
	->setHour('*')
	->setDayOfMonth('*')
	->setMonth('*')
	->setDayOfWeek('*')
	->setCommand(' usr/bin/php /www/domains/sanokreklama.pl/public_html/ping/ping.php')
;
echo "dupa";
echo $crontab->render();
$crontab = new Crontab();
$crontab->addJob($job);
$crontab->write();
?>