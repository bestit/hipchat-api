<?php

namespace Bestit\HipChat;

/**
 * Class User
 *
 * @package Bestit\HipChat
 */
class User
{
    /** @var Client $client */
    private $client;
    /** @var string|int $user */
    private $user;

    /**
     * User constructor.
     *
     * @param Client $client
     * @param string|int $user
     */
    public function __construct(Client $client, $user)
    {
        $this->client = $client;
        $this->user = $user;
    }

    /**
     * Send a message to the given user.
     *
     * @param string $message
     * @param bool $alert
     * @param string $format
     * @return bool
     * @throws \Exception
     */
    public function notify(
        $message,
        $alert = false,
        $format = Client::FORMAT_TEXT
    ) {
        $query = json_encode([
            'message' => $message,
            'notify' => $alert,
            'format' => $format
        ]);

        $response = $this->client->post("/v2/user/{$this->user}/message", $query);

        if ($response->getStatusCode() === 204) {
            return true;
        }

        //TODO: add proper exception.
        throw new \Exception($response->getBody(), $response->getStatusCode());
    }
}
