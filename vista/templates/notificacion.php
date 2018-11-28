<script>
        
            $("#notificacionLink").click(function(){
                $("#notification_count").fadeOut("slow");

                <?php 
                $cod = $_SESSION["cod"];       
                $sql="UPDATE notificaciones SET visto = 1 where para = $cod";
                ejecutar($sql);       
                ?>

            });  
</script>