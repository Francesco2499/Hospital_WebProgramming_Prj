
<html>
<head>
    <link rel='stylesheet' href='{{url("css/ticket.css")}}'>
    <script src='{{url("js/signin.js")}}' defer></script>
    <script src='{{url("js/ticket.js")}}' defer></script>
 
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazione Ticket</title>
</head>
<body>
<nav id='first'>
        <div id='logo'>
            <img src='img1.png'/>
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
       <h1>Manteniamo le distanze e restiamo in sicurezza</h1>
</div>
<article>
<h1>prenotazioni ticket online</h1> 
</article>
<section id='error'>
@if(isset($error))
    <h2>
   <?php 
   echo  "Non è possibile prenotare giorno ".$newData." alle ore ".$orario.". Scegli un altro orario!"; 
   ?>
    </h2>
@endif


</section>
<section id='contenitore'>

<main>
<form autocomplete='off' name='signin' method='post'>
<p>
        <input name='_token' type='hidden' value='{{ $csrf_token }}'>
        </p>
        <p>
            <label>Cellulare: <input type='tel' name='cellulare' value='<?php if(isset($_POST["cellulare"])){echo $_POST['cellulare'];}else{echo"";}?>'></label>
        </p>
        <p>
            <label>Data:<input id='date'  type='date' name='data' value='<?php if(isset($_POST["data"])){echo $_POST['data'];}else{echo"";}?>'></label>
        </p>       
        <p>
            <label>
            Orario: 
        <select name='orario'>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option>
        <option>10:30</option>
        <option>11:00</option>
        <option>11:30</option>
        <option>12:00</option>
        <option>15:00</option>
        <option>15:30</option>
        <option>16:00</option>
        <option>16:30</option>
        <option>17:00</option>
        <option>17:30</option>
        <option>18:00</option>
</select>
</label>
</p>
        <p>
            <label>&nbsp;<input type='submit' id="submit"></label>
        </p>
        
    </form>
    
</main>
<img src='ticket-online.jpg'>
</section><section id='riepilogo'>
</section>
<section id='parag'>
    <p>
    Cerchiamo sempre di stare al passo con i tempi, per questo diamo la possibilità a tutti i nostri pazienti di prenotare il ticket direttamente da casa così da risparmiare tempo ed evitare assembramenti.
Si ricorda che è possibile cancellare la prenotazione in qualunque momento, direttamente dal portale.  È utile ricordare la necessità di disdire l'appuntamento qualora non servisse, in modo da dare ad un altro utente la possibilità di usufruire della prestazione.
    </p>
</section>



          <footer>
        <h2>Via Resistenza Partigiana, 97015 Modica RG</h2>
        <p>O46001642</p>
<p>Edited by Francesco Denaro </p>
    </footer>
</body>
</html>
