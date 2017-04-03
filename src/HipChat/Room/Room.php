<?php

namespace Bestit\HipChat;

class Room
{
    /** @var Client $client */
    private $client;
    /** @var int|string $room */
    private $room;

    /**
     * Room constructor.
     *
     * @param Client $client
     * @param string|int $room
     */
    public function __construct(Client $client, $room)
    {
        $this->client = $client;
        $this->room = $room;
    }

    /**
     * Send a notification to the given room.
     *
     * @param string $message
     * @param string $color
     * @param bool $alert
     * @param string $format
     * @return bool
     * @throws \Exception
     */
    public function notify(
        $message,
        $color = Client::COLOR_YELLOW,
        $alert = false,
        $format = Client::FORMAT_TEXT
    ) {
        $query = json_encode([
            'message' => $message,
            'color' => $color,
            'notify' => $alert,
            'format' => $format
        ]);

        $response = $this->client->post("/v2/room/{$this->room}/notification", $query);

        if ($response->getStatusCode() === 204) {
            return true;
        }

        //TODO: add proper exception.
        throw new \Exception($response->getBody(), $response->getStatusCode());
    }
}
