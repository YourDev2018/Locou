<?php

     

  $arrayHorarios = $busca->retornarDiasCadastrados($conn,$idAnuncio);

  for ($i =0; $i<count($arrayHorarios); $i ++) {

    $originalDate = $arrayHorarios[$i];
    $newDate = date("d-m-Y", strtotime($originalDate));
    //   print $newDate. " / " ;

    $day = date('N',strtotime($newDate));

    if($day == 1)
    $seg =  json_encode(true);

    if($day == 2)
    $ter=  json_encode(true);

    if($day == 3)
    $qua =  json_encode(true);

    if($day == 4)
    $qui = json_encode(true);

    if($day == 5)
    $sex =  json_encode(true);

    if($day == 6)
    $sab =  json_encode(true);

    if($day == 7)
    $dom = json_encode(true);
  }

  

?>