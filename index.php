<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Voucher-Fi</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h2>
            <span class="glyphicon glyphicon-qrcode">
            </span>
            Gerar Voucher
        </h2>

        <div class="row">
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-time"></i>
                    </span>
                    <input type="number" class="form-control" name="tempo" placeholder=" Defina o tempo em minutos" id="tempo">
                </div>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-9">
               <div class="input-group">
                   <span class="input-group-addon">
                       <i class="glyphicon glyphicon-phone"></i>
                   </span>
                   <input type="number" class="form-control" name="limite" placeholder=" Defina o limite de uso" id="limite">
               </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-9">
              <input type="button" class="btn btn-success btn-block" value="Gerar" onclick="generate_qrcode()">
          </div>
      </div>
      <div class="row">
          <div id="result">

          </div>
      </div>
    </body>
    <script>
        function generate_qrcode(){
            const tempo = document.getElementById("tempo").value + "x";
            const limite = document.getElementById("limite").value;
            const url = "http://192.168.0.113/TCC_web/showMac.php?query=";
            var sample = url.concat(tempo);
            sample = sample.concat(limite);

            $.ajax({
                type: 'post',
                url: 'generator.php',
                data : {sample:sample},
                success: function(code){
                    $('#result').html(code);
                }
            });
        }
    </script>
</html>
