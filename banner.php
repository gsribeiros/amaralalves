<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>JQuery Cycle Plugin - Intermediate Demos (Part 2)</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/jq.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/cycle.css" />
<style type="text/css">



.nav { margin: 5px 0 }
#nav a, #s7 strong { margin: 0 5px; padding: 3px 5px; border: 1px solid #ccc; background: #fc0; text-decoration: none }
#nav a.activeSlide { background: #ea0 }
#nav a:focus { outline: none; }
#output { text-align: left; }
</style>
<script type="text/javascript" src="js/jquery_1.5/jquery.min.js"></script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="sj/jquery.easing.1.3.js"></script>
<script type="text/javascript">
$.fn.cycle.defaults.timeout = 6000;
$(function() {
    // run the code in the markup!
    $('table pre code').not('#skip,#skip2').each(function() {
        eval($(this).text());
    });
    
    $('#s4').before('<div id="nav" class="nav">').cycle({
        fx:     'fade',
        speed:  'fast',
        timeout: 3000,
        pager:  '#nav'
    });
});

function onBefore() {
    $('#output').html("Scrolling image:<br>" + this.src);
    //window.console.log(  $(this).parent().children().index(this) );
}
function onAfter() {
    $('#output').html("Scroll complete for:<br>" + this.src)
        .append('<h3>' + this.alt + '</h3>');
}
</script>
</head>
<body>

  
        <div id="s4" class="pics">
            <img src="img/noticias/bg.png" width="200" height="200" />
            <img src="img/noticias/hirosaki_castle_japan-1366x768.jpg" width="200" height="200" />
            <img src="img/noticias/layout_togo.png" width="200" height="200" />
            <img src="img/noticias/Kit-RafaelMuniz-600x220.png" width="200" height="200" />
            
        </div>
        

</body>
</html>
