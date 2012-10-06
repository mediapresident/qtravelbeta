
<html>
<head>
<title>New Document - Created By AjaXplorer</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <style>
    body{
      margin: 0;
      padding: 0;
    }
    img{
      display: block;

    }
    #box{
      width: 958px;
      height: 255px;
      position: relative;
      background: url('/images/ad-bg.jpg') no-repeat;
      overflow: hidden;
    }
    
    .txt{
      position: absolute;
      top: 0px;
      left: 0px;
      width: 958px;
      height: 255px;
      display : block;
      z-index : 9999;
    }
  </style>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>
    var a = null;
    var b = null;
    function showA(){
      a.fadeIn(2000, function(){setTimeout(hideA, 1000)});
    }
    function hideA(){
      a.fadeOut(2000, function(){setTimeout(showB, 0)});
    }
    
    
    function showB(){
      
      b.fadeIn(2000, function(){setTimeout(hideB, 1000)});
    }
    function hideB(){
      b.fadeOut(2000, function(){setTimeout(showA, 0)});
    }
    window.onload = function(){
      a = $('#a');
      b = $('#b');
      hideA();
    }
  </script>
  
</head>
<body bgcolor="#FFFFFF" text="#000000">
<div id="box">
  <a href="mailto:info@quintessentiallytravel.com?subject=Gift Card Enquiry">
    <img src="/images/text-b.png" class='txt b' id="b" style="display:none;"/>
    <img src="/images/text-a.png" class='txt a' id="a"/>
  </a>
</div>
</body>
</html>
