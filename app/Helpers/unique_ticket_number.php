<?php
// app/helpers.php

if (!function_exists('unique_ticket_number')) {
    /**
     * Generate the next unique ticket number based on the given prefix and the last sequence.
     *
     * @param string $prefix
     * @param string $last_sequence
     * @return string
     */
    function unique_ticket_number($prefix, $last_sequence)
    {
        // Validate the prefix to ensure it contains only alphabetic characters
        if (!preg_match('/^[a-zA-Z]+$/', $prefix)) {
            throw new InvalidArgumentException("The prefix should contain only alphabetic characters.");
        }

        // Extract the current number from the last sequence
        $pattern = '/^' . preg_quote($prefix, '/') . '-(\d+)$/';
        if (preg_match($pattern, $last_sequence, $matches)) {
            $current_number = (int) $matches[1];
        } else {
            throw new InvalidArgumentException("The last sequence format is invalid.");
        }

        do {
            $current_number++;
            $next_sequence = $prefix . '-' . str_pad($current_number, strlen($matches[1]), '0', STR_PAD_LEFT);
            $ticket = \App\Models\Ticket::where('ticket_number', $next_sequence)->first();
        } while ($ticket);

        // Return the new unique ticket number
        return $next_sequence;
    }
}
