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

include_once 'apps/files_proton/common/includes.php';
 
OCP\App::registerAdmin( 'files_proton', 'settings' );
OCP\Util::addScript('files_proton', 'proton');
OCP\Util::addStyle('files_proton', 'proton');

OCP\Util::addscript('files_proton', 'jquery.fancybox-1.3.4.pack');
OCP\Util::addStyle( 'files_proton', 'jquery.fancybox-1.3.4' );


