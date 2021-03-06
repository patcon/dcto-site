<?php

/**
 * @file
 * Default theme implementation to display an iCal event.
 *
 * Available variables:
 * - $event: An array with the following information about each event:
 *   - $event['uid']: A unique id for the event (usually the url).
 *   - $event['summary']: The name of the event.
 *   - $event['start']: The formatted start date of the event.
 *   - $event['end']: The formatted end date of the event.
 *   - $event['rrule']: The RRULE of the event, if any.
 *   - $event['timezone']: The formatted timezone name of the event, if any.
 *   - $event['url']: The url for the event.
 *   - $event['location']: Either the name of the event location, or a vvenue
 *     location id.
 *   - $event['description']: A description of the event.
 *   - $event['alarm']: An optional array of alarm values.
 *
 * If you are editing this file, remember that all output lines generated by it
 * must end with DOS-style \r\n line endings, and not Unix-style \n, in order to
 * be compliant with the iCal spec.
 *
 * @see http://tools.ietf.org/html/rfc5545#section-3.1
 * @see date-valarm.tpl.php.
 *
 * @ingroup themeable
 */

$date = date_now('UTC');
$current_date = !empty($event['current_date']) ? $event['current_date'] : $date->format(DATE_FORMAT_ICAL);
print "BEGIN:VEVENT\r\n";
print "UID:" . $event['uid'] . "\r\n";
print "SUMMARY:" . $event['summary'] . "\r\n";
print "DTSTAMP:" . $current_date . "Z\r\n";
print "DTSTART:" . $event['start'] . "Z\r\n";
if (!empty($event['end'])):
  print "DTEND:" . $event['end'] . "Z\r\n";
endif;
if (!empty($event['rrule'])):
  print $event['rrule'] . "\r\n";
endif;
if (!empty($event['url'])):
  print "URL;VALUE=URI:" . $event['url'] . "\r\n";
endif;
if (!empty($event['location'])):
  print "LOCATION:" . $event['location'] . "\r\n";
endif;
if (!empty($event['description'])):
  print "DESCRIPTION:" . $event['description'] . "\r\n";
endif;
print "END:VEVENT\r\n";
