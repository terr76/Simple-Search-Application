<?php

/**
 * Message class
 *
 * handles the message after success or fail 
 */

namespace Mini\Core;

class Message
{
    /**
     * renders the feedback messages into the view
     */
    public static function renderFeedbackMessages()
    {
        // get the feedback (they are arrays, to make multiple positive/negative messages possible)
        $feedback_positive = Session::get('feedback_positive');
        $feedback_negative = Session::get('feedback_negative');

        $output = '';

        // echo out positive messages
        if (isset($feedback_positive)) {
            foreach ($feedback_positive as $feedback) {

            $output = '<div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Success:</span>'.$feedback.'</div>';
            }
        }

        // echo out negative messages
        if (isset($feedback_negative)) {
            foreach ($feedback_negative as $feedback) {

            $output = '<div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>'.$feedback.'</div>';

            }
        }

        // delete these messages (as they are not needed anymore and we want to avoid to show them twice
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);

        return $output;
    }      
}
