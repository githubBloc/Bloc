// JavaScript Document
idleTimer = null;
idleWait = 900000;

(function ($) {
    $(document).ready(function () {
        $('*').bind('mousemove keydown scroll', function () {
            clearTimeout(idleTimer);
            idleTimer = setTimeout(function () {
				$.post('Scripts/Timeout.php', {'Timeout':"Test"}, function (callback){if(callback==1){alert("Your session has been expired"); window.location.href="../index.php";}
				else{}
				});
				}, idleWait);
        });
        $("body").trigger("mousemove");
    });
}) (jQuery)