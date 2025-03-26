<?php

namespace App\Helpers;

class EmailVerificationHelper
{
    public static function verify($email)
    {
        // 1️⃣ Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'The email format is invalid.';
        }

        $domain = substr(strrchr($email, "@"), 1);

        //  Check MX records
        if (!checkdnsrr($domain, 'MX')) {
            return 'The email domain is not valid or does not accept emails.';
        }
  
        // 3️⃣ Optional: Attempt SMTP verification (not reliable with public providers)
        // Most public providers will block this request, so we skip it for domains like gmail.com, yahoo.com, outlook.com
        $restrictedDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com'];
        if (!in_array(strtolower($domain), $restrictedDomains)) {
            if (!self::smtpCheckEmail($email, $domain)) {
                return 'The email address does not appear to be deliverable.';
            }
        }

        return true;
    }

    /**
     * Check if the email address is deliverable by simulating an SMTP conversation.
     *
     * @param string $email
     * @param string $domain
     * @return bool
     */
    private static function smtpCheckEmail($email, $domain)
    {
        $mxhosts = [];
        $weight = [];

        // Retrieve MX records for the domain
        getmxrr($domain, $mxhosts, $weight);

        if (empty($mxhosts)) {
            return false;
        }

        // Connect to the first available MX host
        $connectTo = $mxhosts[0];
        $connect = @fsockopen($connectTo, 25, $errno, $errstr, 10);

        if (!$connect) {
            return false;
        }

        // Start SMTP handshake and check recipient address
        fgets($connect, 1024);
        fputs($connect, "HELO " . $domain . "\r\n");
        fgets($connect, 1024);
        fputs($connect, "MAIL FROM: <check@{$domain}>\r\n");
        fgets($connect, 1024);
        fputs($connect, "RCPT TO: <{$email}>\r\n");
        $data = fgets($connect, 1024);
        fputs($connect, "QUIT\r\n");
        fclose($connect);

        // If server responds with code 250, the email is deliverable
        return (strpos($data, "250") !== false);
    }
}
