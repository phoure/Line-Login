<?php

Class LineClass {

    //constructor
    function __construct() {
        $this->grant_type = 'authorization_code';
        $this->direct_uri = "http://www.line.lctip.com/line.php";
        $this->post_accesstoken_url = 'https://api.line.me/v1/oauth/accessToken';
        $this->get_profile_url = 'https://api.line.me/v1/profile';
    }

    public function lineAuth($code, $client_id, $client_secret) {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        //Check if the code is exist
        if (!empty($code)) {
            //Send data to LINE API
            $data = array(
                'grant_type' => $this->grant_type,
                'code' => $code,
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'direct_uri' => $this->direct_uri,
            );

            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context = stream_context_create($options);
            $result = file_get_contents($this->post_accesstoken_url, false, $context);
            //Decode the json
            $obj = json_decode($result);
            //Get access token
            $access_token = $obj->{'access_token'};
            //Send access_token to API
            // Create a stream
            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Authorization: bearer " . $access_token . "\r\n"
                )
            );

            $context = stream_context_create($opts);

// Open the file using the HTTP headers set above
            $file = file_get_contents($this->get_profile_url, false, $context);
            var_dump($file);
        } else {
            echo 'error granted';
        }
    }

}
