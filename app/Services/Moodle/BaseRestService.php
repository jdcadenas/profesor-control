<?php

namespace App\Services\Moodle;


use App\Services\RestService;
use DateTime;

class BaseRestService {

    /**
     * Set request params.
     *
     * @var array
     */
    protected $params = [];

    /**
     * Set request url
     *
     * @var string
     */
    protected $url;

    /**
     * Set rest service connection.
     *
     * @var RestService
     */
    protected $service;

    public function __construct() {
        $this->url = config('settings.moodle_rest_api_url');
        $this->params = [
            'moodlewsrestformat' => 'json',
            'wstoken' => config('settings.moodle_rest_api_token'),
        ];

        $this->service = new RestService();
    }

    /**
     * Create data formated string from timestamp
     *
     * @param int $ts
     * @return string
     */
    protected static function toDateTime($ts) {
        if ($ts === 0) {
            return '';
        }
        $date = new DateTime("@$ts");
        return $date->format('Y-m-d H:i:s e');
    }
}