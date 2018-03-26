<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Welcome.php
 *
 * Present the course homepage.
 * 
 * Learn CodeIgniter website, template driven
 *
 */
class Welcome extends Application {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Default entry point
     */
    function index() {
        $course = $this->course->metadata();
        $this->data = array_merge($this->data, (array) $course);

        $this->data['organizer'] = $this->format_organizer($this->organizer->raw());

        $this->data['pagetitle'] = $course->title;
        $this->data['pagebody'] = 'learn';
        $this->render();
    }

    /**
     * Extract & format the materials & resources, by week
     */
    private function format_organizer($stuff) {
        $num = 1;

        // Recognized activity types
        $valid = array('lesson', 'video', 'tutorial', 'lab',
            'assignment', 'example', 'github', 'download', 'pdf');

        $result = '';
        foreach ($stuff as $week) {
            $number = (int) $week['num'];
            $topic = (string) $week->topic;

            // Collect the activities for this week
            $partial = '';
            foreach ($week->children() as $activity) {
                $type = (string) isset($activity['type']) ?
                        $activity['type'] : $activity->getName();
                if (in_array($type, $valid)) {
                    $item = (string) $activity;
                    $name = (string) $activity['name'];
                    $pdf = (string) $activity['pdf'];
                    $active = ((string) $activity['active']) != 'n';
                    $duedate = (string) isset($activity['duedate']) ?
                            ' (due ' . $activity['duedate'] . ')' : '';
                    $survey = (string) $activity['survey'];
                    $link = (string) $activity['link'];

                    // over-rides for special icons
                    $icon = (string) isset($activity['icon']) ?
                            $activity['icon'] : $type;

                    $parms = array('type' => $type, 'item' => $item,
                        'name' => $name, 'typed' => ucfirst($type),
                        'duedate' => $duedate, 'pdf' => $pdf,
                        'icon' => $icon, 'survey' => $survey,
                        'ou' => $this->data['ou'],
                        'link' => $link);

                    // replace survey code with appropriate link
                    if (isset($activity['survey']))
                        $parms['survey'] = $this->parser->parse('theme/_survey', $parms, true);

                    // use external domain if so configured
                    $site = (string) isset($activity['domain']) ?
                            'http://' . $activity['domain'] : '';
                    $parms['site'] = $site;

                    // generate a download link for PDF; not sure this is needed
                    $download = (string) isset($activity['pdf']) ?
                            $this->parser->parse('theme/_download', $parms, true) : '';
                    $parms['download'] = $download;
					$parms['download'] = '';	// cripple this until PDF generation in place

                    // build the proper presentation link
                    $kind = $this->organizer->kind($type, $name);
                    $thelink = $this->parser->parse('theme/_show', $parms, true);
                    if (!empty($link))
                        $thelink = $this->parser->parse('theme/_link', $parms, true);
                    if ($kind == 'md')
                        $thelink = $this->parser->parse('theme/_display', $parms, true);
					if ($kind == 'pdf')
                        $thelink = $this->parser->parse('theme/_pdf', $parms, true);
                    $parms['thelink'] = $thelink;

                    // build the optional presentation links
                    $thelinks = $this->parser->parse('theme/__display', $parms, true);
                    // cripple this until PDF generation in place
                    //if ($kind != 'pdf')
                    //    $thelinks .= $this->parser->parse('theme/__pdf', $parms, true);
                    $thelinks = ' | ' . $thelinks;
                    if (!empty($link))
                        $thelinks = '';
                    $parms['thelinks'] = $thelinks;

                    // distinguish between active or not activities
                    $target = $active ? 'theme/_activity' : 'theme/_almost';

                    // generate, finally, the single line for the organizer
                    $partial .= $this->parser->parse($target, $parms, true);
                }
            }

            $parms = array('number' => $number, 'topic' => $topic,
                'activities' => $partial, 'num' => $num ++);
            $result .= $this->parser->parse('theme/_week', $parms, true);
        }
        return $result;
    }

    /**
     * Extract & format the learning resources
     */
    private function format_resources($resources) {
        $result = '';
        foreach ($resources as $resource) {
            $result .= $this->parser->parse('theme/_resource', (array) $resource, true);
        }
        return $result;
    }

}
