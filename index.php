<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Pantau Penyebaran Virus Covid-19</title>
  </head>
  <body>
      <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container text-center">
          <h1 class="display-4">Corona Virus</h1>
          <p class="lead">
            <h2>
              PANTAU PENYEBARAN VIRUS COVID-19 DI DUNIA
              <br> SECARA REAL-TIME 
              <br> Mari bersama menjaga kesehatan diri kita.
            </h2>
          </p>
        </div>
      </div>
       
      <style stype="text/css">
        .box{
          padding: 30px 40px;
          border-radius: 5px;
        }
      </style>

      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="bg-danger box text-white">
              <div class="row">
                <div class="col-md-7">
                  <h5>Positif</h5>
                  <h2 id="data-kasus"> 1234 </h2>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/sad.svg" style="width: 100px;">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="bg-info box text-white">
              <div class="row">
                <div class="col-md-6">
                  <h5>Meninggal</h5>
                  <h2 id="data-mati"> 1234 </h2>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/cry.svg" style="width: 100px;">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="bg-success box text-white">
              <div class="row">
                <div class="col-md-6">
                  <h5>Sembuh</h5>
                  <h2 id="data-sembuh"> 1234 </h2>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/happy.svg" style="width: 100px;">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="bg-primary box text-white">
              <div class="row">
                <div class="col-md-3">
                  <h2>INDONESIA</h2>
                  <h5 id="data-id"> Positif : 12 orang <br> Meninggal : 20 orang <br> Sembuh : 3 orang</h5>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/indonesia.svg" style="width: 150px;">
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>

    <footer class="bg-primary text-center text-white mt-3 bt-2 pb-2">
      Create by. Channel Youtube "Ngodingpintar"
    </footer>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </body>
</html>

<script>
  $(document).ready(function(){

        //panggil fungsi menampilkan semua data global
        semuaData();
        dataNegara();

    function semuaData(){
      $.ajax({
          url : 'https://coronavirus-19-api.herokuapp.com/all', success : function(data){
            try{ 
              var json = data;
              var kasus = data.cases;
              var meninggal = data.deaths;
              var sembuh = data.recovered;

              $('#data-kasus').html(kasus);
              $('#data-mati').html(meninggal);
              $('#data-sembuh').html(sembuh);

            }catch{
              alert('Error');
            }
          }
      });
    }

    function dataNegara(){
      $.ajax({
          url : 'https://coronavirus-19-api.herokuapp.com/countries', success : function(data){
            try{ 
              
              var json = data;
              var html = [];

              if(json.length > 0){
                var i;
                for(i=0; i < json.length; i++){
                  var dataNegara = json[i];
                  var namaNegara = dataNegara.country;

                  if(namaNegara === 'Indonesia'){
                    var kasus = dataNegara.cases;
                    var mati = dataNegara.deaths;
                    var sembuh = dataNegara.recovered;
                    $('#data-id').html('Positif :'+kasus+' orang <br> Meningggal :'+mati+' orang <br>Sembuh: '+sembuh+'orang')
                  }
                }
              }

            }catch{
              alert('Error');
            }
          }
      });
    }

  });
</script>