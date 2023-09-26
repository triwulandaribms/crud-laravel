<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halaman user</title>
</head>
<body>
    <a href="{{ route('user.create') }}">Tambah data</a>
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>nama</th>
                <th>email</th>
                <th>password</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($data_user as $user)
                <tr>
                    <td>{{ $user->id_user }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id_user) }}">edit</a>
                        <form action="{{ route('user.destroy', $user->id_user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>