<?php 

namespace RBVue;

use GuzzleHttp\Cookie\SessionCookieJar;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Remote {

    public $base_uri = 'https://rbframework.com.br/projetos/vue-php/';
    private $client;
    private $session;

    private function getClient() {
        if(isset($this->client)) return $this->client;
        $this->session = new SessionCookieJar('PHPSESSID', true);
        $options = [
            'base_uri' => $this->base_uri,
            'verify' => false,
            'timeout'  => 10.0,
            //'cookies' => $session,
            'allow_redirects' => [
                'max' => 60,        // allow at most 10 redirects.
                'strict' => false,      // use "strict" RFC compliant redirects.
                'referer' => true,      // add a Referer header
                'protocols' => ['http', 'https'], // only allow https URLs
                'track_redirects' => true
            ],                
        ];
        if(isset($this->session)) {
            $options['cookies'] = $this->session;
        }        
        if(!isset($this->client)) {
            $this->client = new Client($options);
        }
        return $this->client;

    }


    public static function getJson($uri):array {
        $client = (new self())->getClient();
        $request = new Request('GET', $uri);
        $response = $client->send($request);
        $body = $response->getBody();
        $json = json_decode($body->getContents(), true);
        return $json;
    }
    
    public static function getHtml($uri, string $return = 'contents') {
        $client = (new self())->getClient();
        $request = new Request('GET', $uri);
        $response = $client->send($request);
        if($return == 'headers') {
            return $response->getHeaders();
        } else
        if($return == 'response') {
            return $response;
        } else
        if($return == 'contents') {
            $body = $response->getBody();
            $html = $body->getContents();
            return $html;
        }
    }
    
    public static function postJson($uri, $data, $return = 'array') {
        $client = (new self())->getClient();
        $request = new Request('POST', $uri, [
            'Content-Type' => 'application/json;charset=utf-8'
        ], json_encode($data));
        $response = $client->send($request);
        $body = $response->getBody();
        if($return == 'array') {
            $json = json_decode($body->getContents(), true);
            return $json;
        } else {
            return $body->getContents();
        }
    }
    
    public static function postData($uri, $data, $return = 'array') {
        $client = (new self())->getClient();
        $request = new Request('POST', $uri, [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ], http_build_query($data));
        $response = $client->send($request);
        $body = $response->getBody();
        if($return == 'array') {
            $json = json_decode($body->getContents(), true);
            return $json;
        } else {
            return $body->getContents();
        }
    }

}