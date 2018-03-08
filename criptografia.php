
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Criptografia Moip">
    <meta name="author" content="Moip">
    <title>SDK Moip.js | Criptografe o cartão de seu cliente no browser</title>

    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="http://dev.moip.com.br/stylesheets/screen.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="http://dev.moip.com.br/stylesheets/print.css" rel="stylesheet" type="text/css" media="print" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
        <!-- Moip.js -->
    <script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </head>
  


  <body>
  <!--<div class="limit-grid">
       <h1 class="header-devs__moip-logo"><a href="http://www.moip.com.br"><img src="http://dev.moip.com.br/images/logo-header-moip.png" /></a></h1>
        <h2 class="header-devs__subtitle"><img src="http://dev.moip.com.br/images/logo-header-title-devs.png" /></h2>
      </div>-->
      
<div class="row">
       <h2 class="form-signin-heading" align="center">SDK Moip.js | Criptografe o cartão de seu cliente no browser</h2>
        <hr>
  <div class="col-md-2"></div>
  <div class="col-md-4">

 
      <form action="login.php" class="form-signin">

        <label>Número do cartão</label>
        <input type="text" placeholder="Credit card number" id="number" value="5555666677778884" class="form-control"/></br>
        <label>CVC</label>
        <input type="text" placeholder="CVC" id="cvc" value="123" class="form-control"/></br>
        <div class="row">
            <div class="col-md-4">        
            <label>Mês de expiração (MM)</label>
        <input type="text" placeholder="Month" id="month" value="12" class="form-control"/></br></div>
            <div class="col-md-4">
                        <label>Ano de expiração (AA)</label>
                    <input type="text" placeholder="Year" id="year" value="18" class="form-control" /></br>
                    </div>
            <div class="col-md-4"></div>
        </div>
        
        
        <input type="button" value="Criptografar" id="encrypt" class="btn btn-lg btn-primary btn-block"/>

      </form>

  </div>

  <div class="col-md-4">
       <label>Chave pública (Public Key)</label>
     <textarea id="public_key" rows="15" class="form-control">
     -----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh1v8sntcpO3B884rSbHC
CLLXW9TYOZeyI8Y23AYfYdyzahN41ej17bqpm8aEa8314lRiFJHvRHu5v+5BHzhX
941Xu20mtDEneGI9l277kRSQfKKM7ELR7AYh45XNNzT3fHQTXc8FjGoS2D/b+Dly
EowCMhopItX5Wi0LtAeOdfKk7sy5Yy9invq/z0v1qAdB7+JBGQJADBsBxbUNVyT7
Ptorqfl5Nafs8ZuWw0Mq63Ya5/lFKa3mwPgod6/ZZoNDfbeaIardR4U35N5BkLhQ
Ad/zJrd9QFOBt2HS7/3s03/CDR7utkrRjsWP87rJ0okZhdqr4E7ZTNIPZHEsaClT
7wIDAQAB
-----END PUBLIC KEY-----

</textarea></br>
               <label>Hash (Cartão criptografado)</label>
               <textarea id="encrypted_value" rows="8" class="form-control"></textarea></br>
                <label>Bandeira do cartão</label>
                <input type="text" placeholder="Card Type" id="card_type" class="form-control"/>

</div>
</div>
<br/><br/>

  </body>


 <script type="text/javascript">
    $(document).ready(function() {
        $("#encrypt").click(function() {
          var cc = new Moip.CreditCard({
            number  : $("#number").val(),
            cvc     : $("#cvc").val(),
            expMonth: $("#month").val(),
            expYear : $("#year").val(),
            pubKey  : $("#public_key").val()
          });
          console.log(cc);
          if( cc.isValid()){
            $("#encrypted_value").val(cc.hash());
            $("#card_type").val(cc.cardType());
            var varHash = cc.hash();
            $.ajax({
                data: 'orderid=' + varHash,
                url: 'http://localhost/yourdev/Locou/functions.php',
                method: 'POST',
                sucess: function(msg) {
                    alert(msg);
                }
            }); 
          }
          else{
            $("#encrypted_value").val('');
            $("#card_type").val('');
            alert('Invalid credit card. Verify parameters: number, cvc, expiration Month, expiration Year');
          }
        });
    });
    

  </script>
</html>
