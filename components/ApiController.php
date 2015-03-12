<?php

namespace app\components;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class ApiController extends Controller
{
	const RSP_STATUS_CODE = 'statusCode';
	const RSP_HAS_ERROR = 'hasError';
	const RSP_DATA = 'data';

    public function init() {
        parent::init();
    }

    // static member to form default response
    protected static function defaultResponse($result)
    {
    	$statusCode = $result[self::RSP_STATUS_CODE];
    	$hasError = $result[self::RSP_HAS_ERROR];
    	$data = $result[self::RSP_DATA];
        
        $response = Yii::$app->getResponse();
        $response->setStatusCode($statusCode);
        $response->format = Response::FORMAT_JSON;
        $statusText = Response::$httpStatuses[$statusCode];

        $responseData = [
            'error' => $hasError ? '1' : '0',
            'status' => $statusCode,
            'statusText' => $statusText,
            'body' => $data
        ];
        
        return $responseData;
    }

    // registering JSON API format after each action
    public function afterAction($action, $result)
	{
		$result = parent::afterAction($action, $result);
		$response = self::defaultResponse($result);
	    return $response;
	}
}