<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 28/12/21
 * Time: 11:07
 */

namespace api\controllers;

use app\config\Cors;
use yii\web\Response;

class BaseController extends \yii\rest\Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);
        // add CORS filter
        $behaviors['corsFilter'] = Cors::settings();
        // re-add authentication filter
        $behaviors['authenticator'] = $auth;
        // content Negotiator
        $behaviors['contentNegotiator']['formats'] = [
            'application/json' => Response::FORMAT_JSON,
        ];
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }
}