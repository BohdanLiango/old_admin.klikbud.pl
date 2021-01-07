Hello {{ $email_data['name'] }} {{ $email_data['surname'] }}
<br><br>
Welcome to my Website!
<br>
Please click the below link to verify your email and activate you account!
<br><br>
<a href="http://127.0.0.1:8000/verify?code={{ $email_data['verification_code'] }}">Click here!</a>
<br><br>
Thank you!
<br>
I love you! Be my friend!
<br>
KLIK-BUD
