<?php

class EasyShare
{

    public $conn;

    public function __construct()
    {
        // host   user  pass dbName

        $host = "localhost";
        $user = "root";
        $pass = "11135984";
        $dbName = "easy_share";
        $this->conn = mysqli_connect($host, $user, $pass, $dbName) or die("Connection Fail");
    }



    //// find Signature ///

    public function save_resource($userid, $fileName, $fileType, $resourceName)
    {

        $query = "INSERT INTO `resource` (`resource_name`, `user_id`, `file_type`, `date`, `file_name`)
          VALUES (?, ?, ?, CURDATE(), ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siss", $resourceName, $userid, $fileType, $fileName);

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function find_resource($userid)
    {

        $query = "SELECT * FROM `resource` WHERE resource.user_id = ?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userid);

        $stmt->execute();
        $result = $stmt->get_result(); // Get the result set
        return $result;
    }
    public function find_all_user()
    {

        $query = "SELECT * FROM `user` WHERE 1;";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result(); // Get the result set
        return $result;
    }
    public function find_all_resource()
    {

        $query = "SELECT *,(SELECT user.name FROM user WHERE user.id=resource.user_id)AS sender FROM `resource`;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result(); // Get the result set
        return $result;
    }

    function getBaseUrl()
    {
        // Check if HTTPS is enabled
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

        // Get the server name and port
        $host = $_SERVER['HTTP_HOST'];

        // Get the folder path of the script
        $path = dirname($_SERVER['SCRIPT_NAME']);
        $path = rtrim($path, '/');

        // Combine to form the base URL
        return $protocol . $host . $path . '/';
    }
    function delete_resource($userid, $file_id)
    {
        $query = "DELETE FROM `resource` WHERE resource.user_id = ? AND resource.id=?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $userid, $file_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
