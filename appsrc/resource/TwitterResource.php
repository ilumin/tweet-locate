<?php
namespace App\Resource;

use Endroid\Twitter\Twitter;

class TwitterResource
{
    /**
     * @var Twitter
     */
    public $twitterClient;

    public function __construct($twitterClient)
    {
        $this->twitterClient = $twitterClient;
    }

    public function search($searchParams)
    {
        $response = $this->twitterClient->query('search/tweets', 'GET', 'json', $searchParams);
        $response = json_decode($response->getContent(), true);
        return $response['statuses'];
    }

}
