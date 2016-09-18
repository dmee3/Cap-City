<h3>Cap City Contact Form</h3>
<br>
<p>Name: <strong> {{ $name }}</strong></p>
<p>Email: <strong> {{ $email }}</strong></p>
<br>
<p>Messsage:</p>
<br>
<p>
  @foreach ($messageLines as $messageLine)
    {{ $messageLine }}<br>
  @endforeach
</p>
