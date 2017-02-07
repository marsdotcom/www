<!DOCTYPE html>
<html>
    <head>
        <title>Личный кабинет</title>
        <link rel="shortcut icon" href="image/logo_100_100.png" type="image/x-icon">
        <meta charset="utf-8">
        <link rel="stylesheet" href="index.css">
        
        <script src="jquery-3.1.1.js"></script>
    </head>
    <body>
        
 
        <header class="header">
            <a href="http://localhost"><img src="image/logo_100_100.png" class="logo"/></a>            
		<nav>
            <ul class = "topmenu">
                <li>Рассказы
                    <ul class = "submenu">
                        <li>роман</li>
                        <li>рассказ</li>
                        <li>Стихи</li>
                    </ul>
                </li>
                <li><a href="https://ok.ru">odnok</a></li>
                <li><a href="https://www.youtube.com/">youtube</a></li>
                <li><a href="https://www.facebook.com/">facebook</a></li>
                <li><a href="https://vk.com">vk</a></li>
                <li><a href="https://www.hedbed.ru/check_in.html">skype</a></li> 

            </ul>
        </nav>
        </header>      
        
          
            
            <div class='login'><a href='cabinet.php'><?php echo $_COOKIE['log'];  ?></a>/
                <a href="index.php" id="a"> выход </a>
        
        </div>; 
            
        
           
        <div class="container">
            <div class="leftcol">
                <li><span>..........</span></li>                        
                <li><a href="#g1">Глава1 <b>Встреча.</b></a></li>
                <li><a href="#g2">Глава2 <b>Знакомство.</b></a></li>
                <li><a href="#g3">Глава3 <b>Привязывание.</b></a></li>
                <li><a href="#g4">Глава4 <b>Горячка.</b></a></li>
                <li><a href="#g5">Глава5 <b>Любовь.</b></a></li>                     
                               
            </div>
            <div class="rightcol">                
                <h1>...........</h1>                
                

                
                
            </div>
        </div>
        <footer>
        <div>
            <a href="mailto:akusha260@gmail.com?subject=вопрос к администратору">&#9993 вопрос к админ.</a>
            Магомедов Магомед Кадиевич.
        </div>
        </footer>
       <script>           
           document.getElementById('a').onclick = function (){               
             var date = new Date(0);
             document.cookie = "log=; path=/; expires=" + date.toUTCString();
           }       
        </script>
    </body>
</html>