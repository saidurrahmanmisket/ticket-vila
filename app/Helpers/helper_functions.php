<?php

//Helper functions

if (! function_exists('locale')) {
    function locale(): string
    {
        return app()->getLocale();
    }
}

function convertToEmbedUrl($url)
{
    // Parse the URL to get its components
    $parsed_url = parse_url($url);

    if (isset($parsed_url['host'])) {
        // Check if the URL is already an embed URL
        if (strpos($parsed_url['host'], 'youtube.com') !== false && strpos($parsed_url['path'], '/embed/') === 0) {
            return $url; // It's already an embed URL
        }

        switch ($parsed_url['host']) {
            case 'youtu.be':
                // Extract the video ID from the path for youtu.be
                $video_id = ltrim($parsed_url['path'], '/');
                $query_params = isset($parsed_url['query']) ? '?'.$parsed_url['query'] : '';
                $embed_url = "https://www.youtube.com/embed/$video_id$query_params";
                break;

            case 'www.youtube.com':
            case 'youtube.com':
                // Extract the query parameters from the URL for youtube.com/watch
                parse_str($parsed_url['query'], $query_params);
                if (isset($query_params['v'])) {
                    $video_id = $query_params['v'];
                    $embed_url = "https://www.youtube.com/embed/$video_id";
                } else {
                    return $url;
                }
                break;

            default:
                return $url;
        }

        return $embed_url;
    }

    return $url;
}

function calculateDiscount($originalPrice, $discountPercent): float|int
{
    // Validate the parameters
    if ($originalPrice < 0 || $discountPercent < 0 || $discountPercent > 100) {
        return $originalPrice;
    }

    // Calculate the discount amount
    $discountAmount = ($originalPrice * $discountPercent) / 100;

    // Calculate the final price after discount
    return number_format($originalPrice - $discountAmount);
}

function calculateFreeTicket($quantity, $buy, $get): float|int
{
    // Calculate the number of sets of 'buy' items
    $setsOfBuy = floor($quantity / $buy);

    // Return the number of free items
    return $setsOfBuy * $get;
}
