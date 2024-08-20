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

function calculateDiscount($originalPrice, $discountPercent): float
{
    // Validate the parameters
    if ($originalPrice < 0 || $discountPercent < 0 || $discountPercent > 100) {
        return $originalPrice;
    }

    // Calculate the discount amount
    $discountAmount = ($originalPrice * $discountPercent) / 100;

    // Calculate the final price after discount
    return $originalPrice - $discountAmount;

}

function calculateFreeTicket($quantity, $buy, $get): float|int
{
    if ((int) $quantity > 0 && (int) $buy > 0 && (int) $get > 0) {
        // Calculate the number of sets of 'buy' items
        $setsOfBuy = floor($quantity / (int) $buy);

        // Return the number of free items
        return $setsOfBuy * (int) $get;
    } else {
        return 0;
    }
}

if (! function_exists('formatNumber')) {
    function formatNumber($num)
    {
        if ($num >= 1000000000000000000) {
            return number_format($num / 1000000000000000000, 2).'Q';
        } elseif ($num >= 1000000000000000) {
            return number_format($num / 1000000000000000, 2).'Q';
        } elseif ($num >= 1000000000000) {
            return number_format($num / 1000000000000, 2).'T';
        } elseif ($num >= 1000000000) {
            return number_format($num / 1000000000, 2).'B';
        } elseif ($num >= 1000000) {
            return number_format($num / 1000000, 2).'M';
        } elseif ($num >= 1000) {
            return number_format($num / 1000, 2).'K';
        } else {
            return $num;
        }
    }
}

if (! function_exists('has_permission')) {
    function has_permission(string $permission): bool
    {
        return auth()->check() ? auth()->user()->hasPermissionTo($permission) : false;
    }
}

if (! function_exists('has_any_permission')) {
    function has_any_permission(array $permissions): bool
    {
        return auth()->check() ? auth()->user()->hasAnyPermission($permissions) : false;
    }
}

if (! function_exists('generatePassword')) {
    function generatePassword($length = 8): string
    {
        // Characters to be included in the password
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $password = '';

        // Generate a random password
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        return $password;
    }
}

if (! function_exists('mask_email')) {
    /**
     * Mask an email address like 'max****@gmail.com'.
     *
     * @param  string  $email
     */
    function mask_email($email): string
    {
        $email_parts = explode('@', $email);
        $name_part = $email_parts[0];
        $domain_part = '@'.$email_parts[1];

        // Mask the email by revealing the first three characters and adding stars
        $name_length = strlen($name_part);
        $mask_length = $name_length > 3 ? $name_length - 3 : 1;
        $masked_name = substr($name_part, 0, 3).str_repeat('*', $mask_length);

        return $masked_name.$domain_part;
    }
}
function getFileName($file): string
{
    return time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
}
