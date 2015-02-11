<?php

require_once 'gapi/gapi.class.php';

/**
*	Class GoogleAnalytics. Gets the various data from google analytics 
*/

class GoogleAnalytics {

	/*
	* Define the constants from your google analytics website settings.
	*/
	const PROFILEID = 'xxxxxxxxx'; // profile id for your website from GA
	const GAPIUSERNAME = 'xxxxxxxxx'; // username for GA account
	const GAPIPASSWORD = 'xxxxxxxxxx'; // password for GA account
	
	/** 
	* Google Analytics.
	* @var Ga
	*/
	private $ga;
	
	/**
     * Construct the GoogleAnalytics.
     *
     * @param string $ga
     * 
     */	
	public function __construct($ga = NULL){
		
		if($ga === NULL){
			$gaUsername = self::GAPIUSERNAME;
			$gaPassword = self::GAPIPASSWORD;
			$gapi = new gapi($gaUsername, $gaPassword);	
		}

		$this->ga = $gapi;
		
	}

	/**
     * Construct the GoogleAnalytics.
     *
     * @param date $fromDate
     * @param date $toDate
     * @return array 
     *
     */	

	public function total_session($fromDate,$toDate){

		$dimensions = array('source','pagePath');
		$metrics = array('sessions');
		$sort = '';
		$filter = '';
		$mostPopular = $this->ga->requestReportData(self::PROFILEID, $dimensions, $metrics, $sort, $filter , $fromDate, $toDate,1, 5000);
		return $mostPopular;

	}

	/**
     * Construct the GoogleAnalytics.
     *
     * @param date $fromDate
     * @param date $toDate
     * @return int 
     *
     */	

	public function total_new_user($fromDate,$toDate){

		$dimensions = array('source','pagePath');
		$metrics = array('newUsers');
		$sort = '';
		$filter = '';
		$total_new_user = $this->ga->requestReportData(self::PROFILEID, $dimensions, $metrics, $sort, $filter , $fromDate, $toDate,1, 5000);
		foreach($total_new_user as $result)
		{
			$metrics = $result->getMetrics();
			$dimensions = $result->getDimesions();
			
			foreach($metrics as $k)
			{
				$total_new_users +=  $k;
			}

		}

		return $total_new_user;

	}

	/**
     * Construct the GoogleAnalytics.
     *
     * @param date $fromDate
     * @param date $toDate
     * @return int 
     *
     */	

	public function total_pageviews($fromDate,$toDate){

		$dimensions = array('source','pagePath');
		$metrics = array('pageviews');
		$sort = '';
		$filter = '';
		$pageviews = '';
		$total_pageviews = $this->ga->requestReportData(self::PROFILEID, $dimensions, $metrics, $sort, $filter , $fromDate, $toDate,1, 5000);
		foreach($total_pageviews as $result)
			{
				$metrics = $result->getMetrics();
				$dimensions = $result->getDimesions();
				foreach($metrics as $k)
				{
							$pageviews +=  $k;
				}

			}
		return $pageviews;

	}

	/**
     * Construct the GoogleAnalytics.
     *
     * @param date $fromDate
     * @param date $toDate
     * @return array 
     *
     */	

	public function pageviewsPerSession($fromDate,$toDate){

		$dimensions = array('source','pagePath');
		$metrics = array('pageviews','sessions');
		$sort = '';
		$filter = '';
		$mostPopular = $this->ga->requestReportData(self::PROFILEID, $dimensions, $metrics, $sort, $filter , $fromDate, $toDate,1, 5000);
		return $mostPopular;

	}

	/**
     * Construct the GoogleAnalytics.
     *
     * @param date $fromDate
     * @param date $toDate
     * @return array 
     *
     */	


	public function avgSessionDuration($fromDate,$toDate){

		$dimensions = array('source','pagePath');
		$metrics = array('sessionDuration','sessions');
		$sort = '';
		$filter = '';
		$mostPopular = $this->ga->requestReportData(self::PROFILEID, $dimensions, $metrics, $sort, $filter , $fromDate, $toDate,1, 5000);
		return $mostPopular;

	}
	
	/**
     * Construct the GoogleAnalytics.
     *
     * @param date $fromDate
     * @param date $toDate
     * @return array 
     *
     */	

	public function total_bounces($fromDate,$toDate){

		$dimensions = array('source','pagePath');
		$metrics = array('bounces','sessions');
		$sort = '';
		$filter = '';
		$mostPopular = $this->ga->requestReportData(self::PROFILEID, $dimensions, $metrics, $sort, $filter , $fromDate, $toDate,1, 5000);
		return $mostPopular;

	}

}

?>