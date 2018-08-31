<?php
/**
 *  Copyright (c) Microsoft. All rights reserved. Licensed under the MIT license.
 *  See LICENSE in the project root for license information.
 *
 *  PHP version 5
 *
 *  @category Code_Sample
 *  @package  php-connect-rest-sample
 *  @author   Ricardo Loo <ricardol@microsoft.com>
 *  @license  MIT License
 *  @link     http://github.com/microsoftgraph/php-connect-rest-sample
 */

namespace Microsoft\Graph\Connect;

/**
 *  Stores constant and configuration values used through the app
 *
 *  @class    Constants
 *  @category Code_Sample
 *  @package  php-connect-rest-sample
 *  @author   Ricardo Loo <ricardol@microsoft.com>
 *  @license  MIT License
 *  @link     http://github.com/microsoftgraph/php-connect-rest-sample
 */
class Constants
{
    const CLIENT_ID = '1ca5b49f-85bc-419d-8a76-2ec9eb98a2b7';
    const CLIENT_SECRET = 'unmwDQ6^(-wszNFPGI8444:';
    const REDIRECT_URI = 'http://localhost/sinbug/';
    //const REDIRECT_URI = 'https://contraloriageneral.ugto.mx/sinbug/';
    const AUTHORITY_URL = 'https://login.microsoftonline.com/common';
    const AUTHORIZE_ENDPOINT = '/oauth2/v2.0/authorize';
    const TOKEN_ENDPOINT = '/oauth2/v2.0/token';
    const RESOURCE_ID = 'https://graph.microsoft.com';
    const SENDMAIL_ENDPOINT = '/v1.0/me/sendmail';
    const SCOPES='openid profile user.read mail.send calendars.read calendars.readwrite';
	
}
