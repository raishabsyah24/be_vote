<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="{{ url('/api/register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone_number" placeholder="Phone Number" required>
        <input type="text" name="apartment_number" placeholder="Apartment Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="file" name="file" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
