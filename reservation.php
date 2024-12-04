<!DOCTYPE html>
<html>
<head>
    <title>GoodFood Reservation Form</title>
</head>
<body>
    <h1>GoodFood Reservation Form</h1>
    <form action="save_reservation.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br><br>
        <label for="guests">Number of Guests:</label><br>
        <input type="number" id="guests" name="guests" required><br><br>
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments"></textarea><br><br>
        <input type="submit" value="Make Reservation">
    </form>
</body>
</html>