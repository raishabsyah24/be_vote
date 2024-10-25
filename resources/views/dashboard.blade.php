<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome to Your Dashboard</h1>
    
    @if(Auth::user()->is_verified)
        <p>Your account has been successfully verified!</p>
        <h2>User Information</h2>
        <ul>
            <li><strong>Username:</strong> {{ Auth::user()->username }}</li>
            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
            <li><strong>Phone Number:</strong> {{ Auth::user()->phone_number }}</li>
            <li><strong>Apartment Number:</strong> {{ Auth::user()->apartment_number }}</li>
        </ul>
    @else
        <p>Your account is still pending verification. Please wait for admin approval.</p>
    @endif

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
