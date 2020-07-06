<?php
class grid_documentos_lookup
{
//  
   function lookup_control_stock(&$control_stock) 
   {
      $conteudo = "" ; 
      if ($control_stock == "1")
      { 
          $conteudo = "Si";
      } 
      if ($control_stock == "0")
      { 
          $conteudo = "NO";
      } 
      if (!empty($conteudo)) 
      { 
          $control_stock = $conteudo; 
      } 
   }  
//  
   function lookup_graba_caja(&$graba_caja) 
   {
      $conteudo = "" ; 
      if ($graba_caja == "1")
      { 
          $conteudo = "Si";
      } 
      if ($graba_caja == "0")
      { 
          $conteudo = "No";
      } 
      if (!empty($conteudo)) 
      { 
          $graba_caja = $conteudo; 
      } 
   }  
//  
   function lookup_graba_cliente_ctacte(&$graba_cliente_ctacte) 
   {
      $conteudo = "" ; 
      if ($graba_cliente_ctacte == "1")
      { 
          $conteudo = "Si";
      } 
      if ($graba_cliente_ctacte == "0")
      { 
          $conteudo = "No";
      } 
      if (!empty($conteudo)) 
      { 
          $graba_cliente_ctacte = $conteudo; 
      } 
   }  
//  
   function lookup_graba_prov_ctacte(&$graba_prov_ctacte) 
   {
      $conteudo = "" ; 
      if ($graba_prov_ctacte == "1")
      { 
          $conteudo = "Si";
      } 
      if ($graba_prov_ctacte == "0")
      { 
          $conteudo = "No";
      } 
      if (!empty($conteudo)) 
      { 
          $graba_prov_ctacte = $conteudo; 
      } 
   }  
}
?>
