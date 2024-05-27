<?php

if (!function_exists('generateOTP')) {
    /**
     * Generate a random OTP (One-Time Password)
     *
     * @param int $length
     * @return string
     */
    function generateOTP($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, $charactersLength - 1)];
        }
        return $otp;
    }
}
