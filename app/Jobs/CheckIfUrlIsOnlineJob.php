<?php

namespace App\Jobs;

use App\Url;
use App\UrlHistory;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckIfUrlIsOnlineJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Url
     */
    protected $url;

    /**
     * CheckIfUrlIsOnlineJob constructor.
     *
     * @param Url $url
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @param Client $client
     *
     * @return void
     */
    public function handle(Client $client)
    {
        $response = $client->get($this->url->host, [
            'http_errors' => false
        ]);

        $status = $response->getStatusCode();
        $headers = $response->getHeaders();
        $body = $response->getBody()->getContents();

        UrlHistory::create([
            'url_id' => $this->url->id,
            'status' => $status,
            'headers' => json_encode($headers),
            'body' => $body,
        ]);
    }
}
