<h3>Cap City Password Reset</h3>
<br>
<p>Click here to reset your password:</p>
<br>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="border: none; border-radius: 2px; display: inline-block; color: #ffffff; background-color: #26a65b; height: 36px; line-height: 36px; outline: 0; padding: 0 2rem; text-transform: uppercase; vertical-align: middle; letter-spacing: 0.5px; text-decoration: none;">reset</a>
<br>
<br>
<p>Thanks!</p>
<p>-Cap City Admin Team</p>
