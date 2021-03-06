<?php

/**
 * ownCloud - ProtOn files plugin
 *
 * @author Antonio Espinosa
 * @copyright 2013 Protección Online, S.L. info@prot-on.com
 *
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 *
 */
 
 if (!in_array('curl', get_loaded_extensions())) {
    \OCP\Util::writeLog("ProtOn", 'This app needs cUrl PHP extension', \OCP\Util::DEBUG);
    return false;
}

if (!function_exists('proton_include')) {
    include_once 'apps/files_proton/common/includes.php';
    proton_include('files_proton');
}
 

if (\OCA\Proton\Util::isOAuthConfigured()) {
    OC::$CLASSPATH['OCA\Proton\OAuthClient']='files_proton/lib/oAuthClient.php';
    OC::$CLASSPATH['OCA\Proton\OAuthPersist']='files_proton/lib/oAuthPersist.php';
    \OCP\Util::connectHook('OCA\Proton\OAuth', 'token_renew', 'OCA\Proton\OAuthPersist', 'storeToken');   
}
if (\OCA\Proton\Util::checkProtOnUser() || \OCA\Proton\Util::isOAuthConfigured()) { //If there is no oauth and the user is not a Prot-On user then it can not use Prot-On features
    OCP\Util::addScript('files_proton', 'proton');
    OCP\Util::addSCript('files_proton', 'mimetype');
    OCP\Util::addStyle('files_proton', 'proton');
    
    if (\OC_Config::getValue( "files_proton_dnd_url" )) {
        OCP\Util::addScript('files_proton', 'dndEnabled');    
    }
     
}

OCP\App::registerAdmin( 'files_proton', 'settings' );

