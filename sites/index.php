<?php
/**
 * Created by IntelliJ IDEA.
 * User: Łukasz
 * Date: 2018-06-17
 * Time: 13:53
 */
session_start();
$_SESSION['isLogged'] = 'true';
?>
<script>var isLogged = <?php echo $_SESSION['isLogged'] ?>;</script>
<!DOCTYPE html>

<?
/*****************************************************************
 * TODO#1 Mini odtwarzacz wideo/audio ************************** *
 *  - jest draggable ******************************************* *
 *  - wyświetla się na innych stronach, np. przeglądam fb i mam* *
 *  go włączonego i widocznego z mojej strony******************* *
 * ************************************************************* *
 * TODO#2 Ocena danego multimedia w postaci gwiazdek i/lub****** *
 *  podoba się albo nie***************************************** *
 * ************************************************************* *
 * TODO#3 Zrobić wyszukiwarkę*********************************** *
 * ************************************************************* *
 * TODO#4 Responsywność **************************************** *
 * ************************************************************* *
 * FIXME Przemyśleć czy jest dobre rozwiązanie z div na wiersz * *
 *  czy też usunąć i swobodnie układać je w rzędzie************* *
 * ************************************************************* *
 * TODO#5 dodać do pane atrybuty data z skrótowym opisem i info* *
 * ************************************************************* *
 * TODO#6 dodać połączenie z bazą oraz rozwinąć pliki php, czyli *
 *  - dodać funkcję dodawania multimediów*********************** *
 *  - wyświetlanie z bazy*************************************** *
 * ************************************************************* *
 * TODO#FINALLY przerobić na reactJS*************************** *
 * ************************************************************* *
 ****************************************************************/
?>

<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>LFMedia</title>
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body class="unselectable">
<div class="sideleft navbar bg-dark navbar-dark fixed-top shadow-box">
    <a id="logo" href="#">
       <img src="../images/logo.png"/>
   </a>
    <form action="" class="searchbox">
        <input type="text" name="search">
        <button type="button" class="fas fa-search"></button>
    </form>
    <ul class="navbar-nav">
       <li class="nav-item">
           <a href="#" class="nav-link">
               Główna
           </a>
       </li>
       <li class="nav-item">
           <a href="#" class="nav-link">
               Nowości
           </a>
       </li>
       <li class="nav-item">
           <a href="#" class="nav-link">
               Przeglądaj
           </a>
       </li>
       <ul class="navbar-nav-sub">
           <li class="nav-item">
               <a href="#" class="nav-link">
                   Obrazy
               </a>
           </li>
           <li class="nav-item">
               <a href="#" class="nav-link">
                   Muzyka
               </a>
           </li>
           <li class="nav-item">
               <a href="#" class="nav-link">
                   Filmy
               </a>
           </li>
       </ul>
   </ul>
    <div class="add">
        <div class="add-button button-menu" style="display: none;">
            <div class="bm-item" data-toggle="modal" data-target="#modalAdd">
                <h5>
                    Obraz
                </h5>
            </div>
            <hr>
            <div class="bm-item" data-toggle="modal" data-target="#modalAdd">
                <h5>
                    Utwór
                </h5>
            </div>
            <hr>
            <div class="bm-item" data-toggle="modal" data-target="#modalAdd">
                <h5>
                    Wideo
                </h5>
            </div>
        </div>
        <div class="add-button">
            <div class="button-bar">
                <div class="add-bar bar-horizontal"></div>
                <div class="add-bar bar-vertical"></div>
            </div>
            <div class="button-text">
                <h4>Dodaj plik</h4>
            </div>
        </div>
    </div>
</div>
<div class="sideright bg-black-65">
    <div class="container-fluid">
        <div class="roller-outer">
            <div class="arrow-backward">
                <div class="arrow-transform">
                    <div class="arrow-bar bar-up"></div>
                    <div class="arrow-bar bar-down"></div>
                </div>
            </div>
            <div class="roller-inner">
                <div>
                    <div class="pane" data-type="song" data-name="new">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span data-name="Nazwa">nazwa</span>
                            <span data-author="IM">autor</span>
                            <span data-album="brave">album</span>
                            <span data-desc="brave">opis</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new2">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new3">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new4">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="pane" data-type="song" data-name="new5">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new6">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new7">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new8">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="pane" data-type="song" data-name="new5">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new6">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new7">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                    <div class="pane" data-type="song" data-name="new8">
                        <div class="pane-pic">
                            <img src="../images/template.jpg" alt="media">
                        </div>
                        <div class="pane-desc">
                            <span>template</span>
                            <span>template</span>
                            <span>template</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="arrow-forward">
                <div class="arrow-transform">
                    <div class="arrow-bar bar-up"></div>
                    <div class="arrow-bar bar-down"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="user">
    <div class="user-brand shadow-box" data-toggle="modal" data-target="#modalLogIn">
        <p class="brand-text">
            Konto
        </p>
        <img src="../images/empty-face.jpg" width="50px" height="50px" alt="Account">
    </div>
    <div class="user-menu">
        <div class="menu-item shadow-box-menu">
            <p class="item-text">
                Profil
            </p>
        </div>
        <div class="menu-item shadow-box-menu">
            <p class="item-text">
                Dodane
            </p>
        </div>
        <div class="menu-item shadow-box-menu">
            <p class="item-text">
                Wyloguj się
            </p>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLogIn" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Zaloguj się</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Hasło">
                    </div>
                    <div id="forgotPasword">Zapomniałeś hasła?</div>
                    <!-- TODO#FORGOT_PASS dodaj tooltip -->
                </form>
            </div>
            <div class="modal-footer">
                <div class="btn btn-orange shadow-box">Zaloguj się</div>
                <div id="toRegister" class="btn btn-orange shadow-box">Zarejestruj się</div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalRegister" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Zarejestruj się</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nickname" placeholder="Nazwa użytkownika">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Hasło">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="arrow-backward">
                    <div class="arrow-bar bar-up"></div>
                    <div class="arrow-bar bar-down"></div>
                </div>
                <div class="btn btn-orange shadow-box">Zarejestruj się</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAdd" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Dodaj plik</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Nazwa">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="author" placeholder="Autor">
                    </div>
                    <div class="form-group">
                        <input type="file" name="file">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="btn btn-orange shadow-box">Dodaj plik</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>