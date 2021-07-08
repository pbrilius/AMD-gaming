<?php
/**
 * 2007-2021 PayPal
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author 2007-2021 PayPal
 * @copyright PayPal
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace PaypalAddons\classes\API\Request;

use PaypalAddons\classes\API\Response\Error;
use PaypalAddons\classes\API\Response\PaypalResponseAccessToken;
use PayPalCheckoutSdk\Core\AccessTokenRequest;
use PayPalHttp\HttpException;
use Symfony\Component\VarDumper\VarDumper;

class PaypalAccessTokenRequest extends RequestAbstract
{
    public function execute()
    {
        $response = new PaypalResponseAccessToken();

        try {
            $accessToken = $this->client->execute(new AccessTokenRequest($this->client->environment));

            if ($accessToken->statusCode == 200) {
                $response->setSuccess(true)
                    ->setAccessToken($accessToken->result->access_token)
                    ->setData($accessToken);
            } else {
                $response->setSuccess(false)->setData($accessToken);
            }
        } catch (HttpException $e) {
            $error = new Error();
            $resultDecoded = json_decode($e->getMessage());
            $error->setMessage($resultDecoded->error_description)->setErrorCode($e->getCode());
            $response->setSuccess(false)
                ->setError($error);
        } catch (\Exception $e) {
            $error = new Error();
            $error->setErrorCode($e->getCode())
                ->setMessage($e->getMessage());
            $response->setSuccess(false)
                ->setError($error);
        }

        return $response;
    }
}
