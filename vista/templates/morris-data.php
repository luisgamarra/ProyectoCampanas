<script type="text/javascript">
$(function() {

    Morris.Area({
        element: 'morris-area-chart',

       
        data: [

             <?php 

        $sql = "select COUNT(*) as campania,YEAR(start_date) as anio from campaigns GROUP BY YEAR(start_date)";
        $fila = ejecutar($sql);
        while ($row = mysqli_fetch_array($fila)) {

        $sql1 = "SELECT COUNT(*) from notificaciones where YEAR(fecha)= $row[1]";
        $fila1 = ejecutar($sql1);
        $filita1 = mysqli_fetch_array($fila1);

$sql2 = "SELECT COUNT(*) FROM donations d INNER JOIN campaigns c on c.campaign_id=d.campaign_id WHERE YEAR(c.start_date) = $row[1]";
        $fila2 = ejecutar($sql2);
        $filita2 = mysqli_fetch_array($fila2);

        $sql3 = "SELECT COUNT(*) FROM details_campaigns d INNER JOIN campaigns c ON d.campaign_id=c.campaign_id WHERE d.estado=1 and YEAR(c.start_date) = $row[1]";
        $fila3 = ejecutar($sql3);
        $filita3 = mysqli_fetch_array($fila3);
       
         ?>
        {
            period: '<?php echo $row[1] ; ?>',
            notificaciones: <?php echo $filita1[0] ; ?>,
            campañas: <?php echo $row[0] ; ?>,
            donaciones: <?php echo $filita2[0] ; ?>,
            voluntarios: <?php echo $filita3[0] ; ?>,
            
        },

        <?php } ?>],


        xkey: 'period',
        ykeys: ['notificaciones','campañas','donaciones','voluntarios'],
        labels: ['notificaciones','campañas','donaciones','voluntarios'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Voluntarios",
            value: <?php echo $r3[0] ; ?>
        }, {
            label: "Donaciones",
            value: <?php echo $r2[0] ; ?>
        }, {
            label: "Campañas",
            value: <?php echo $r1[0] ; ?>
        }],
        resize: true
    });    
    
});
</script>