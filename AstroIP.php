<?php

declare(strict_types=1);

namespace astroip;

class AstroIP 
{
    public $api_key;
    public $ch;
    private $base_url = "https://astroip.co";

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    }

    public function lookupIP($ip, $hostname, $user_agent)
    {
        $url = $this->base_url + "/" + $ip + "/?api_key=" + $this->api_key;

        if ($hostname) {
            $url += "&h=1";
        }

        if ($user_agent) {
            $url += "&ua=1";
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        $body = curl_exec($ch);

        return $body;
    }
}
