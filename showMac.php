<!DOCTYPE html>
<?php

    $ip = $_SERVER['REMOTE_ADDR'];
    $macCommandString = "arp $ip | awk 'BEGIN{ i=1; } { i++; if(i==3) print $3 }'";
    $mac = exec($macCommandString);

    if(!empty($_GET['query']))
    {
        $data = explode("x", $_GET['query']);
        if(sizeof($data) > 1)
        {
            $tempo = $data[0];
            $limite = $data[1];
        }
    }

    $token = explode(" ",$mac);
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Voucher-Fi</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body class="info">
        <h2>Dados Voucher</h2>
        <?php
            if(!empty($token))
            {
                if(sizeof($token) > 0)
                 {
         ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                <strong>MAC ADDRESS: </strong>
                                <?= $mac ?>
                            </h4>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-8">
                           <h4>
                               <strong>REMOTE IP: </strong>
                               <?= $_SERVER['REMOTE_ADDR'] ?>
                           </h4>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>
                                <strong>Tempo: </strong>
                                <?= $tempo ?>
                            </h4>
                        </div>
                        <div class="col-sm-4">
                            <h4>
                                <strong>Limite: </strong>
                                <?= $limite ?>
                            </h4>
                        </div>
                     </div>
             <?php
                }
            }
              ?>
    </body>
</html>
