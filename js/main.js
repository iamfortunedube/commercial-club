$(document).ready(function() {
    $("#pNumber,#rNumber,#username,#donate,#branch,#accNumber,#forgotPField").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }

        
    });
    $("#show").click(function(){
        $("#form").slideToggle();
    });

    $('#switch').click(function(){
        if(document.body.style.background == "black"){
            document.body.style.background = "white";
            document.body.style.color = "black";
        }else{
            document.body.style.background = "black";
        }
    });
    $(function(){
       
        var str = document.getElementById("dateDon").innerHTML;
        var timess = 0;
        if(str == ""){
            str = new Date();
            timess = 24*60*60*1000;
        }else{
            timess = 25*60*60*1000;
        }
        var date = new Date(str); 
        var milliseconds = date.getTime(); 
        var note = $('#note'),
        
    
         ts =  milliseconds + timess;
    
            
        $('#countdown').countdown({
            timestamp	: ts,
            callback	: function(days, hours, minutes, seconds){
                
                var message = "";
                
                message += days + " day" + ( days < 2 ? "":"s" ) + ", ";
                message += hours + " hour" + ( hours < 2 ? "":"s" ) + ", ";
                message += minutes + " minute" + ( minutes < 2 ? "":"s" ) + " and ";
                message += seconds + " second" + ( seconds < 2 ? "":"s" ) + " <br />";
                
                
                note.html(message);
            }
        });
        
    });

    
    
});