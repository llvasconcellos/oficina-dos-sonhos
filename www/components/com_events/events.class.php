<?php
// $Id: events.class.php,v 1.12 2005/11/30 10:39:10 g_edwards Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Thanks to Andrew Eddie for his mosEventDate Class

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class mosEvents extends mosDBTable {
        var $id = null;
        var $sid = null;
        var $catid = null;  
        var $title = null;
        var $content = null;  
        var $contact_info = null;
        var $adresse_info = null;
        var $extra_info = null;
        var $color_bar = null;
        var $useCatColor = null;
        var $state = null;
        var $mask = null;
        var $created = null;
        var $created_by = null;
        var $created_by_alias = null;
        var $modified = null;
        var $modified_by = null;
        var $checked_out = null;
        var $checked_out_time = null;
        var $publish_up = null;
        var $publish_down = null;
        var $images = null;
        var $reccurtype = null;
        var $reccurday = null;
        var $reccurweekdays = null;
        var $reccurweeks = null;  
        var $approved = null;
        var $ordering = null;
        var $archived = null;  
        var $access = null;
        var $hits = null;

    function mosEvents( &$db ) {
        $this->mosDBTable( '#__events', 'id', $db );
    }

    function check() {
        // check for valid name
        if (trim( $this->title ) == '') {
            $this->_error = "Your Events must contain a title.";
            return false;
        }
        return true;
    }
  
    function hit( $oid=null ) {
        $k = $this->_tbl_key;
        if ($oid !== null) {
            $this->$k = intval( $oid );
        }
        $this->_db->setQuery( "UPDATE #__events SET hits=(hits+1) WHERE id=$this->id" );
        $this->_db->query();
    }
}

class mosEventDate {
        var $year=null;
        var $month=null;
        var $day=null;
        var $hour=null;
        var $minute=null;
        var $second=null;

    function mosEventDate( $datetime='' ) {
        if (ereg("([0-9]{4})-([0-9]{2})-([0-9]{2})[ ]([0-9]{2}):([0-9]{2}):([0-9]{2})",$datetime,$regs)) {
	    $this->setDate( $regs[1], $regs[2], $regs[3] );
	    $this->hour   = intval( $regs[4] );
	    $this->minute = intval( $regs[5] );
	    $this->second = intval( $regs[6] );

            $this->month = max( 1, $this->month );
	    $this->month = min( 12, $this->month );

	    $this->day = max( 1, $this->day );
	    $this->day = min( $this->daysInMonth(), $this->day );
	} else {
            //$now = date( "Y-m-d H:i:s", time()+$mosConfig_offset*60*60 );
	    $this->setDate( date( "Y" ), date( "m" ), date( "d" ) );
	    $this->hour   = 0;
	    $this->minute = 0;
	    $this->second = 0;
	}
    }

    function setDate( $year=0, $month=0, $day=0 ) {
	$this->year   = intval( $year );
	$this->month  = intval( $month );
	$this->day    = intval( $day );

	$this->month = max( 1, $this->month );
	$this->month = min( 12, $this->month );

	$this->day = max( 1, $this->day );
	$this->day = min( $this->daysInMonth(), $this->day );
    }

    function getYear( $asString=false ) {
	return $asString ? sprintf( "%04d", $this->year ) : $this->year;
    }

    function getMonth( $asString=false ) {
	return $asString ? sprintf( "%02d", $this->month ) : $this->month;
    }

    function getDay( $asString=false ) {
	return $asString ? sprintf( "%02d", $this->day ) : $this->day;
    }

    function get12hrTime( ){
    	$hour=$this->hour;
		if ($hour > 12) $hour -= 12;
		else if($hour == 0) $hour = 12;
	$time = sprintf("%d:%02d", $hour, $this->minute);
	return ($this->hour >= 12) ? $time."pm" : $time."am";
    }
    
    function get24hrTime( ){
	return sprintf("%02d:%02d", $this->hour, $this->minute);
    }
        
    function toDateURL() {
	return( 'year=' . $this->getYear( 1 )
		. '&amp;month=' . $this->getMonth( 1 )
		. '&amp;day=' . $this->getDay( 1 )
	);
    }
    
    /**
    * Utility function for calculating the days in the month
    *
    * If no parameters are supplied then it uses the current date
    * if 'this' object does not exist
    * @param int The month
    * @param int The year
    */
    function daysInMonth( $month=0, $year=0 ) {
	$month = intval( $month );
	$year = intval( $year );
	if (!$month) {
	    if (isset( $this )) {
	        $month = $this->month;
	    } else {
		$month = date( "m" );
	    }
	}
	if (!$year) {
            if (isset( $this )) {
		$year = $this->year;
	    } else {
		$year = date( "Y" );
            }
	}
        if ($month == 2) {
            if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
                return 29;
            }   return 28;
        } else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
            return 30;
        }  return 31;
    }
    /**
    * Adds (+/-) a number of months to the current date.
    * @param int Positive or negative number of months
    * @author Andrew Eddie <eddieajau@users.sourceforge.net>
    */
    function addMonths( $n=0 ) {
	$an = abs( $n );
	$years = floor( $an / 12 );
	$months = $an % 12;

	if ($n < 0) {
	    $this->year -= $years;
	    $this->month -= $months;
	    if ($this->month < 1) {
	        $this->year--;
		$this->month = 12 - $this->month;
	    }
	} else {
	    $this->year += $years;
	    $this->month += $months;
            if ($this->month > 12) {
	        $this->year++;
		$this->month -= 12;
	    }
	}
    }

    function addDays( $n=0 ) {
        $days = $this->toDays();
	$this->fromDays( $days + $n );
    }

    /** 
    * Converts a date to number of days since a
    * distant unspecified epoch.
    *
    * !!Based on PEAR library function!!
    * @param string year in format CCYY
    * @param string month in format MM
    * @param string day in format DD
    * @return integer number of days
    */
    function toDays( $day=0, $month=0, $year=0) {
	if (!$day) {
	    if (isset( $this )) {
	        $day = $this->day;
	    } else {
		$day = date( "d" );
	    }
	}
	if (!$month) {
            if (isset( $this )) {
	        $month = $this->month;
	    } else {
		$month = date( "m" );
	    }
	}
	if (!$year) {
            if (isset( $this )) {
	        $year = $this->year;
	    } else {
		$year = date( "Y" );
	    }
	}

	$century = floor( $year / 100 );
        $year = $year % 100;

        if($month > 2) {
            $month -= 3;
        } else {
            $month += 9;
            if ($year) {
                $year--;
            } else {
                $year = 99;
                $century --;
            }
        }

        return ( floor( (146097 * $century) / 4 ) +
            floor( (1461 * $year) / 4 ) +
            floor( (153 * $month + 2) / 5 ) +
            $day + 1721119);
    } // end func dateToDays

    /**
    * Converts number of days to a distant unspecified epoch.
    *
    * !!Based on PEAR library function!!
    * @param int number of days
    * @param string format for returned date
    */
    function fromDays( $days ) {
        $days -=   1721119;
        $century =    floor( ( 4 * $days - 1) /  146097 );
        $days =    floor( 4 * $days - 1 - 146097 * $century );
        $day =    floor( $days /  4 );

        $year =    floor( ( 4 * $day +  3) /  1461 );
        $day =    floor( 4 * $day +  3 -  1461 * $year );
        $day =    floor( ($day +  4) /  4 );

        $month = floor( ( 5 * $day -  3) /  153 );
        $day = floor( 5 * $day -  3 -  153 * $month );
        $day = floor( ($day +  5) /  5 );

        if ($month < 10) {
            $month +=3;
        } else {
            $month -=9;
            if ($year++ == 99) {
                $year = 0;
                $century++;
            }
        }

	$this->day = $day;
	$this->month = $month;
	$this->year = $century*100 + $year;
    } // end func daysToDate
}

class mosEventRepeat {
	var $row=null;
	var $year=null;
	var $month=null;
	var $day=null;
	var $viewable=null;
	//function added by Christopher L. Coker (chris.coker@alumni.clemson.edu) 14-MAR-05 to fix bug with recurring events
	function dayInterval($date1, $date2) {
		$day_interval = 0;
		//if(date("L", $date1)) $day_interval += 1;

		$year = date("Y", $date1);
		for($i = 0; $year < date("Y", $date2); ) {
  			$year = date("Y", mktime(0, 0, 0, 1, 1, date("Y", $date1) + ++$i ) );
 	 		$day_interval += 365;
			if(date("L", mktime(0, 0, 0, 1, 1, $year-1))) $day_interval += 1;
		}
    	return $day_interval;
	}
	
    function mosEventRepeat( $row=null, $year=null, $month=null, $day=null ) {	
        if(is_null($row)) return false;
	$select_date = sprintf( "%4d-%02d-%02d", $year, $month, $day );    
        $numero_du_jour = date("w",mktime(0,0,0,$month,$day,$year));  
        if($numero_du_jour == 0){
//		asdbg_break();
	}
	$end_of_month = date("t",mktime(0,0,0,($month+1),0,$year));  
       
        $event_up = new mosEventDate( $row->publish_up );	        
        $start_publish = sprintf( "%4d-%02d-%02d",$event_up->year,$event_up->month,$event_up->day);
        $start_hours = $event_up->hour;
        $start_minutes = $event_up->minute;
        $event_day = $event_up->day;            
        $event_month = $event_up->month;    
        $event_year = $event_up->year;   
	        
        $event_down = new mosEventDate( $row->publish_down );	        
        $stop_publish = sprintf( "%4d-%02d-%02d",$event_down->year,$event_down->month,$event_down->day);
        $end_hours = $event_down->hour;
        $end_minutes = $event_down->minute;
	                     
        $repeat_event_type =  $row->reccurtype;
        $repeat_event_day = $row->reccurday; 
        $repeat_event_weekdays = $row->reccurweekdays;  
        $repeat_event_weeks = $row->reccurweeks; 
    
        $this->viewable = false;
        $is_the_event_period = false;
        $is_the_event_day = false;
        $is_the_event_daynumber = false;
        $is_the_event_dayname = false;        
        
        // Week begin day and finish day 
        $startday = _CAL_CONF_STARDAY;            
        $numday=((date("w",mktime(0,0,0,$month,$day,$year))-$startday)%7);               
        if ($numday == -1){
           $numday = 6;
        } 
        $week_start = mktime (0, 0, 0, $month, ($day - $numday), $year );              
        $this_week_date = new mosEventDate();
        $this_week_date->setDate( date ( "Y", $week_start ),date ( "m", $week_start ),date ( "d", $week_start ));        
        $this_week_end_date = $this_week_date;
        $this_week_end_date->addDays( +6 );
   
        $start_weekday = $this_week_date->day;
        $end_weekday = $this_week_end_date->day;
        
         /* Weeks check process */
          $is_week_1 = false;
          $is_week_2 = false;
          $is_week_3 = false;
          $is_week_4 = false;
          $is_week_5 = false;
          
          // dmcd oct 4th.  This is really screwed up and non-intuitive.  Changing the 'week of the month'
          // to reflect the true week of the month according to the defined start day of a week.  The first
          // week of a month may be a partial week, as well as the last week. If someone schedules an event
          // to happen the 'first Saturday of every month', then that should be relfected properly here.
          
          // By 7 to 7 periode 
          if ( (intval($day) <= 7) ) {
             $is_week_1 = true; 
          } elseif ( (intval($day) > 7) && (intval($day) <= 14) ) {
             $is_week_2 = true;
          } elseif ( (intval($day) > 14) && (intval($day) <= 21) ) {
             $is_week_3 = true;
          } elseif ( (intval($day) > 21) && (intval($day) <= 28) ) {
             $is_week_4 = true;                          
          } elseif ( (intval($day) >= 28) ) {
             $is_week_5 = true; 
          }              
         
         /*  
          // By week 
          if ( (intval($day) <= 7) ) {
             $is_week_1 = true;
          } elseif ( (intval($end_weekday) > 7) && (intval($end_weekday) <= 14) ) {
             $is_week_2 = true;
          } elseif ( (intval($end_weekday) > 14) && (intval($end_weekday) <= 21) ) {
             $is_week_3 = true;
          } elseif ( (intval($end_weekday) > 21) && (intval($end_weekday) <= 28) ) {
             $is_week_4 = true;                          
          } elseif ( (intval($end_weekday) >= 28) ) {
             $is_week_5 = true; 
          }                                          
          */      
                    
        // Check event time parametres
        if (($select_date <= $stop_publish) && ($select_date >= $start_publish)) {
            $is_the_event_period = true;
        }
        if ($event_day == $day){
            $is_the_event_day = true;	
        }
        if ($numero_du_jour == $repeat_event_day) {
            $is_the_event_dayname = true;    
        } 
        $viewable_day = 0;
        if ($repeat_event_weekdays <> "") {		
            $reccurweekdays = explode( '|', $repeat_event_weekdays );
	    $countdays = count($reccurweekdays);
	    for ($x=0; $x < $countdays; $x++){ 		    	                                                                                       
                if ($reccurweekdays[$x] == $numero_du_jour) {
                           $viewable_day = 1;
                }
            }
        }
        
        // Check event weeks parametres    
        $pair_weeks = 0; 
        $impair_weeks = 0;
        $viewable_week = 0;
        
        if ($repeat_event_weeks <> "") {		
            $reccurweeks = explode( '|', $repeat_event_weeks );
            $countweeks = count($reccurweeks);
            for ($x=0; $x < $countweeks; $x++){ 		    	                                                                                       
                if ($reccurweeks[$x] == "pair") {
                    $pair_weeks = 1;
                } elseif ($reccurweeks[$x] == "impair") {
                    $impair_weeks = 1;
                }
               
                if (($reccurweeks[$x] == 1) && ($is_week_1)) {
                    $viewable_week = 1;                     
                } elseif (($reccurweeks[$x] == 2) && ($is_week_2)) {
                    $viewable_week = 1;                    
                } elseif (($reccurweeks[$x] == 3) && ($is_week_3)) {
                    $viewable_week = 1;                    
                } elseif (($reccurweeks[$x] == 4) && ($is_week_4)) {
                    $viewable_week = 1;                   
                } elseif (($reccurweeks[$x] == 5) && ($is_week_5)) {                    
                    $viewable_week = 1;                    
                }                                             
            }
        } else {
            $viewable_week = 1;
        }
     
        // Check repeat
        if ($is_the_event_period){ 
            switch ($repeat_event_type) {
                case 0: // All days 
                    $this->viewable = true;
                    return $this->viewable;
                break;
            
                case 1: // By week - 1* by week
				    //added by Christopher L. Coker (chris.coker@alumni.clemson.edu) 14-MAR-05 to fix bug with recurring events
					if($repeat_event_day == -1) {
						$temp = $event_day;
					} else {
						$temp = $event_day+$repeat_event_day-date("w", mktime(0, 0, 0, $event_month, $event_day, $event_year));
						if($temp < $event_day) $temp+=7;
					}
					
					$event_start_date = mktime(0, 0, 0, $event_month, $temp, $event_year);
					$cell_date = mktime(0, 0, 0, $month, $day, $year);
										
					if(($pair_weeks && is_integer((date("z", $cell_date)+$this->dayInterval($event_start_date, $cell_date)-date("z", $event_start_date))/14))
					   || ($impair_weeks && is_integer((date("z", $cell_date)+$this->dayInterval($event_start_date, $cell_date)-date("z", $event_start_date))/21)) 
					   || ($viewable_week)) {
						if($repeat_event_day >= 0) {
							if($is_the_event_dayname) {
	                        	$this->viewable = true;
	                    	} 
						} else {
							$this->viewable = true;
						}
					}
					return $this->viewable;
					//end bug fix by Chris Coker
					
                    /*original code
					if (  ($pair_weeks && is_integer($day/2))
                       	  || ($impair_weeks && !is_integer($day/2))
                          || ($viewable_week) // && ($numero_du_jour <= 6))
                       ) {                                       
	                	if ($repeat_event_day ==-1 ) { //by day number
                    		if ($is_the_event_day 
                         		|| (($select_date >= $start_publish) && is_integer(($day - $event_day)/7))) {
                                	$this->viewable = true;
	                    	}
                    	 } elseif ($repeat_event_day >=0 ) { //by day name 
	                 		if ($is_the_event_dayname) {
	                        	$this->viewable = true;
	                    	}		
	                 	} 
	            	}
                    return $this->viewable;
					end original code*/
                break;
            
    	        case 2: // By week - n* by week  	        
					//added by Christopher L. Coker (chris.coker@alumni.clemson.edu) 15-MAR-05 to fix bug with recurring events
					$temp = $event_day+$reccurweekdays[0]-date("w", mktime(0, 0, 0, $event_month, $event_day, $event_year));
					
					foreach($reccurweekdays as $week_day) {
						if(date("w", mktime(0, 0, 0, $month, $day, $year)) == $week_day) {
						
						}
					}
					
					$event_start_date = mktime(0, 0, 0, $event_month, $temp, $event_year);
					$cell_date = mktime(0, 0, 0, $month, $day, $year);
					
						
					if( ($pair_weeks && fmod(date("z", $cell_date)+$this->dayInterval($event_start_date, $cell_date)-date("z", $event_start_date), 14) < 7)
						|| ($impair_weeks && fmod(date("z", $cell_date)+$this->dayInterval($event_start_date, $cell_date)-date("z", $event_start_date), 21) < 7) 
						|| ($viewable_week)) {
						if ($repeat_event_weekdays <> "") { //by day select 
	                    	if ($viewable_day) {
	                        	$this->viewable = true;
	                    	}		
	                	}
					}
					if(fmod(date("z", $cell_date)+$this->dayInterval($event_start_date, $cell_date)-date("z", $event_start_date), 7) < 0) {
						$this->viewable = false;
					}
					
					return $this->viewable;
					//end bug fix by Chris Coker
					
							      	                           
                    /*original code*/
					/*if (($pair_weeks && is_integer($day/2))
                          || ($impair_weeks && !is_integer($day/2))
                          || ($viewable_week) || ($occurs) // && ($numero_du_jour <= 6))) 
						 ) {
                    	if ($repeat_event_weekdays <> "") { //by day select 
	                    	if ($viewable_day) {
	                        	$this->viewable = true;
	                    	}		
	                	} 	                           
                    }
                    return $this->viewable;*/
					/*end original code*/
                break;
            
    	        case 3: // By month - 1* by month
                    if ($repeat_event_day ==-1 ) { //by day number
                        if ($is_the_event_day) {
                            $this->viewable = true;
                        }                           
                    } elseif ($repeat_event_day >=0 ) { //by day name 
                        if ($is_the_event_dayname) {
                            $this->viewable = true;
	                }		
	            }                                                
                    return $this->viewable;
                break;
            
                case 4: // By month - end of the month
                    if ($day == $end_of_month) { 
	                $this->viewable = true;
	            }                    
                    return $this->viewable;
                break;
            
                case 5: // By year - 1* by year                
                    if ($repeat_event_day ==-1 ) { //by day number
	                	if ($is_the_event_day && ($month == $event_month)) {
	                    	$this->viewable = true;
	               	 	}
	            	} elseif ($repeat_event_day >=0 ) { //by day name                               
	                	if ($is_the_event_dayname 
	                      && (($day >= $event_day) && ($day <= $event_day+6)) 
	                      && ($month == $event_month)) {
	                    	$this->viewable = true;
	                	}
	            	}         
                    return $this->viewable;
                break;
                           
                default:     
                    return $this->viewable;   
                break;
            } // end switch
        } else {
            return $this->viewable;
        }// end if    
    }
}

class mosEventsHTML{

    function buildRadioOption( $arr, $tag_name, $tag_attribs, $key, $text, $selected ) {  
        $html = ""; //"\n<div name=\"$tag_name\" $tag_attribs>";
        for ($i=0, $n=count( $arr ); $i < $n; $i++ ) {
            $k = $arr[$i]->$key;
	    $t = $arr[$i]->$text;

	    $sel = '';
	    if (is_array( $selected )) {
	        foreach ($selected as $obj) {
                    $k2 = $obj->$key;
		    if ($k == $k2) {
		        $sel = " checked=\"checked\"";
		        break;
		    }
	        }
	    } else {
                $sel = ($k == $selected ? " checked=\"checked\"" : '');
	    }
	    $html .= "\n\t<input name=\"".$tag_name."\" type=\"radio\"  value=\"".$k."\"".$sel." ".$tag_attribs."/>".$t;
        }
        //$html .= "\n</select>\n";
        return $html;
    }

    function buildReccurDaySelect($reccurday, $tag_name, $args) {
        $day_name = array("<font color=\"red\">"._CAL_LANG_SUNDAYSHORT."</font>",
                           _CAL_LANG_MONDAYSHORT,
                           _CAL_LANG_TUESDAYSHORT,
                           _CAL_LANG_WEDNESDAYSHORT,
                           _CAL_LANG_THURSDAYSHORT,
                           _CAL_LANG_FRIDAYSHORT,
                           _CAL_LANG_SATURDAYSHORT);        
        $daynamelist[] = mosHTML::makeOption( '-1', "&nbsp;"._CAL_LANG_BYDAYNUMBER."<br />" );
        for($a=0; $a<7; $a++) {    
            $name_of_day = "&nbsp;".$day_name[$a]; //getLongDayName($a);       
  	    $daynamelist[] = mosHTML::makeOption( $a, $name_of_day );
        }
        $tosend = mosEventsHTML::buildRadioOption( $daynamelist, $tag_name, $args, 'value', 'text', $reccurday ); //mosHTML::selectList
        echo $tosend;		        
    }

    function buildMonthSelect($month, $args) {
        for($a=1; $a<13; $a++) {
    	    $mnh = $a;
            if ($mnh<="9"&ereg("(^[0-9]{1})",$mnh)) {
  	        $mnh="0".$mnh;
  	    }     
            $name_of_month = mosEventsHTML::getMonthName($mnh);        		
  	    $monthslist[] = mosHTML::makeOption( $mnh, $name_of_month );
        }
        $tosend = mosHTML::selectList( $monthslist, 'month', $args, 'value', 'text', $month );
        echo $tosend;		        
    }

    function buildDaySelect($year, $month, $day, $args) {
        $nbdays = date("d",mktime(0,0,0,($month + 1),0,$year));        
        for($a=1; $a<=$nbdays; $a++) { //32
            $dys = $a;
            if ($dys<="9"&ereg("(^[1-9]{1})",$dys)) {
                $dys="0".$dys;
  	    }  		
  	    $dayslist[] = mosHTML::makeOption( $dys, $dys );                                      
        }
        $tosend = mosHTML::selectList( $dayslist, 'day', $args, 'value', 'text', $day );
        echo $tosend;
    }

    function buildYearSelect($year, $args) {
        $y=date("Y");             
        if($year<$y-2){
            $yearslist[] = mosHTML::makeOption( $year, $year );
        }
        for($i=$y-2;$i<=$y+5;$i++){    		                       	    				
            $yearslist[] = mosHTML::makeOption( $i, $i );
        }      	
        if($year>$y+5){
            $yearslist[] = mosHTML::makeOption( $year, $year );
        }   
        $tosend = mosHTML::selectList( $yearslist, 'year', $args, 'value', 'text', $year );
        echo $tosend;		
    }

    function buildViewSelect($viewtype, $args) {
        $viewlist[] = mosHTML::makeOption( 'view_day', _CAL_LANG_VIEWBYDAY );
  	$viewlist[] = mosHTML::makeOption( 'view_week', _CAL_LANG_VIEWBYWEEK );
  	$viewlist[] = mosHTML::makeOption( 'view_month', _CAL_LANG_VIEWBYMONTH );
  	$viewlist[] = mosHTML::makeOption( 'view_year', _CAL_LANG_VIEWBYYEAR );
  	$viewlist[] = mosHTML::makeOption( 'view_cat', _CAL_LANG_VIEWBYCAT ); 
  	$viewlist[] = mosHTML::makeOption( 'view_search', _SEARCH_TITLE ); 		
        $tosend = mosHTML::selectList( $viewlist, 'task', $args, 'value', 'text', $viewtype );
        echo $tosend;		
    }
    
    function buildHourSelect( $start, $end, $inc, $tag_name, $tag_attribs, $selected, $format="" ) {
	$start = intval( $start );
	$end = intval( $end );
	$inc = intval( $inc );
	$arr = array();
	$tmpi = "";
	for ($i=$start; $i <= $end; $i+=$inc) {	    
	    if (_CAL_CONF_DATEFORMAT == 1) { // US time
	        if ($i > 11) {
  	            $tmpi = ($i-12)." pm";  	        
  	        } else {
  	    	    $tmpi = $i." am";
  	        }
  	    } else {
  	        $tmpi = $format ? sprintf( "$format", $i ) : "$i";
  	    }  	    
  	    $fi = $format ? sprintf( "$format", $i ) : "$i";
	    $arr[] = mosHTML::makeOption( $fi, $tmpi );
	}
	return mosHTML::selectList( $arr, $tag_name, $tag_attribs, 'value', 'text', $selected );
    }
    /*
function buildHourSelect($hours, $args, $startofend) {   
   for($a=0; $a<24; $a++) {
        $hrs = $a;
        if ($hrs<="9"&ereg("(^[0-9]{1})",$hrs)) {
  	    $hrs="0".$hrs;
  	}        	    	
  	$hourslist[] = mosHTML::makeOption( $hrs, $hrs );
    }    	     
    $tosend = mosHTML::selectList( $hourslist, 'hours_'.$startofend, $args, 'value', 'text', $hours );
    echo $tosend;
}

function buildMinuteSelect($minutes, $args, $startofend) {          
    for($qrtm=0; $qrtm<60; $qrtm=$qrtm+15) {
        if ($qrtm<="9"&ereg("(^[0-9]{1})",$qrtm)) {
  	    $qrtm="0".$qrtm;
  	}        	    	
  	$minuteslist[] = mosHTML::makeOption( $qrtm, $qrtm );
    }    	
    $tosend = mosHTML::selectList( $minuteslist, 'minutes_'.$startofend, $args, 'value', 'text', $minutes );
    echo $tosend;
}
*/

    function buildCategorySelect($catid, $args){
        global $database, $gid, $option;
	    /* GWE change to allow Mambelfish support 
        $catsql = "SELECT id AS value, name AS text FROM #__categories"
	        . "\nWHERE section='$option' AND access<='$gid' AND published='1' ORDER BY ordering";	
	    */
        $catsql = "SELECT id, name FROM #__categories"
	        . "\nWHERE section='$option' AND access<='$gid' AND published='1' ORDER BY ordering";	
        // get list of categories
        /* GWE change to allow Mambelfish support 
        $categories[] = mosHTML::makeOption( '0', _CAL_LANG_EVENT_CHOOSE_CATEG );
        */
        $categories[] = mosHTML::makeOption( '0', _CAL_LANG_EVENT_CHOOSE_CATEG, 'id', 'name' );
        $database->setQuery($catsql);
        $categories = array_merge( $categories, $database->loadObjectList() );
        /* GWE change to allow Mambelfish support 
        $clist = mosHTML::selectList( $categories, 'catid', $args, 'value', 'text', $catid );
        */
        $clist = mosHTML::selectList( $categories, 'catid', $args, 'id', 'name', $catid );
        echo $clist;
    }
    
    function buildWeekDaysCheck($reccurweekdays, $args) {
        $day_name = array("<font color=\"red\">"._CAL_LANG_SUNDAYSHORT."</font>",
                           _CAL_LANG_MONDAYSHORT,
                           _CAL_LANG_TUESDAYSHORT,
                           _CAL_LANG_WEDNESDAYSHORT,
                           _CAL_LANG_THURSDAYSHORT,
                           _CAL_LANG_FRIDAYSHORT,
                           _CAL_LANG_SATURDAYSHORT);    
        $tosend = "";
        if ($reccurweekdays == ""){
            $split = array();
            $countsplit = 0;
        } else {
            $split = explode("|", $reccurweekdays);
            $countsplit = count($split);
        }
        
        for($a=0; $a<7; $a++) {   
            $checked = "";     	    	
            for ($x = 0; $x < $countsplit; $x++) {	    
	        if ($split[$x] == $a) {
	            $checked = "CHECKED";		
	         }
            }    	    	              
            $tosend .= "<input type=\"checkbox\" id=\"cb_wd".$a."\" name=\"reccurweekdays[]\" value=\"".$a."\" ".$args." ".$checked."/>&nbsp;".$day_name[$a]."\n";     
        }
        echo $tosend;		        
    }

    function buildWeeksCheck($reccurweeks, $args) {
        $week_name = array('',
                           _CAL_LANG_REP_WEEK." 1<br />",
                           _CAL_LANG_REP_WEEK." 2<br />",
                           _CAL_LANG_REP_WEEK." 3<br />",
                           _CAL_LANG_REP_WEEK." 4<br />",
                           _CAL_LANG_REP_WEEK." 5<br />");        
        $tosend = "";
        $checked = "";
    
        if ($reccurweeks == ""){
            $split = array();
            $countsplit = 0;                
        } else {
            $split = explode("|", $reccurweeks);
            $countsplit = count($split);
        }
        
        for($a=1; $a<6; $a++) {    	    	       	     	    	
            $checked = "";
            if ($reccurweeks == ""){ $checked = "CHECKED";}
            for ($x = 0; $x < $countsplit; $x++) {	    
	        if ($split[$x] == $a) {
		    $checked = "CHECKED";		
	         } 
            }    	    	              
            $tosend .= "<input type=\"checkbox\" id=\"cb_wn".$a."\" name=\"reccurweeks[]\" value=\"".$a."\" ".$args." ".$checked."/>&nbsp;".$week_name[$a]."\n";     
        }
        echo $tosend;		        
    }
        
    function getCategoryName($catid){
        global $database, $gid, $option;

        $catsql = "SELECT id, name FROM #__categories WHERE id='$catid'";	
        $database->setQuery($catsql);
        if ($categories = $database->loadObjectList()) {
	    $categories = $categories[0];
	    if ($categories){
                return $categories->name;
            }
	}
        return '';
    }

    function getUserMailtoLink($agid, $userid){
        global $database;
        $agenda_viewmail = _CAL_CONF_MAILVIEW;
        if ($userid) {    	
            $querym="SELECT username, email FROM #__users WHERE id='$userid'";
	    $database->setQuery($querym);
    	    $userdets = $database->loadObjectList();
    	    $userdet = $userdets[0];
            if ($userdet){    
	        if (($userdet->email) && ($agenda_viewmail=="YES")){
                    $contactlink = "<a href='mailto:$userdet->email'>$userdet->username</a>";           				           	        
	        } else {
	            $contactlink = $userdet->username;    
	        }	        
	    } 				       	    
        } else { 
    	    $querym="SELECT created_by_alias FROM #__events WHERE id='$agid'";	
	    $database->setQuery($querym);
    	    $userdet = $database->loadResult();
	    if ($userdet){
	        $contactlink = $userdet;  
	    } else {
                $contactlink = _CAL_LANG_ANONYME;
            }
        }
        return $contactlink;
    }
 	
    function getMonthName($month) {        
        $monthname ="";
        if ($month == "01") {
            $monthname = _CAL_LANG_JANUARY;
        } elseif ($month == "02") {
            $monthname = _CAL_LANG_FEBRUARY;
        } elseif ($month == "03") {
            $monthname = _CAL_LANG_MARCH;
        } elseif ($month == "04") {
            $monthname = _CAL_LANG_APRIL;
        } elseif ($month == "05") {
            $monthname = _CAL_LANG_MAY;
        } elseif ($month == "06") {
            $monthname = _CAL_LANG_JUNE;
        } elseif ($month == "07") {
            $monthname = _CAL_LANG_JULY;
        } elseif ($month == "08") {
            $monthname = _CAL_LANG_AUGUST;
        } elseif ($month == "09") {
            $monthname = _CAL_LANG_SEPTEMBER;
        } elseif ($month == "10") {
            $monthname = _CAL_LANG_OCTOBER;
        } elseif ($month == "11") {
            $monthname = _CAL_LANG_NOVEMBER;
        } elseif ($month == "12") {
            $monthname = _CAL_LANG_DECEMBER;
        }
        return $monthname;
    }

    function getLongDayName($daynb) { 
        $dayname = "";
        if ($daynb == "0") {
            $dayname = "<font color='red'>"._CAL_LANG_SUNDAY."</font>";
        } elseif ($daynb == "1") {
            $dayname = _CAL_LANG_MONDAY;
        } elseif ($daynb == "2") {
            $dayname = _CAL_LANG_TUESDAY;
        } elseif ($daynb == "3") {
            $dayname = _CAL_LANG_WEDNESDAY;
        } elseif ($daynb == "4") {
            $dayname = _CAL_LANG_THURSDAY;
        } elseif ($daynb == "5") {
            $dayname = _CAL_LANG_FRIDAY;
        } elseif ($daynb == "6") {
            $dayname = _CAL_LANG_SATURDAY;
        }
        return $dayname;
    }

    function getColorBar($event_id=null,$newcolor){
        global $database;
        if($event_id != null) {
            $database->setQuery( "SELECT color_bar FROM #__events WHERE id = '$event_id'" );
            $rows = $database->loadResultList();   
            $row = $rows[0];        
            if($newcolor){
    	        if ($newcolor <> $row->color_bar){
        	        $database->setQuery( "UPDATE #__events SET color_bar = '$newcolor' WHERE id = '$event_id'" );
        	        return $newcolor;
    	        }     	
            } else {
                return $row->color_bar;
            }        
        } else {
            // dmcd May 20/04  check the new config parameter to see what the default
			// color should be
			switch (_CAL_CONF_DEFCOLOR) {
				case 'none':
					return '';
				case 'category':
					// fetch the category color for this event?
					// Note this won't work for a new event since
					// the user can change the category on-the-fly
					// in the event entry form.  We need to dump a
					// javascript array of all the category colors
					// into the event form so the color can track the
					// chosen category.
					return '';
				case 'random':
				default:
					$event_id = rand(1,50);
    	    		// BAR COLOR GENERATION
    	    		//$start_publish = mktime (0, 0, 0, date("m"),date("d"),date("Y"));
	                             
            		//$colorgenerate = intval(($start_publish/$event_id));
            		//$bg1color = substr($colorgenerate, 5, 1);
            		//$bg2color = substr($colorgenerate, 3, 1);
            		//$bg3color = substr($colorgenerate, 7, 1);
            		$bg1color = rand(0,9);
            		$bg2color = rand(0,9);
            		$bg3color = rand(0,9);
            		$newcolorgen = "#".$bg1color."F".$bg2color."F".$bg3color."F";
       
            		return $newcolorgen;
            }
        }
    }

    /************** Date format ******************
    *       case "0":        
    *            // Fr style : Monday 23 Juillet 2003
    *            // Us style : Monday, Juillet 23 2003                   
    *       case "1":
    *            // Fr style : 23 Juillet 2003     
    *            // Us style : Juillet 23, 2003     
    *       case "2":
    *    	 // Fr style : 23 Juillet      
    *            // Us style : Juillet, 23     
    *       case "3":
    *    	 // Fr style : Juillet 2003     
    *            // Us style : Juillet 2003     
    *       case "4":
    *            // Fr style : 23/07/2003
    *            // Us style : 07/23/2003
    *       case "5":
    *            // Fr style : 23/07
    *            // Us style : 07/23
    *       case "6":
    *            // Fr style : 07/2003
    *            // Us style : 07/2003
    ********************************************/
    function getDateFormat($year,$month,$day, $type){     
        if(empty($year)) $year = 0;
        if(empty($month)) $month = 0;
        if(empty($day)) $day = 1;
        $format_type = _CAL_CONF_DATEFORMAT;
        $datestp = (mktime(0,0,0,$month,$day,$year));  
        $jour_fr= date("j", $datestp);    
        $numero_jour= date("w", $datestp); 
        $mois_fr= date("n", $datestp); 
        $mois_0= date("m", $datestp); 
        $annee=date("Y", $datestp);
        $newdate = "";
        switch ($type){
            case "0":
            if ($format_type == 0){
                // Fr style : Monday 23 Juillet 2003
                $newdate = mosEventsHTML::getLongDayName($numero_jour)."&nbsp;".$jour_fr."&nbsp;".mosEventsHTML::getMonthName($mois_0)."&nbsp;".$annee;
            } else if ($format_type == 1){
                // Us style : Monday, July 23 2003     
                $newdate = mosEventsHTML::getLongDayName($numero_jour).",&nbsp;".mosEventsHTML::getMonthName($mois_0)."&nbsp;".$jour_fr."&nbsp;".$annee;       
            } else {
                // De style : Montag, 23 Juli 2003
                $newdate = mosEventsHTML::getLongDayName($numero_jour).",&nbsp;".$jour_fr.".&nbsp;".mosEventsHTML::getMonthName($mois_0)."&nbsp;".$annee;            
            }
            break;                
                   
    	    case "1":
    	    if ($format_type == 0){
                // Fr style : 23 Juillet 2003     
                $newdate = $jour_fr."&nbsp;".mosEventsHTML::getMonthName($mois_0)."&nbsp;".$annee;
            } else if ($format_type == 1){
                // Us style : July 23, 2003     
                $newdate = mosEventsHTML::getMonthName($mois_0)."&nbsp;".$jour_fr.",&nbsp;".$annee;
            } else {
                // De style : 23. Juli 2003     
                $newdate = $jour_fr.".&nbsp;".mosEventsHTML::getMonthName($mois_0)."&nbsp;".$annee;
            }
            break;        
    	
            case "2":
    	    if ($format_type == 0){
                // Fr style : 23 Juillet      
                $newdate = $jour_fr."&nbsp;".mosEventsHTML::getMonthName($mois_0);
            } else if ($format_type == 1){
                // Us style : Juillet 23     
                $newdate = mosEventsHTML::getMonthName($mois_0)."&nbsp;".$jour_fr;
            } else {
                // De style : 23. Juli     
                $newdate = $jour_fr.".&nbsp;".mosEventsHTML::getMonthName($mois_0);
            }
            break;
    	
            case "3":
    	    if ($format_type == 0){
                // Fr style : Juillet 2003     
                $newdate = mosEventsHTML::getMonthName($mois_0)."&nbsp;".$annee;
            } else if ($format_type == 1){
                // Us style : Juillet 2003     
                $newdate = mosEventsHTML::getMonthName($mois_0)."&nbsp;".$annee;
            }  else {
                // De style : Juli 2003     
                $newdate = mosEventsHTML::getMonthName($mois_0)."&nbsp;".$annee;
            }        
            break;
             	
    	    case "4":
    	    if ($format_type == 0){
                // Fr style : 23/07/2003
    	        $newdate = $jour_fr."/".$mois_0."/".$annee;
            } else if ($format_type == 1){
                // Us style : 07/23/2003
                $newdate = $mois_0."/".$jour_fr."/".$annee;
            } else {
                // De style : 23.07.2003
                $newdate = $jour_fr.".".$mois_0.".".$annee;
            }    	
            break;
                        
            case "5":
            if ($format_type == 0){
                // Fr style : 23/07
                $newdate = $jour_fr."/".$mois_0;
            } else if ($format_type == 1){
                // Us style : 07/23
                $newdate = $mois_0."/".$jour_fr;
            } else {
                // De style : 23.07.
                $newdate = $jour_fr.".".$mois_0.".";
            }    	
            break;                      
                                 
            case "6":
            if ($format_type == 0){
                // Fr style : 07/2003
                $newdate = $mois_0."/".$annee; 
            } else if ($format_type == 1){
                // Us style : 07/2003
                $newdate = $mois_0."/".$annee; 
            } else {
                // De style : 07/2003
                $newdate = $mois_0."/".$annee; 
            }        
            break; 
                                           
            default:        
            break;
        }    
        return $newdate;
    }
}
?>
