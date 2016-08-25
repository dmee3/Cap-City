<h3>Thank you for your purchase!</h3>
<br>
<p>Just in case you encountered issues downloading the audition packet from the site, it has been attached here as well.  See you on the 25th!</p>
<br>
<br>
<b>Order summary:</b>
<br>
@if ($packet == 'true')
	<p>Packet only: $15</p>
@endif

@if ($registered == 'true')
	<p>Registration + packet: $65</p>
@endif

@if ($chipotle1 == 'true')
	<p>Chipotle 9/25: $12</p>
@endif

@if ($chipotle2 == 'true')
	<p>Chipotle 10/2: $12</p>
@endif

<p>Processing fee: $3</p>
<br>
<b>Total: ${{ $total }}</b>
<br>
<br>
<p>Your order number is <b>{{ $id }}</b>.</p>
<br>
<b>Cymbal players:&nbsp;</b><p>If you plan on auditioning for the cymbal line please contact Ariel at arielpeel@gmail.com or Cooper at coopermannon@gmail.com to discuss the expectations regarding the cymbal audition and to receive the excerpt. If you have a pair of cymbals please bring them on the audition dates.</p>
