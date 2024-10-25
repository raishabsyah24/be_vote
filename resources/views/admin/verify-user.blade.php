<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Nomor Apartemen</th>
            <th>Verifikasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->apartment_number }}</td>
                <td>
                    @if ($user->is_verified == 0)
                        <form action="{{ route('users.verify', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit">Verifikasi</button>
                        </form>
                    @else
                        <span>Sudah Diverifikasi</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
