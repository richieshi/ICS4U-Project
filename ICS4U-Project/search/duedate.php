<!--
duedate.php
Created by Richie Shi on June 2, 2013
Last Modified June 2, 2013
-->

<?php
	function calc_due_date( $date, $interval, $add, $return_date_format='Y-m-d' ) {
		$date  =  strtotime( $date );
		if( $date !== -1 )
		{
			$date  =  getdate( $date );
			switch( strtolower($interval) ) {
				case  'month'  :  $date['mon']  +=  $add;  break;
				case  'day'    :  $date['mday'] +=  $add;  break;
				default        :  $date['year'] +=  $add;
			}
		return( date($return_date_format, mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year'])) );
	}
	return( false );
	}

	function get_date() {
		date_default_timezone_set('America/Toronto');
		return (date("Y-m-d"));
	}
?>