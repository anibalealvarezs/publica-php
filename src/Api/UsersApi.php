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

class UsersApi
{
    use ApiTrait;

    const END_POINT = '/integration-api/v1/dashboard/users';

    public function getAllUsers($page = null, $per_page = '10', $query = null)
    {
        return $this->getAllUsersWithHttpInfo($page, $per_page, $query);
    }

    public function getAllUsersWithHttpInfo($page = null, $per_page = '10', $query = null)
    {
        $request = $this->getAllUsersRequest($page, $per_page, $query);

        return $this->performRequest($request);
    }

    protected function getAllUsersRequest($page = null, $per_page = '10', $query = null): Request
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
        $this->serializeParam($queryParams, $query, 'query');

        // body params
        $headers = $this->setHeaders($headerParams);

        return $this->queryAndRequestGet($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function deactivateUser($user_id)
    {
        $this->deactivateUserWithHttpInfo($user_id);
    }

    public function deactivateUserWithHttpInfo($user_id)
    {
        $request = $this->deactivateUserRequest($user_id);

        return $this->performRequest($request);
    }

    protected function deactivateUserRequest($user_id): Request
    {
        // verify the required parameter 'user_id' is set
        $this->checkRequiredParameter($user_id);

        $resourcePath = self::END_POINT . '/{user_id}';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $this->pathParam($resourcePath, 'user_id', $user_id);

        // body params
        $headers = $this->setHeaders($headerParams);

        return $this->queryAndRequestDelete($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function reactivateUser($user_id)
    {
        $this->reactivateUserWithHttpInfo($user_id);
    }

    public function reactivateUserWithHttpInfo($user_id)
    {
        $request = $this->reactivateUserRequest($user_id);

        return $this->performRequest($request);
    }

    protected function reactivateUserRequest($user_id): Request
    {
        // verify the required parameter 'user_id' is set
        $this->checkRequiredParameter($user_id);

        $resourcePath = self::END_POINT . '/{user_id}/re-activate';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $this->pathParam($resourcePath, 'user_id', $user_id);

        // body params
        $headers = $this->setHeaders($headerParams);

        return $this->queryAndRequestPut($queryParams, $resourcePath, $headers, $httpBody);
    }

    /* public function getUser($list_id, $email)
    {
        return $this->getUserWithHttpInfo($list_id, $email);
    }

    public function getUserWithHttpInfo($list_id, $email)
    {
        $request = $this->getUserRequest($list_id, $email);

        return $this->performRequest($request);
    }

    protected function getUserRequest($list_id, $email): Request
    {
        // verify the required parameter 'list_id' is set
        $this->checkRequiredParameter($list_id);
        // verify the required parameter 'subscriber_hash' is set
        $this->checkRequiredParameter($email);

        $resourcePath = self::END_POINT . '/{list_id}/subscribers/{email}';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $this->pathParam($resourcePath, 'list_id', $list_id);
        $this->pathParam($resourcePath, 'email', $email);

        // body params
        $headers = $this->setHeaders($headerParams);

        return $this->queryAndRequestGet($queryParams, $resourcePath, $headers, $httpBody);
    } */

    public function updateUser($user_id, $body)
    {
        return $this->updateUserWithHttpInfo($user_id, $body);
    }

    public function updateUserWithHttpInfo($user_id, $body)
    {
        $request = $this->updateUserRequest($user_id, $body);

        return $this->performRequest($request);
    }

    protected function updateUserRequest($user_id, $body): Request
    {
        // verify the required parameter '$user_id' is set
        $this->checkRequiredParameter($user_id);
        // verify the required parameter 'body' is set
        $this->checkRequiredParameter($body);

        $resourcePath = '/api/v1/dashboard/users/{user_id}';
        $queryParams = [];
        $headerParams = [];

        $this->pathParam($resourcePath, 'user_id', $user_id);

        $headers = $this->setHeaders($headerParams);

        // body params
        // for model (json/xml)
        $httpBody = $this->encodeBodyWhenJSON($body, $headers);

        return $this->queryAndRequestPut($queryParams, $resourcePath, $headers, $httpBody);
    }

    public function createUser($body)
    {
        return $this->createUserWithHttpInfo($body);
    }

    public function createUserWithHttpInfo($body)
    {
        $request = $this->createUserRequest($body);

        return $this->performRequest($request);
    }

    protected function createUserRequest($body): Request
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
