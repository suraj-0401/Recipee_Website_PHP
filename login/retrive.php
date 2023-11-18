<?php
include 'partials/_dbconnect.php';
// $result = mysqli_query($conn, "SELECT * FROM users");
session_start();
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title> Retrive data</title>
</head>

<body>
    <!-- <h1>Welcome to your home page!</h1> -->
    <h1>Here is your data:</h1>
    <?php
    if (mysqli_num_rows($result) > 0) {
        ?>
        <table>

            <tr>
                <td>Email</td>

            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["email"]; ?>
                    </td>

                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
        <?php
    } else {
        echo "No result found";
    }
    ?>
</body>

</html>