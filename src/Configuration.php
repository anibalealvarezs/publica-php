<?php

namespace PublicaPHP;

use PublicaPHP\Api\OrdersApi;
use PublicaPHP\Api\UsersApi;

class Configuration
{
    private static Configuration $defaultConfiguration;

    protected string $apiKey = "";
    protected string $account = '';
    protected string $host = '';
    protected bool $debug = false;
    protected string $debugFile = 'php://output';
    protected string $tempFolderPath;
    protected int $timeout = 120;
    public UsersApi $users;
    public OrdersApi $orders;

    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();

        $this->orders = new OrdersApi($this);
        $this->users = new UsersApi($this);
    }

    public function setConfig($config = array()): Configuration
    {
        $apiKey = $config['apiKey'] ?? '';
        $url = $config['url'] ?? '';

        // Bearer Authentication
        if (!empty($apiKey) && !empty($url)) {
            $this->setHost($url);
            $this->setApiKey($apiKey);
        }

        if (isset($config['timeout'])) {
            $this->timeout = $config['timeout'];
        }

        return $this;
    }

    public function setApiKey($key): Configuration
    {
        $this->apiKey = $key;
        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey ?? null;
    }

    public function setHost($host): Configuration
    {
        $this->host = $host;
        return $this;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setDebug($debug): Configuration
    {
        $this->debug = $debug;
        return $this;
    }

    public function getDebug(): bool
    {
        return $this->debug;
    }

    public function setDebugFile($debugFile): Configuration
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

    public function setTempFolderPath($tempFolderPath): Configuration
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public static function getDefaultConfiguration(): Configuration
    {
        if (self::$defaultConfiguration === null) {
            self::$defaultConfiguration = new Configuration();
        }

        return self::$defaultConfiguration;
    }

    public static function setDefaultConfiguration(Configuration $config)
    {
        self::$defaultConfiguration = $config;
    }

    public static function toDebugReport(): string
    {
        $report  = 'PHP SDK (PublicaPHP) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    OpenAPI Spec Version: 0.0.1' . PHP_EOL;
        $report .= '    SDK Package Version: 0.0.1' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }
}
