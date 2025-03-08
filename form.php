# Student Registration Form Created By Jafar Ali

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="jafar.css">

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 600px;
    margin: auto;
    background: rgb(196, 228, 232);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #f40505;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #33a633;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #1af606;
}


</style

</head>
<body>
    <div class="container">
        <h1>Student Registration Form</h1>
        <form method="POST">
            
            <label for="name"><b>Name:</b></label>
            <input type="text" id="name" name="firstname" required>

            <label for="father"><b>Father's Name:</b></label>
            <input type="text" id="father" name="lastname" required>

            <label for="email"><b>Email:</b></label>
            <input type="email" id="email" name="email" required>

            <label for="phone"><b>Phone Number:</b></label>
            <input type="number" id="phone" name="phone" required>

            <label for="dob"><b>Date of Birth:</b></label>
            <input type="date" id="dob" name="dob" required>
            
            <p class="gender"><b>Select Your Gender:</b></p>
            <select name="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <label for="course"><b>Course:</b></label>
            <select id="course" name="course" required>
                <option value="computer-science">Computer Science</option>
                <option value="mechanical">Mechanical Engg.</option>
                <option value="civil">Civil Engg.</option>
                <option value="Electrical">Electrical Engg.</option>
                <option value="nursing">Bsc.Nursing</option>
            </select>
            

            <button type="submit" name="submit"><b>Register</b></button>

                  
         
    </div>
    
    

            
        </form>
<?php
$con = mysqli_connect('localhost', 'root', '', 'form');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['firstname'];
    $father = $_POST['lastname'];
    $email = $_POST['email'];
    $number = $_POST['phone'];
    $date = $_POST['dob'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO form_data (Name, Father, Email, Phone, DOB, Gender, Course) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $father, $email, $number, $date, $gender, $course);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
mysqli_close($con);
?>

    </div>
</body>
</html>
