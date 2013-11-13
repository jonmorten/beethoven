<?php

namespace OhSeven\Beethoven\ApiBundle\Lib;

class Curl
{

    public static function call ( $url )
    {
        $resource = curl_init();

        $options = array(
            CURLOPT_URL => $url,
//            CURLOPT_POSTFIELDS => $post,
            CURLOPT_USERAGENT => 'Our old friend, Ludwig Van',

            CURLOPT_AUTOREFERER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 10,

            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => false,
            CURLOPT_ENCODING => '',// Handle all encodings
            CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt_array( $resource, $options );

        $content = explode( "\r\n\r\n", curl_exec( $resource ), 2 );
        $header = $content[0];
        $body = $content[1];

        $response = array(
            'body' => $body,
            'header' => $header,
            'error' => curl_errno( $resource ),
            'error_message' => curl_error( $resource ),
            'info' => curl_getinfo( $resource ),
        );
        curl_close( $resource );

        return $response;
    }

}
