<?php

// Include the database connection file

include_once "./connection.php";

// Retrieve the IP address from the POST request
// If the 'ipAddress' field is not set in the POST request, it will default to null
$ipAddress = $_POST['ipAddress'] ?? null;

/**
 * Function to save the IP address and current date to the 'resource' table in the database
 *
 * @param mysqli $conn - The database connection object
 * @param string $ipAddress - The IP address to be inserted
 * @return bool - Returns true if the query executed successfully, false otherwise
 */
function save_resource($conn, $ipAddress)
{
    // Prepare the SQL query to insert the current date (CURDATE()) and the IP address into the 'resource' table
    $query = "INSERT INTO `resource` (`date`,`ip_address`)
              VALUES ( CURDATE(), ?)";

    // Prepare the statement for execution
    $stmt = $conn->prepare($query);

    // Bind the parameter to the prepared statement
    // "s" indicates the type of the parameter (string)
    $stmt->bind_param("s", $ipAddress);

    // Execute the query and store the result (true if success, false if failure)
    $result = $stmt->execute();

    // Close the prepared statement to free up resources
    $stmt->close();

    // Return the result of the execution (true/false)
    return $result;
}

// Call the save_resource function, passing the database connection and the IP address
$result = save_resource($conn, $ipAddress);

// Check if the result of the save operation was successful
if ($result) {
    // If successful, display a success message
    echo "IP Address added in remote server!";
} else {
    // If the operation failed, display 'false' or an error message
    echo false;
}

// Close the database connection (if it is not already done in the connection file)
// $conn->close();  // Uncomment this line if needed for closing the connection after operation
