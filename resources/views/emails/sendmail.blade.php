<!DOCTYPE html>
<html>

<head>
    <title>Test send mail</title>
</head>
<style>
    body {
        font-family: "Times New Roman", Times, serif;
    }
</style>

<body>
    <h3 style="color: Blue">Dear {{ $details['to_name'] }}.</h3>
    <p>{{ $details['message'] }}</p>
</body>

</html>
