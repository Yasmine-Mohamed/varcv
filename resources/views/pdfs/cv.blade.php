
<h4>Name: {{ $userData->first_name }} {{ $userData->middle_name }} {{ $userData->last_name }}</h4>
 <h4>E-mail: {{ $userData->business_email }}</h4>
 <h4>Address: {{ $userData->address }}</h4>
 <h4>BirthDay: {{ $userData->birthday }}</h4>
 <a class="btn btn-primary" href="{{ route('createpdf',['download'=>'pdf']) }}">Download</a>
