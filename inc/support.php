<?php
if(isset($_SESSION['u_id'])){
    echo '
    <div style="postion:absolute;top:0;border-bottom:2px solid black;right:-1px;width:50px;height:50px;font-size:20pt;font-weight:bolder;" class="support" >
         <a href="#" id="show"><div  class="header">?</div></a>
    </div>
    <div class="support" style="bottom:-30px;">
        <form id="form">
            <div class="form-group">
                <textarea placeholder="Comment" class="form-control" row="10" type="text" name="comment" style="resize: none;"></textarea>
            </div>
                <div class="form-group">
                        <input id="send" class="btn button-gold" type="submit" name="submit" value="Send">
                </div>
            </form>
    </div>
    
         ';
}


?>
