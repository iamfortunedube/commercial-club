<?php
if(isset($_SESSION['u_id'])){
    echo '
    <div class="support">
        <a href="#" id="show"><div class="header">Need Help?</div></a>
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
