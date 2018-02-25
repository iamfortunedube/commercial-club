</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
            $(document).ready(function(){
                $("#show").click(function(){
                    $("#form").slideToggle();
                });

                $('.switch').click(function(){
                    if(document.body.style.background == "black"){
                        document.body.style.background = "white";
                        document.body.style.color = "black";
                    }else{
                        document.body.style.background = "black";
                    }
                });
            });
        </script>
</body>
</html>
