
<html>
<head>
<link rel='stylesheet' href='{{url("css\signup.css")}}'>
    <script src='{{url("js\signup.js")}}' defer></script>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
<nav id='first'>
        <div id='logo'>
            <img src='img1.png'/>
        <h2>Ospedale Maggiore 
        di Modica</h2> 
    </div>
        
        <div id='links'>
        <a href='{{url("/")}}'>Home</a>
        
        <a href='{{url("login")}}'>Accedi</a>
        
        </div>
        <div id="menu" class='showmenu'>
            <div></div>
            <div></div>
            <div></div>
          </div>
                </nav>
                <nav id='second'>
    
                    <a href='{{url("/")}}'>Home</a>
                    
                    <a href='{{url("login")}}'>Accedi</a>
                    
            </nav>
            <header id='validation'>  
        @if(isset($error))
        
            <p class='errore'>
            Username già in uso!
            </p>
        @endif

         @if(isset($errore_mail))
        <p class='errore'>
        E-mail non disponibile!
        </p>
    @endif
    
    </header>
            <main>
          
    <form autocomplete='off' name='signup' method='post'>
    <p>
        <input name='_token' type='hidden' value='{{ $csrf_token }}'>
        </p>
    <p>
            <label>Nome:  <input type='text' name='nome' value='{{ $old_nome }}'></label>
        </p>
        <p>
            <label>Cognome: <input type='text' name='cognome'value='{{ $old_cognome }}'></label>
        </p>
        <p>
            <label>Data di nascita: <input id='date' type='date' name='birthdate' ></label>
            <p id='date'></p>
        </p>
        <p>
            <label>E-mail: <input type='text' name='email' value='{{ $old_email }}'></label>
            <p id='email'></p>
        </p>
        <p>
            <label>Username: <input type='text' name='username' value='{{ $old_username }}'></label>
       <p id='user'></p>
        </p>
        <p>
            <label>Password: <input placeholder='Inserire almeno 8 caratteri' type='password' name='password'></label>
            <p id='pass'></p>
        </p>
        <p>
            <label>Conferma password: <input type='password' name='confirmpassword'></label> 
        </p>
        <p>
            <label>&nbsp;<input type='submit' id="submit"></label>
        </p>
        <p>
            <label class='login'>Sei già registrato?<a href="{{url('login')}}">Effettua il login</a></label>
        </p>
    </form>

</main>
</body>
</html>