<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Chivo');
    * {
      font-family: 'Chivo', 'Arial';
      transition: top 1s ease, opacity 1s ease, height 1s ease;
    }

    body {
      overflow: hidden;
    }

    #section1 {
      width: 100%;
      height: 100%;
      transition: ease 1s;
      top: 0%;
      left: 0%;
      position: absolute;
    }

    #section2 {
      width: 100%;
      height: 100%;
      transition: ease 1s;
      top: 100%;
      position: absolute;
      left: 0%;
    }

    #section3 {
      width: 100%;
      height: 100%;
      transition: ease 1s;
      top: 100%;
      position: absolute;
      left: 0%;
    }


    .attributes {
      width: 30%;
      font-weight: bold;
    }

    .cat {
      font-weight: bold;
    }

    .slides {
      position: absolute;
      margin: auto 0;
      width: 100vw;
      height: 100%;
      left: 100%;
      transition: left 1s ease;
    }

    .lr_btn {
      position: absolute;
      top: 45%;
      font-size: 40px;
      font-weight: bold;
      display: none;
      cursor: pointer;
      z-index: 1;
    }

    .lr_btn:hover {
      color: #808080;
    }

    .nav_bar {
      position: fixed;
      top: 0%;
      left: 0%;
      width: 100%;
      height: 12%;
      background-color: #E3E3E3;
      z-index: 2;
    }

    #logo {
      top: 4%;
      position: absolute;
      left: 5%;
      cursor: pointer;
      height: 90%;
    }


    #nav1,
    #nav2,
    #nav3 {
      padding: 3%;
      width: 30%;
      height: 100%;
      border: none;
      cursor: pointer;
      background-color: #E3E3E3;
      font-size: 3vh;
      cursor: pointer;
      margin-left: 2%;
    }

    .inst {
      position: absolute;
      top: 20%;
      left: 22%;
      font-weight: bold;
      font-size: 6vh;
      color: #808080;

    }

    input[type=text] {
      width: 50%;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      background-color: white;
      background-image: url('searchicon.png');
      background-size: 4%;
      background-position: 1% 48%;
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      position: absolute;
      top: 50%;
      left: 22%;
    }

    #search_btn,
    #back2search {
      display: block;
      width: 5vw;
      left: 73vw;
      cursor: pointer;
      top: 32.85vh;
      background-color: white;
      color: #96B53C;
      font-weight: bold;
      font-size: 2vh;
      height: 5.5vh;
      border: none;
      position: absolute;
    }

    #back2search {
      display: none;
      left: 2vw;
      top: 13.4vh;
      width: 10vw;
      height: 5vh;
    }

    #search_btn:hover,
    #back2search:hover {
      background-color: #96B53C;
      color: white;
    }

    #right_btn {
      left: 3vw;
    }

    #left_btn {
      left: 95vw;
    }

    #search_div {
      left: 0;
      background: #E3E3E3;
      top: 19.5vh;
      height: 65vh;
    }

    #slide_conts {
      top: 19.5vh;
      height: 65vh;
    }

    #cont1 {
      left: 0;
    }

    #cont1,
    #cont2,
    #cont3,
    #cont4 {
      background: #E3E3E3;
    }


    #plantimage {
      position: absolute;
      left: 0;
      margin-left: 8%;
      margin-top: 20vh;
      width: 24vw;
      height: 38vh;

    }

    #planttitle {
      position: absolute;
      margin-top: 6vh;
      left: 8%;
      font-weight: bold;
      font-size: 10vh;
    }

    #sc_name {
      position: absolute;
      margin-top: 11%;
      left: 34%;
      font-style: italic;
      font-size: 6vh;
      color: dimgray;
    }

    #f_name {
      position: absolute;
      margin-top: 16%;
      left: 34%;
      font-size: 2vh;
    }

    #descri {
      position: absolute;
      margin-top: 19%;
      left: 34%;
      font-size: 2vh;
      margin-right: 5%;
      width: 58vw;
    }

    #agro_table,
    #nutrient_table,
    #usage_table {
      width: 100%;
      margin-top: 2%;
      margin-bottom: 2%;
      border-collapse: collapse;

    }

    .table_cont {
      width: 60%;
      height: 100%;
      margin-left: 20%;
      overflow-y: auto;
    }


    .table_head {
      color: white;
      font-weight: bold;
      text-align: center;
      font-size: 3vh;
    }

    #agro_table td {
      border: 2.5px solid #FFAA36;
    }

    #nutrient_table td {
      border: 2.5px solid #85AED0;
    }

    #usage_table td {
      border: 2.5px solid #B0D64A;
    }

    td {
      font-size: 2vh;
    }

    th,
    td {
      padding: 15px;
      text-align: left;
    }

    #agro_table .cat {
      color: #FFAA36;
      font-weight: bold;
    }

    #nutrient_table .cat {
      color: #85AED0;
      font-weight: bold;
    }

    #usage_table .cat {
      color: #B0D64A;
      font-weight: bold;
    }

    .footer {
      position: absolute;
      top: 92%;
      left: 0%;
      width: 100%;
      height: 8%;
      background-color: #253E6B;
    }

    /*comp*/

    #comp_div {
      position: absolute;
      width: 100%;
      height: 50%;
      top: 25%;
      background-color: #E3E3E3;
      z-index: 1;
    }

    #inst_comp {
      position: absolute;
      top: 20%;
      left: 14%;
      font-weight: bold;
      font-size: 6vh;
      color: #808080;

    }

    #comp_div input[type=text] {
      width: 30%;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      background-color: white;
      background-image: url('searchicon.png');
      background-size: 4%;
      background-position: 1% 48%;
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      top: 50%;
      position: absolute;
    }

    #search1 {
      left: 14%;
    }

    #search2 {
      left: 56%;
    }

    #compare_btn {
      display: block;
      width: 8%;
      left: 46%;
      cursor: pointer;
      top: 50%;
      background-color: #96B53C;
      color: white;
      font-weight: bold;
      font-size: 2vh;
      height: 6vh;
      border: dimgray;
      position: absolute;
    }

    #compare_btn:hover {
      border: none;
      background-color: white;
      color: #96B53C;
    }

    .glow_reset {
      -webkit-animation: glowing 1500ms infinite;
      -moz-animation: glowing 1500ms infinite;
      -o-animation: glowing 1500ms infinite;
      animation: glowing 1500ms infinite;
    }

    @-webkit-keyframes glowing {
      0% {
        background-color: #bae835;
        -webkit-box-shadow: 0 0 3px #bae835;
      }
      50% {
        background-color: #96B53C;
        -webkit-box-shadow: 0 0 40px #96B53C;
      }
      100% {
        background-color: #bae835;
        -webkit-box-shadow: 0 0 3px #bae835;
      }
    }

    @-moz-keyframes glowing {
      0% {
        background-color: #bae835;
        -moz-box-shadow: 0 0 3px #bae835;
      }
      50% {
        background-color: #96B53C;
        -moz-box-shadow: 0 0 40px #96B53C;
      }
      100% {
        background-color: #bae835;
        -moz-box-shadow: 0 0 3px #bae835;
      }
    }

    @-o-keyframes glowing {
      0% {
        background-color: #bae835;
        box-shadow: 0 0 3px #bae835;
      }
      50% {
        background-color: #96B53C;
        box-shadow: 0 0 40px #96B53C;
      }
      100% {
        background-color: #bae835;
        box-shadow: 0 0 3px #bae835;
      }
    }

    @keyframes glowing {
      0% {
        background-color: #bae835;
        box-shadow: 0 0 3px #bae835;
      }
      50% {
        background-color: #96B53C;
        box-shadow: 0 0 40px #96B53C;
      }
      100% {
        background-color: #bae835;
        box-shadow: 0 0 3px #bae835;
      }
    }

    #graphs {
      position: absolute;
      height: 68%;
      width: 80%;
      top: 26%;
      display: block;
      opacity: 0;
      left: 10%;
    }

    .nav a {
      color: #ED802C;
      font-weight: bold;
      font-size: 2vh;
    }

    .nav-pills>li.active>a,
    .nav-pills>li.active>a:focus,
    .nav-pills>li.active>a:hover {
      background-color: #96B53C;
    }

    /*graph*/

    #s_graph {
      position: absolute;
      height: 68%;
      width: 80%;
      top: 16%;
      display: block;
      left: 10%;
    }

    canvas {
      width: 100%;
      height: 88%;
      position: absolute;
      top: 12%;
    }

    #canvas1 {
      border: 1px solid black;
    }

    #canvas2 {
      border: 1px solid red;
    }

    #canvas3 {
      border: 1px solid green;
    }

    #canvas4 {
      border: 1px solid blue;
    }
  </style>
</head>

<body>

  <div id="section1">
    <?php include 'index.html';?>
  </div>

  <div id="section2">
    <?php include 'comparison.html';?>
  </div>

  <div id="section3">
    <?php include 'individual.html';?>
  </div>




  <script>
    //scroll
    var sec1 = document.getElementById("section1");

    var sec2 = document.getElementById("section2");

    var sec3 = document.getElementById("section3");


    sec1.addEventListener('wheel', function (e) {
      if (e.deltaY > 0) {
        sec1.style = "top:-100%";
        sec2.style = "top:0%";
      }
    });

    sec2.addEventListener('wheel', function (e) {
      if (e.deltaY > 0) {
        sec2.style = "top:-100%";
        sec3.style = "top:0%";
      } else if (e.deltaY < 0) {
        sec1.style = "top:0%";
        sec2.style = "top:100%";
      }
    });

    sec3.addEventListener('wheel', function (e) {
      if (e.deltaY < 0) {
        if ($('.table_cont:hover').length == 0) {
          sec2.style = "top:0%";
          sec3.style = "top:100%";
        }
      }
    });
  </script>


  <script>
    //ind
    function startSlide() {
      document.getElementById('search_div').style.left = '-100%';
      document.getElementById('slide_conts').style.left = '0';
      document.getElementById('left_btn').style.display = 'block';
      document.getElementById('back2search').style.display = 'block';
    }

    function back2search() {
      document.getElementById('back2search').style.display = 'none';
      document.getElementById('search_div').style.left = '0';
      document.getElementById('cont1').style.left = '0';
      document.getElementById('cont2').style.left = '100%';
      document.getElementById('cont3').style.left = '100%';
      document.getElementById('cont4').style.left = '100%';
      $("#cont1").addClass("current-slide");
      $("#cont2").removeClass("current-slide");
      $("#cont3").removeClass("current-slide");
      $("#cont4").removeClass("current-slide");
      document.getElementById('slide_conts').style.left = '100%';
      document.getElementById('left_btn').style.display = 'none';
      document.getElementById('right_btn').style.display = 'none';
    }


  </script>

  </script>

</body>

</html>