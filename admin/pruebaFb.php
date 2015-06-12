<?php define('FACEBOOK_SDK_V4_SRC_DIR', '../../sdkFb/src/Facebook/');
require __DIR__ . '../../sdkFb/autoload.php'; 

use Facebook\FacebookSession;
// add other classes you plan to use, e.g.:
// use Facebook\FacebookRequest;
// use Facebook\GraphUser;
// use Facebook\FacebookRequestException;
require_once( '../sdkFb/src/Facebook/FacebookSession.php' );
FacebookSession::setDefaultApplication('447488998607535', '3db5eab2832a80a6d330f94beb37e12b');
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

if($session) {

  try {

    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    $response = (new FacebookRequest(
      $session, 'POST', '/me/photos', array(
        'source' => new CURLFile('img/BASE-KAOZRADIO-CHICO.jpg', 'image/jpg'),
        'message' => 'KaozRadio.com difundiendo lo mejor de lo nuestro'
      )
    ))->execute()->getGraphObject();

    // If you're not using PHP 5.5 or later, change the file reference to:
    // 'source' => '@/path/to/file.name'

    echo "Posted with id: " . $response->getProperty('id');

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

}?>