<html>
<head>
<link rel='stylesheet' href="{{url('css\signin.css')}}">
    <script src='{{url("js\signin.js")}}' defer></script>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <header>

        
        @if(isset($errore))
        
            <p class='errore'>
            Username e/o password errate!
            </p>
        @endif
    
   

        @if(isset($errore_cred))
        
            <p class='errore'>
            Inserire le credenziali!
            </p>
        
    @endif
    </header>
            <main>
    
    <form autocomplete='off' name='signin' method='post'>
        <p>
            <label>Username: <input type='text' name='username' value='{{ old('username') }}'></label>
        </p>
        <p>
            <label>Password: <input type='password' name='password'></label>
        </p>
        <p>
        <input name='_token' type='hidden' value='{{ $csrf_token }}'>
        </p>
        <p>
            <label>&nbsp;<input type='submit' id="submit"></label>
        </p>
        <p>
            <label id='registrazione'>Non sei registrato?<a href="{{url('register')}}">Registrati</a></label>
        </p>
    </form>
    
</main>
</body>
</html>
