<header>

<div class="navb">
    
    
    @if (Auth::check())

    <a href="/"><div class="navi" id="tasks">Moje Zadania</div></a>

    <a href="/todo/his"><div class="navi" id="tasksHis">Historia Zadań</div></a>

    <div class="navi" id="userName">Witaj <b>{{Auth::user()->name}}</b></div></a>

    <a href="/logout"><div class="navi" id="logOut">Wyloguj się</div></a>

    @else

    <a href="/"><div class="navi" id="mainPage" >Strona Główna</div></a>

    <div class="navi" id="blankNav"></div>

    <a href="/login"><div class="navi" id="logIn">Zaloguj się</div></a>

    <a href="/register"><div class="navi" id="register">Zarejestruj się</div></a>
    
    @endif

</div>

</header>
