<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 28/12/21
 * Time: 11:03
 */

namespace app\config;

class Cors
{
    public static function settings(): array
    {
        return [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                // restrict access to
                'Origin' => self::allowedDomains(),
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['*'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 0,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];
    }

    private static function allowedDomains(): array
    {
        return [
            "http://localhost:8080",
            "*"
        ];
    }
}