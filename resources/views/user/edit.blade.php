<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.update', $data_user->id_user) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="">ID</label>
        <input type="text" name="id_user" value="{{ $data_user->id_user }}">
        <label for="">NAMA</label>
        <input type="text" name="name" value="{{ $data_user->name }}">
        <label for="">EMAIL</label>
        <input type="email" name="email" id="" value="{{ $data_user->email }}">
        <label for="">PASSWORD</label>
        <input type="text" name="password" id="" value="{{ $data_user->password }}">
        <input type="submit" value="SIMPAN">
    </form>
</body>
</html>