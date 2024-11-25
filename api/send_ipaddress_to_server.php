<?php
function sendIpAddressToRemoteServer($url, $data)
{
    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);                  // Remote URL
    curl_setopt($ch, CURLOPT_POST, true);                // Use POST method
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Data to send
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);       // Return response as string
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);               // Set timeout
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    // Execute cURL request and get the response
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
        return false;
    }

    // Close cURL session
    curl_close($ch);

    return $response;
}
