<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>tester</title>
    <style>
        ul{
            list-style: none;
        }
        li{
            background: #96dd59;
            padding-left: 5px;
            padding-right: 5px;
        }
        .mainmenu{             
            margin: 0;
            padding: 0;
            width: 130px;
        }
        .mainmenu>li{
            display: block;
            position: relative;            
        }
        .submenu{            
            margin: 0;
            padding: 0;  
            position: absolute; 
            left:150%;
            top: 0;
            width: 130px;
            visibility: hidden;
            opacity: 0;
            
        }
        .submenu>li{            
            position: relative;
        }
        li:hover{
            background: yellow;
        }
        
       li:hover>.submenu{           
           visibility: visible;
           opacity: 1;
           left: 100%;
           transition: opacity,left 1s ease-out 0s;
        }
    </style>
</head>
<body>
<nav>
     <ul class="mainmenu">
         <li>Пункт 1. </li>
         <li>Пункт 2. &#10144
            <ul class="submenu">
              <li>первый ур</li>
              <li>первый ур &#10144
                <ul class = "submenu">
                  <li>второй ур.</li>
                  <li>второй ур.</li>
                  <li>второй ур.</li>
                  </ul>
                </li>          
              <li>первый ур</li>
            </ul>
          </li>
         <li>Пункт 3.</li>
    </ul>
</nav>
    <?php
        echo "dfdjfkdfjkdfjdkf";
    ?>
</body>
</html>