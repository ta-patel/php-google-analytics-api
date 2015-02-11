<?php

require "classes/GoogleAnalytics.php";

$fromDate = '2015-01-01';
$toDate = '2015-01-31';

$google_analytics = new GoogleAnalytics();

$sessions = $google_analytics->total_session($fromDate, $toDate);

$new_users = $google_analytics->total_new_user($fromDate, $toDate);

$total_pageviews = $google_analytics->total_pageviews($fromDate, $toDate);

$pageviewsPerSession = $google_analytics->pageviewsPerSession($fromDate, $toDate);

$avgSessionDuration = $google_analytics->avgSessionDuration($fromDate, $toDate);

$total_bounces = $google_analytics->total_bounces($fromDate, $toDate);

/*
To view the output
echo "<pre>";
print_r($sessions);
echo "<pre>";
*/
?>
