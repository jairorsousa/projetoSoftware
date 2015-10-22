<?php
   $totalPalestrantes = Totais::Palestrante();
   $totalAlunos = Totais::Alunos();
   $totalPalestras = Totais::Palestras();
   $totalMiniCurso = Totais::MiniCurso();
   $totalBanners = Totais::Banners();
   $trabalhos = Totais::Trabalhos();
?>
  <style>
     #box{
          position: absolute;
          right: 15px;
          top: 50px;
          width: 82%;
          height: auto;
      }
      .info{
          width: 200px;
          float: left;
          margin-right: 10px;
          margin-bottom: 10px;
          background: #fff;
         -moz-box-shadow: 0 0 5px #888;
         -webkit-box-shadow: 0 0 5px#888;
         box-shadow: 0 0 5px #888;

      }
      .info:hover{
          background: #1C3D50;
          cursor: pointer;
          color: #fff;
      }
      .info:hover h1{
          color: #fff;
      }
      .info:hover .total{
          color: #fff;
      }
      .info h1{
          margin: 10px;
          float: left;
          color: #1C3D50;
          font-size: 40px;
      }
      .total{
          font-size: 30px;
          color:#1C3D50;
      }
      #border{
          border-left: 2px solid #ccc;
          float: left;
          height: 50px;
          margin-top: 10px;
          margin-bottom: 10px;
          margin-left: 10px;
          width: 5px;
          text-indent: 9999px;
      }
      .submetidos{
          width: 200px;
          float: left;
          margin-right: 10px;
          background: #fff;
          -moz-box-shadow: 0 0 5px #888;
          -webkit-box-shadow: 0 0 5px#888;
          box-shadow: 0 0 5px #888;
      }


  </style>
 <section id="box">
     <section onclick="window.location='aluno.php';" class="info">
         <h1><i class="fa fa-users"></i></h1>
         <div id="border">q</div>
         <p align="center" class="total"><?=$totalAlunos?></p>
         <p align="center">Alunos</p>


     </section>
     <section onclick="window.location='palestrante.php';" class="info">
         <h1><i class="fa fa-street-view"></i></h1>
         <div id="border">q</div>
         <p align="center" class="total"><?=$totalPalestrantes?></p>
         <p align="center">Palestrantes</p>

     </section>
     <section onclick="window.location='palestra.php';" class="info">
         <h1><i class="fa fa-file-powerpoint-o"></i></h1>
         <div id="border">q</div>
         <p align="center" class="total"><?=$totalPalestras?></p>
         <p align="center">Palestras</p>
     </section>
     <section onclick="window.location='minicurso.php';" class="info">

         <h1><i class="fa fa-file-text"></i></h1>
         <div id="border">q</div>
         <p align="center" class="total"><?=$totalMiniCurso?></p>
         <p align="center">MiniCurso</p>
     </section>
     <section onclick="window.location='banner.php';" class="info">
         <h1><i class="fa fa-square"></i></h1>
         <div id="border">q</div>
         <p align="center" class="total"><?=$totalBanners?></p>
         <p align="center">Banner</p>
     </section>
     <section onclick="window.location='submetidos.php'" class="info">
         <p align="center" class="total"><?=$trabalhos?></p>
         <p align="center">Aguardando Avaliação</p>
     </section>
 </section>


