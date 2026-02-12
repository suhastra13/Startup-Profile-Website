<!DOCTYPE html>
<html>

<head>
    <title>Pesan Baru</title>
</head>

<body>
    <h2>Halo Admin, ada pesan baru!</h2>
    <p><strong>Nama:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>No HP:</strong> {{ $data['phone'] }}</p>
    <p><strong>Subjek:</strong> {{ $data['subject'] }}</p>
    <br>
    <p><strong>Pesan:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>

</html>