<?php

namespace Ahsay;

use Ahsay\Api\User\User;

class Client
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $application = 'obs';

    private $instances = [];

    /**
     * @var string
     */
    private $server;

    /**
     * @var array
     */
    private $curlOptions = [];

    /**
     * Client constructor.
     * @param string $login
     * @param string $password
     * @param string $server
     * @param array $curlOptions
     */
    public function __construct(string $login, string $password, string $server, array $curlOptions = [])
    {
        $this->login = $login;
        $this->password = $password;
        $this->server = $server;
        $this->curlOptions = $curlOptions;
    }

    /**
     * @param string $endpoint
     * @param array $body
     * @param string|null $version
     * @param string|null $application
     * @return array
     */
    public function request(
        string $endpoint,
        array $body = [],
        string $version = null,
        string $application = null
    ): array {
        if (!empty($version)) {
            $endpoint = sprintf('%s/%s', $version, $endpoint);
        }

        $endpoint = sprintf('%s/%s/api/json/%s', $this->server, $application ?? $this->application, $endpoint);

        $data = array_merge(
            [
                'SysUser' => $this->login,
                'SysPwd' => $this->password
            ],
            $body
        );
        $data_string = json_encode($data);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        } elseif ($data_string === false) {
            throw new \RuntimeException('Could not create request body');
        }

        $ch = curl_init($endpoint);
        if ($ch === false) {
            throw new \RuntimeException('Could not create Curl resource');
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        curl_setopt_array($ch, $this->curlOptions);

        $result = curl_exec($ch);

        if (curl_errno($ch) !== 0) {
            throw new \RuntimeException(curl_error($ch), curl_errno($ch));
        } elseif ($result === false) {
            throw new \RuntimeException('Invalid response from resource server');
        } elseif ($result === true) {
            return [];
        }

        $data = json_decode($result, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        }

        if (isset($data['Status']) && $data['Status'] === 'OK' && isset($data['Data'])) {
            return $data['Data'];
        }

        return $data;
    }
}
