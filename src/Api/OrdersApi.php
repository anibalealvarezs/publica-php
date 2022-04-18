<?php

/**
 * ListsApi
 * PHP version 8.1
 *
 * @category Class
 * @package  PublicaPHP
 * @author   Aníbal Álvarez
 * @link     https://github.com/anibalealvarezs/publica-php
 */

/**
 * FromDoppler API
 *
 * OpenAPI spec version: 0.0.1
 * Contact: anibalealvarezs@gmail.com
 */

namespace PublicaPHP\Api;

use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use PublicaPHP\ApiTrait;

class OrdersApi
{
    use ApiTrait;

    const END_POINT = '/integration-api/v1/orders';

    public function cancelOrder($order_id)
    {
        $this->cancelOrderWithHttpInfo($order_id);
    }

    public function cancelOrderWithHttpInfo($order_id)
    {
        $request = $this->cancelOrderRequest($order_id);

        return $this->performRequest($request);
    }

    protected function cancelOrderRequest($order_id): Request
    {
        // verify the required parameter 'order_id' is set
        $this->checkRequiredParameter($order_id);

        $resourcePath = self::END_POINT . '/{order_id}';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $this->pathParam($resourcePath, 'order_id', $order_id);

        // body params
        $headers = $this->setHeaders($headerParams);

        return $this->queryAndRequestDelete($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function cancelOrders($id_type, $body)
    {
        $this->cancelOrdersWithHttpInfo($id_type, $body);
    }

    public function cancelOrdersWithHttpInfo($id_type, $body)
    {
        $request = $this->cancelOrdersRequest($id_type, $body);

        return $this->performRequest($request);
    }

    protected function cancelOrdersRequest($id_type, $body): Request
    {
        // verify the required parameter 'id_type' is set
        $this->checkRequiredParameter($id_type);

        $resourcePath = self::END_POINT;
        $queryParams = [];
        $headerParams = [];

        $this->serializeParam($queryParams, $id_type, 'id_type');

        // body params
        $headers = $this->setHeaders($headerParams);

        // body params
        // for model (json/xml)
        $httpBody = $this->encodeBodyWhenJSON($body, $headers);

        return $this->queryAndRequestDelete($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function getAllOrders($page = null, $per_page = '10', $id_type = null, $user_email = null, $product_id = null, $product_type = null, $start_at = null, $end_at = null, $query = null)
    {
        return $this->getAllOrdersWithHttpInfo($page, $per_page, $id_type, $user_email, $product_id, $product_type, $start_at, $end_at, $query);
    }

    public function getAllOrdersWithHttpInfo($page = null, $per_page = '10', $id_type = null, $user_email = null, $product_id = null, $product_type = null, $start_at = null, $end_at = null, $query = null)
    {
        $request = $this->getAllOrdersRequest($page, $per_page, $id_type, $user_email, $product_id, $product_type, $start_at, $end_at, $query);

        return $this->performRequest($request);
    }

    protected function getAllOrdersRequest($page = null, $per_page = '10', $id_type = null, $user_email = null, $product_id = null, $product_type = null, $start_at = null, $end_at = null, $query = null): Request
    {
        if ($per_page !== null && $per_page > 100) {
            throw new InvalidArgumentException('invalid value for "$per_page" when calling UsersApi., must be smaller than or equal to 100.');
        }


        $resourcePath = self::END_POINT;
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $this->serializeParam($queryParams, $page, 'page');
        $this->serializeParam($queryParams, $per_page, 'per_page');
        $this->serializeParam($queryParams, $id_type, 'id_type');
        $this->serializeParam($queryParams, $user_email, 'user_email');
        $this->serializeParam($queryParams, $product_id, 'product_id');
        $this->serializeParam($queryParams, $product_type, 'product_type');
        $this->serializeParam($queryParams, $start_at, 'start_at');
        $this->serializeParam($queryParams, $end_at, 'end_at');
        $this->serializeParam($queryParams, $query, 'query');

        // body params
        $headers = $this->setHeaders($headerParams);

        return $this->queryAndRequestGet($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function getOrder($order_id)
    {
        return $this->getOrderWithHttpInfo($order_id);
    }

    public function getOrderWithHttpInfo($order_id)
    {
        $request = $this->getOrderRequest($order_id);

        return $this->performRequest($request);
    }

    protected function getOrderRequest($order_id): Request
    {
        // verify the required parameter 'list_id' is set
        $this->checkRequiredParameter($order_id);

        $resourcePath = self::END_POINT . '/{order_id}';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $this->pathParam($resourcePath, 'order_id', $order_id);

        // body params
        $headers = $this->setHeaders($headerParams);

        return $this->queryAndRequestGet($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function updateOrder($order_id, $body)
    {
        return $this->updateOrderWithHttpInfo($order_id, $body);
    }

    public function updateOrderWithHttpInfo($order_id, $body)
    {
        $request = $this->updateOrderRequest($order_id, $body);

        return $this->performRequest($request);
    }

    protected function updateOrderRequest($order_id, $body): Request
    {
        // verify the required parameter '$order_id' is set
        $this->checkRequiredParameter($order_id);

        $resourcePath = self::END_POINT . '/{order_id}';
        $queryParams = [];
        $headerParams = [];

        $this->pathParam($resourcePath, 'order_id', $order_id);

        $headers = $this->setHeaders($headerParams);

        // body params
        // for model (json/xml)
        $httpBody = $this->encodeBodyWhenJSON($body, $headers);

        return $this->queryAndRequestPut($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function createOrder($body)
    {
        return $this->createOrderWithHttpInfo($body);
    }

    public function createOrderWithHttpInfo($body)
    {
        $request = $this->createOrderRequest($body);

        return $this->performRequest($request);
    }

    protected function createOrderRequest($body): Request
    {
        // verify the required parameter 'body' is set
        $this->checkRequiredParameter($body);

        $resourcePath = self::END_POINT;
        $queryParams = [];
        $headerParams = [];

        $headers = $this->setHeaders($headerParams);

        // body params
        // for model (json/xml)
        $httpBody = $this->encodeBodyWhenJSON($body, $headers);

        return $this->queryAndRequestPost($queryParams, $resourcePath, $headers, $httpBody);
    }
}
