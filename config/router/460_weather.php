<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Weather controller.",
            "mount" => "weather",
            "handler" => "\malp16\Weather\WeatherController",
        ],
    ]
];
