<?php
require('start.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta content="maximum-scale=1.0; user-scalable=0" /> -->
    <title>VBond inc.</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/fluentSelect.js"></script>
    <link rel="stylesheet" href="styles/animation.css">
    <link rel="stylesheet" href="styles/style.css"/>
    <link rel="stylesheet" href="styles/mainContent.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/history.css">
    <link rel="stylesheet" href="styles/loading.css">
    <link rel="stylesheet" href="styles/acrylic.css">
    <link rel="stylesheet" href="styles/controls.css">
</head>
<body>
    <div id="sidePanel">
        
        <div class="acrylic-low sidePanelSize"></div>
        <div class="mainSideContent">
            <ol style="list-style: none">
                <li id="menuSideItem" class="sideItem" onmousedown="menuButtonClick()">
                    <img class="sideItemImg" src="images/menu.png"/>
                </li>
                <li id="popularSideItem" class="sideItem" onmousedown="mainPageBtnClick()">
                    <img class="sideItemImg" src="images/home-button.png"/>
                    <span class="sideItemText">Главная страница</span>
                </li>
                <li id="contactSideItem" class="sideItem" onmousedown="contactusBtnClick()">
                    <img class="sideItemImg" src="images/contact-us.png"/>
                    <span class="sideItemText">Связаться с нами</span>
                </li>
            </ol>
        </div>
    </div>
   
        <!--Main Content-->
        <div id="mainContent">
                <table id="mainTable">
                    <tbody style="width: inherit">
                        <tr class="contactRow" style="width: inherit; display: none">
                            <td>
                                <div class="contactForm subDefFont" >
                                <h1>Связь с нами</h1>
                                    <label for="contactName" style="white-space: nowrap; display: block;">Ваше имя:</label>
                                    <input type="text" placeholder="Имя" name="contactName" id="contactName">
                                    
                                    <label for="contactEmail" style="white-space: nowrap; display: block;">Ваш Email:</label>
                                    <input type="text" placeholder="Email" name="contactEmail" id="contactEmail">
                                    
                                    <label for="contactMsg" style="white-space: nowrap; display: block;">Сообщение:</label>
                                    <textarea placeholder="Сообщение" name="contactMsg" id="contactMsg"></textarea>

                                    <label class="fluentButton subDefFont"  for="contactBtn">
                                        Отправить
                                        <input type="submit" value="Отправить" id="contactBtn" onclick="sendDevMessage()">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr class="mainRow" style="width: inherit">
                            <td style="width: inherit">
                                <div id="header" class="mainSection">
                                    <img class="polygon-shape" src="images/polygon-shape.png"/>
                                    <span class="authorName">Бондарь Валерий</span>
                                    <img class="avatarImage" src="images/logo-color.png" alt="Avatar">
                                    <span class="underText">Группа: P3211</span>
                                    <span class="subText">Вариант 12345</span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="mainRow" style="width: inherit">
                            <td id="mainGrid" style="width: inherit;">
                                    <div id="controlPanelContainer">
                                        <form id="coordform" onsubmit="return isvalid()" method="GET">
                                                <div id="x-form" class="subDefFont" style="white-space: nowrap">
                                                    Значение X:
                                                    <br>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio-3" value="-3">
                                                    <label class="radioButton subDefFont" for="x-radio-3">-3</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio-2" value="-2">
                                                    <label class="radioButton subDefFont" for="x-radio-2">-2</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio-1" value="-1">
                                                    <label class="radioButton subDefFont" for="x-radio-1">-1</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio0" value="0">
                                                    <label class="radioButton subDefFont" for="x-radio0">0</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio1" value="1">
                                                    <label class="radioButton subDefFont" for="x-radio1">1</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio2" value="2">
                                                    <label class="radioButton subDefFont" for="x-radio2">2</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio3" value="3">
                                                    <label class="radioButton subDefFont" for="x-radio3">3</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio4" value="4">
                                                    <label class="radioButton subDefFont" for="x-radio4">4</label>
                                                    <br>
                                                    <input type="radio" name="x-radio" id="x-radio5" value="5">
                                                    <label class="radioButton subDefFont" for="x-radio5">5</label>
                                                </div>
                                                <div id="y-form" class="subDefFont">
                                                    <label for="y-input" style="white-space: nowrap">Значение Y:</label>
                                                    <input type="text" placeholder="Введите значение y" name="y-input" id="y-input">
                                                </div>
                                                <div id="r-form" class="subDefFont">
                                                    <label for="r-select" style="white-space: nowrap">Значение R:</label>
                                                    <div class="fluentSelect subDefFont">
                                                        <select name="r-select" id="r-select">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                        <label>
                                                            <div class="optionPanel">
                                                            </div>
                                                            <span></span>
                                                            <img src="images/down-arrow.png" alt="down-arrow">
                                                        </label>
                                                    </div>
                                                </div>
                                                <label class="fluentButton subDefFont" for="checkBtn">
                                                    Проверить
                                                    <input type="submit" value="Проверить" id="checkBtn">
                                                </label>
                                            </form>
                                </div>
                                <div id="graphContainer">
                                    <div class="acrylic-high" style=" height: 1000px;"></div>
                                    <img src="images/graph-3d.png" alt="graph-3d">
                                    <!-- <div id="response">Точка не входит в данную область!
                                        <div id="rating">
                                            <img src="images/rating-star.png" alt="Star"> 12/20
                                        </div>
                                    </div> -->
                                    <?php
                                    require ('StatManager.php');
                                    $id = $_COOKIE['user_id'];
                                    $statManager = new StatManager($id);
                                    $score = $statManager->getScore();
                                    if(count($_GET) === 3){
                                        $statManager->incAttempts();
                                        $x = +$_GET['x-radio'];
                                        $y = +$_GET['y-input'];
                                        $r = +$_GET['r-select'];
                                        if($x * $x + $y * $y <= $r * $r  && $y >= 0 && $x <= 0){
                                            $statManager->incScore();
                                            echo '<div id="response">Точка входит в данную область!<div id="rating"><img src="images/rating-star.png" alt="Star">'.$statManager->getScore().'/'.$statManager->getAttempts().'</div></div>';
                                            DataManager::addUserHistory($id, " x = ".$x.", \n y = ".$y.", \n R = ".$r." \n Результат: входит ");
                                        }elseif (0 <= $x && $x <= $r/2 && 0 <= $y && $y <= $r) {
                                            $statManager->incScore();
                                            echo '<div id="response">Точка входит в данную область!<div id="rating"><img src="images/rating-star.png" alt="Star">'.$statManager->getScore().'/'.$statManager->getAttempts().'</div></div>';
                                            DataManager::addUserHistory($id, " x = ".$x.", \n y = ".$y.", \n R = ".$r." \n Результат: входит ");
                                        }elseif ($x - $r <= $y &&  $y <= 0 && $x >= 0) {
                                            $statManager->incScore();
                                            echo '<div id="response">Точка входит в данную область!<div id="rating"><img src="images/rating-star.png" alt="Star">'.$statManager->getScore().'/'.$statManager->getAttempts().'</div></div>';
                                            DataManager::addUserHistory($id, " x = ".$x.", \n y = ".$y.", \n R = ".$r." \n Результат: входит ");
                                        }else{
                                            echo '<div id="response">Точка не входит в данную область!<div id="rating"><img src="images/rating-star.png" alt="Star">'.$statManager->getScore().'/'.$statManager->getAttempts().'</div></div>';
                                            DataManager::addUserHistory($id, " x = ".$x.", \n y = ".$y.", \n R = ".$r." \n Результат: не входит ");
                                        }
                                    }
                                    else{
                                        if(!isset($score)){
                                            echo '<div id="response"><div id="rating"><img src="images/rating-star.png" alt="Star">0/0</div></div>';
                                        }
                                        else{
                                            echo '<div id="response"><div id="rating"><img src="images/rating-star.png" alt="Star">'.$statManager->getScore().'/'.$statManager->getAttempts().'</div></div>';
                                        }
                                    }
                                ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="mainRow" style="width: inherit">
                            <td style="width: inherit">
                                <div id="history" class="subDefFont" style="width: inherit">
                                    <div class="historyName">История</div>
                                    <ul id="historyContent">
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="mainRow" style="width: inherit">
                            <td style="width: inherit">
                                <div id="footer" class="subDefFont">
                                    Контакты
                                    <div class="social-contacts">
                                        <a href="https://www.youtube.com/channel/UCSH8QriX5AuH6pRIpruyzCA" target="_blank">
                                            <img class="social-img" src="images/youtube.png" alt="google-plus">
                                        </a>
                                        <a href="https://vk.com/bondarvaleriy" target="_blank">
                                            <img class="social-img" src="images/vk-social.png" alt="vkontakte">
                                        </a>
                                        <a href="https://www.instagram.com/bondar_val" target="_blank">
                                            <img class="social-img" src="images/instagram.png" alt="instagram">
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
</body>
</html>