
<html>
<head>
    <link rel='stylesheet' href='{{url("css/prenotazione.css")}}'>
    <script src='{{url("js/signin.js")}}' defer></script>
    <script src='{{url("js/Prenotazione.js")}}' defer></script>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazione Vaccino</title>
</head>
<body>
<nav id='first'>
        <div id='logo'>
            <img src='{{url("img1.png")}}'/>
        <h2>Ospedale Maggiore 
        di Modica</h2> 
    </div>
        
        <div id='links'>
        <a href='{{url("home")}}'>Portale Prenotazioni</a>
                    <a href='{{url("servizi")}}'>Servizi </a>
                    <a href='{{url("logout")}}'>Esci</a>
        
        </div>
        <div id="menu" class='showmenu'>
            <div></div>
            <div></div>
            <div></div>
          </div>
                </nav>
                <nav id='second'>
    
                <a href='{{url("home")}}'>Portale Prenotazioni</a>
                    <a href='{{url("servizi")}}'>Servizi </a>
                    <a href='{{url("logout")}}'>Esci</a>
                    
            </nav>
            <header> 
        <div id='overlay'>       
        
</div>
   </header>
   <div id='main'>
       <h1>Facciamo squadra per la nostra salute</h1>
</div>
<article>
<h1>vaccinazioni anti covid-19</h1> 
@if(isset($success))
    <h2 id='prenotazione'>
    Prenotazione effettuata con successo!
    </h2>
@endif

</article>
<section>
<div id=mainprenotazione>

   <main>
    <h2>Inserisci i dati per la prenotazione</h2>
    <p id='compila'></p>
    <form autocomplete='off' name='prenota' method='post'>
    <p>
        <input name='_token' type='hidden' value='{{ $csrf_token }}'>
        </p>
        <p>
            <label>Codice Fiscale <input type='text' name='CF' value='<?php if(isset($_POST["CF"])){echo $_POST['CF'];}else{echo"";}?>'></label>
            <p id='CF'></p>
        </p>
       <p>
           <input type='radio' name='vaccino' value='AstraZeneca'> AstraZeneca
</p>
<p>
           <input type='radio' name='vaccino' value='Moderna'> Moderna
</p>
<p>
           <input type='radio' name='vaccino' value='Pfizer'> Pfizer
</p>
        <p>
            <label>&nbsp;<input type='submit' id="submit"></label>
        </p>
       
    </form>
    
</main>
<img src='{{url("vaccini.png")}}'>
</div>
</section>
<div id='riepilogo'>

@if(isset($errore))
    <h2 id='prenotazione' class='msg'>
    Non ci sono dosi disponibili al momento per il vaccino {{$vaccino}}. Scegli un altro vaccino o attendi fino a quando il vaccino non sarà disponibile.
    </h2>
@endif
</div>


          <footer>
        <h2>Via Resistenza Partigiana, 97015 Modica RG</h2>
        <p>O46001642</p>
<p>Edited by Francesco Denaro </p>
    </footer>
</body>
</html>
