<!-- officer_details.php -->
<html>
<head>
    <title>Officer Details</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(0, 109, 139);
            color: white;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #454d59;
            color: white;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #cbcfd4;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            background-color: #4CAF50;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>

<body>
    <h2>Print this Officer details before adding another officer</h2>

    <?php
    // Retrieve the officer details from the URL parameters
    $first_name = $_GET["first_name"];
    $last_name = $_GET["last_name"];
    $service_no = $_GET["service_no"];
    $password = $_GET["password"];
    ?>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Service Number</th>
            <th>Password</th>
        </tr>
        <tr>
            <td><?php echo $first_name; ?></td>
            <td><?php echo $last_name; ?></td>
            <td><?php echo $service_no; ?></td>
            <td><?php echo $password; ?></td>
        </tr>
    </table>

    <p><a href="add_officer.php">Add another Officers</a></p>
</body>
</html>
