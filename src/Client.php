<?php

namespace Bestit\HipChat;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    const COLOR_YELLOW = 'yellow';
    const COLOR_RED = 'red';
    const COLOR_PURPLE = 'purple';
    const COLOR_GRAY = 'gray';
    const COLOR_RANDOM = 'random';

    const FORMAT_HTML = 'html';
    const FORMAT_TEXT = 'text';

    const BASE_URL = 'https://api.hipchat.com';

    /** @var string $token */
    private $token;
    /** @var GuzzleClient|null $client */
    private $client;

    /**
     * Client constructor.
     *
     * @param string $token
     * @param string|null $url
     * @param GuzzleClient|null $client
     */
    public function __construct($token, $url = null, $client = null)
    {
        $this->token = $token;
        $url = rtrim($url ?? self::BASE_URL, '/');
        $this->client = $client ?? new GuzzleClient(['base_uri' => $url]);
    }

    /**
     * Get room api.
     *
     * @param string|int $nameOrId
     * @return Room
     */
    public function room($nameOrId)
    {
        return new Room($this, $nameOrId);
    }

    /**
     * Get user api.
     *
     * @param string|int $emailOrId
     * @return User
     */
    public function user($emailOrId)
    {
        return new User($this, $emailOrId);
    }

    /**
     * Execute a POST request with the given parameters.
     *
     * @param string $uri
     * @param array|string $body
     * @param array $headers
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($uri, $body, array $headers = [])
    {
        $defaultHeaders = [
            'Authorization' => "Bearer {$this->token}",
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];

        $headers = array_merge($headers, $defaultHeaders);

        return $this->client->post($uri, [
            'headers' => $headers,
            'body' => $body
        ]);
    }
}
