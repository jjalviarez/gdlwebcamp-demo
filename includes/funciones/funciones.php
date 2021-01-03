<?php
function productos_json(&$boleto, &$camisas = 0, &$etiquetas = 0) {
  $dias = array(
    0 => "un_dia" ,
    1 => 'pase_completo' ,
    2 => "pase_2dias"
  );
  $totoal_boletos = array_combine($dias,$boleto);
  $json = array();
  foreach ($totoal_boletos as $key => $value) {
    if ((int) $value > 0) {
      $json[$key] = (int) $value;
    }
  }

  if ((int) $camisas > 0) {
    $json["camisas"] = (int) $camisas;
  }

  if ((int) $etiquetas > 0) {
    $json["etiquetas"] = (int) $etiquetas;
  }

  return json_encode($json);


}

function eventos_json(&$eventos) {
  $objero_evento =  array();
  foreach ($eventos as $evento) {
    $objero_evento["eventos"][] = $evento;
  }
  return json_encode($objero_evento);



}
