<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>FutChampions</title>

  <style>

    .parent-player {
      background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="892" height="725" viewBox="0 0 904 650" fill="none"%3E%3Cpath d="M903 649.439H1L120.311 1H783.788L903 649.439Z" fill="%23404040" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M69.8843 275.038H834.169" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M550.992 275.425C553.194 321.703 508.921 360.763 452.019 360.763C395.117 360.763 350.853 321.703 353.062 275.425C355.172 231.123 399.452 196.564 452.035 196.564C504.618 196.564 548.89 231.115 550.992 275.425Z" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M541.288 71.4008C543.078 109.009 503.086 140.632 451.897 140.632C400.708 140.632 360.732 109.017 362.53 71.4008C364.259 35.2446 404.251 6.93591 451.92 6.93591C499.582 6.93591 539.574 35.2446 541.288 71.4008Z" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M269.125 96.4996H640.093L630.663 1.1532H278.312L269.125 96.4996Z" fill="%23404040" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M371.922 54.7625H532.542L530.219 1.13715H374.245L371.922 54.7625Z" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M343.464 530.333C346.061 474.554 395.78 431.261 454.624 431.261C513.469 431.261 563.279 474.554 565.998 530.333C568.855 588.91 519.151 638.6 454.853 638.6C390.554 638.6 340.737 588.91 343.471 530.333H343.464Z" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M675.597 492.572H227.26L211.911 649.198H690.84L675.597 492.572Z" fill="%23404040" stroke="%23696969" stroke-miterlimit="10"/%3E%3Cpath d="M556.362 556.642H352.353L348.43 649.238H560.453L556.362 556.642Z" stroke="%23696969" stroke-miterlimit="10"/%3E%3C/svg%3E');
      background-repeat: no-repeat;
      background-size: 100%;
      height: 100vh;
      width: 100%;
      background-position: center;
      background-size: cover;
      object-fit: cover;
      grid-template-rows: repeat(15, minmax(0, 1fr));
    }
  </style>
</head>

<body onload="ReadAll()">
  <section style="padding: 50px" class="displayFlex display">
    <div class="parent-player grid grid-cols-12 grid-rows-12 gap-4 w-full">
      <div id="gk" style="background-image: url('./assets/img/badge_gold.webp');
            background-size: cover;
            width: 150px;
            height: 200px;"
        class="row-start-11 col-start-6 col-span-2 row-span-4  p-4 text-center text-white rounded-lg relative">



      </div>


      <div id="lb" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
                  " class="row-start-8 col-start-2 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>


      <div id="cbLeft" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-9 col-start-4 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>
      <div id="cbRight" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-9 col-start-8 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">

      </div>
      <div id="rb" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-8 col-start-10 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>

      <!-- Midfielders (3 players) -->
      <div id="cmfLeft" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-5 col-start-4 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>
      <div id="dmf" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-7 col-start-6 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>
      <div id="cmfRight" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-5 col-start-8 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>

      <!-- Forwards (3 players) -->
      <div id="lwf" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-2 col-start-3 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>
      <div id="st" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-1 col-start-6 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>
      <div id="rwf" style="background-image: url('./assets/img/badge_gold.webp');
                  background-size: cover;
                  width: 150px;
                  height: 200px; 
      " class="row-start-2 col-start-9 col-span-2 row-span-4 p-4 text-center text-white rounded-lg">


      </div>
    </div>
  </section>

    


  <script src="./assets/js/script.js"></script>
</body>

</html>