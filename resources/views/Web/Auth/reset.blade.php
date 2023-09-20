<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Reset your password </title>

</head>
    <body>

        <div>
            Warning this link will expire in 5 minutes only.
           Click to

            <a href="{{ url('update-password-view',['email' => base64_encode($client->email)]) }}">
                Reset your password
            </a>

        </div>

    </body>
</html>



