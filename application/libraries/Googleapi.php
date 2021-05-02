<?php
/**
 * @package Google API :  Google Client API
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Contact Controller
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Googleapi 
{
    /**
     * Googleapi constructor.
     */
    public function __construct() {        
      // load google client api 
      require_once './vendor/autoload.php';
    //   require APPPATH."third_party/google-api-php/src/Google/autoload.php";
        $this->client = new Google_Client();
        $this->client->setApplicationName('Calendar Api');
        $this->ci =& get_instance();
        $this->ci->config->load('calendar');
        // $this->client->setAuthConfig(__FILE__.'/credentials.json');
        $this->client->setClientId($this->ci->config->item('client_id'));
        $this->client->setClientSecret($this->ci->config->item('client_secret'));
        $this->client->setRedirectUri($this->ci->config->base_url());
        $this->client->addScope(Google_Service_Calendar::CALENDAR);
        $this->client->addScope('profile');
        if ($this->client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $this->client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));
    
                // Exchange authorization code for an access token.
                $accessToken = $this->client->fetchAccessTokenWithAuthCode($authCode);
                $this->client->setAccessToken($accessToken);
    
                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($this->client->getAccessToken()));
        }
    }

    public function loginUrl() {
        return $this->client->createAuthUrl();
    }

    public function getAuthenticate() {
        return $this->client->authenticate();
    }

    public function getAccessToken() {
        return $this->client->getAccessToken();
    }

    public function setAccessToken() {
        return $this->client->setAccessToken();
    }

    public function revokeToken() {
        return $this->client->revokeToken();
    }

    public function client() {
        return $this->client;
    }

    public function getUser() {
        $google_ouath = new Google_Service_Oauth2($this->client);
        return (object)$google_ouath->userinfo->get();
    }

    public function isAccessTokenExpired() {
        return $this->client->isAccessTokenExpired();
    }
}
?>