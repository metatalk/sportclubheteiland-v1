<?php

add_action( 'gform_after_submission_4', 'post_to_third_party', 10, 2 );
function post_to_third_party( $entry, $form ) {

/*  $post_url = 'https://cloud3.clubplanner.be/heteiland/registration/registeruser';

  $body = array(
    'aFirstname' => rgar( $entry, '1.3' ),
    'aName' => rgar( $entry, '1.6' ),
    'aEmail' => rgar( $entry, '3' ),
    'aMobile' => rgar( $entry, '2' )
  );
  //GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );


  $request = new WP_Http();
  $response = $request->get( $post_url.'?'.http_build_query($body));
  var_dump($response['body']);
  //GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );
  */
}
