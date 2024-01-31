 <?php



    function getUsername($conn, $username)
    {
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
        return ($row !== null) ? $row : false;
    };

    function getEmail($conn, $email)
    {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
        return ($row !== null) ? $row : false;
    };

    function  setUser($conn, $username, $email, $pwd)
    {
        $sql = "INSERT INTO users (username,email,pwd) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $stmt->bind_param('sss', $username, $email,  $hashedPwd);
        $stmt->execute();
    };
