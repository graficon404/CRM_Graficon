<?php
class grid_proveedores_lookup
{
//  
   function lookup_activo(&$activo) 
   {
      $conteudo = "" ; 
      if ($activo == "1")
      { 
          $conteudo = "Si";
      } 
      if ($activo == "0")
      { 
          $conteudo = "No";
      } 
      if (!empty($conteudo)) 
      { 
          $activo = $conteudo; 
      } 
   }  
}
?>
