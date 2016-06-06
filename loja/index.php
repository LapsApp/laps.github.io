<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>LOJAONLINE</title>
        <style id="jsbin-css">
            #header {
                color: white;
                background: linear-gradient(to top, black, white, black);
                text-align:center;
                padding:5px;
                font-size:30px;
                text-shadow: 5px 5px 5px grey;
            }

            .btn {
                color: #FFFFFF;
                background-color: #000000;
                border-color: grey;
                line-height: 30px
            }

            .btn:hover {
                color: #000000;
                background-color: #FFFFFF;
                border-color: grey;
                line-height: 30px
            }

            #card1-imagem {
                background-image: url(img.jpg);
                width: 1300px;
                height: 450px;
                background-size: 1300px 450px;
                background-repeat: no-repeat;
            }

            #barra {
                background: linear-gradient(to top, black, white);
                color:white;
                clear:both;
                text-align:center;
                padding:5px; 
            }

        </style>
    </head>
    <body style="margin: 0px; padding: 0px; height: 100%; width:100%;">

        <div id="header">
            <h1>LOJAONLINE.COM</h1>
        </div>

        <table align="center" width="1200" border="0" cellspacing="10"> 
            <tr>
                <td>
                    <div align="center" id="card1-imagem"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <button class='btn' name='entrar' onclick="window.location = '../loja/lojaonline.php?cat=GERAL';"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTRAR NO SITE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></button>
                    </div></div>
                <td>
            </tr>
        </table>

        <div id="barra">
            Copyright © LOJAONLINE.COM
        </div>

    </body>
</html>