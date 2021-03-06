<?php

class grid_proveedores_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $texto_tag;
   var $arquivo;
   var $tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_proveedores_rtf()
   {
      $this->nm_data   = new nm_data("es");
      $this->texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->arquivo    = "sc_rtf";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_grid_proveedores";
      $this->arquivo   .= ".rtf";
      $this->tit_doc    = "grid_proveedores.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_proveedores']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_proveedores']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_proveedores']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['campos_busca']))
      { 
          $this->ing_bruto = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['campos_busca']['ing_bruto']; 
          $tmp_pos = strpos($this->ing_bruto, "##@@");
          if ($tmp_pos !== false)
          {
              $this->ing_bruto = substr($this->ing_bruto, 0, $tmp_pos);
          }
          $this->id_proveedores = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['campos_busca']['id_proveedores']; 
          $tmp_pos = strpos($this->id_proveedores, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_proveedores = substr($this->id_proveedores, 0, $tmp_pos);
          }
          $this->razon_social = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['campos_busca']['razon_social']; 
          $tmp_pos = strpos($this->razon_social, "##@@");
          if ($tmp_pos !== false)
          {
              $this->razon_social = substr($this->razon_social, 0, $tmp_pos);
          }
          $this->cuit = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['campos_busca']['cuit']; 
          $tmp_pos = strpos($this->cuit, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cuit = substr($this->cuit, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['rtf_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['rtf_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Razon_social, CUIT, Ing_Bruto, Direccion, Cod_Postal, Localidad, Provincia, Telefono, E_mail, Contacto, Activo, id_proveedores from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT Razon_social, CUIT, Ing_Bruto, Direccion, Cod_Postal, Localidad, Provincia, Telefono, E_mail, Contacto, Activo, id_proveedores from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['razon_social'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Razon_social'] . "";
      $this->New_label['cuit'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_CUIT'] . "";
      $this->New_label['ing_bruto'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Ing_Bruto'] . "";
      $this->New_label['direccion'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Direccion'] . "";
      $this->New_label['cod_postal'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Cod_Postal'] . "";
      $this->New_label['localidad'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Localidad'] . "";
      $this->New_label['provincia'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Provincia'] . "";
      $this->New_label['telefono'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Telefono'] . "";
      $this->New_label['e_mail'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_E_mail'] . "";
      $this->New_label['contacto'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Contacto'] . "";
      $this->New_label['activo'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Activo'] . "";
      $this->New_label['id_proveedores'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_id_proveedores'] . "";
      $this->New_label['observaciones'] = "" . $this->Ini->Nm_lang['lang_proveedores_fld_Observaciones'] . "";

      $this->texto_tag .= "<table>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['razon_social'])) ? $this->New_label['razon_social'] : ""; 
          if ($Cada_col == "razon_social" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cuit'])) ? $this->New_label['cuit'] : ""; 
          if ($Cada_col == "cuit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ing_bruto'])) ? $this->New_label['ing_bruto'] : ""; 
          if ($Cada_col == "ing_bruto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : ""; 
          if ($Cada_col == "direccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_postal'])) ? $this->New_label['cod_postal'] : ""; 
          if ($Cada_col == "cod_postal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['localidad'])) ? $this->New_label['localidad'] : ""; 
          if ($Cada_col == "localidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['provincia'])) ? $this->New_label['provincia'] : ""; 
          if ($Cada_col == "provincia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : ""; 
          if ($Cada_col == "telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['e_mail'])) ? $this->New_label['e_mail'] : ""; 
          if ($Cada_col == "e_mail" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['contacto'])) ? $this->New_label['contacto'] : ""; 
          if ($Cada_col == "contacto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['activo'])) ? $this->New_label['activo'] : ""; 
          if ($Cada_col == "activo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->texto_tag .= "<tr>\r\n";
         $this->razon_social = $rs->fields[0] ;  
         $this->cuit = $rs->fields[1] ;  
         $this->ing_bruto = $rs->fields[2] ;  
         $this->direccion = $rs->fields[3] ;  
         $this->cod_postal = $rs->fields[4] ;  
         $this->localidad = $rs->fields[5] ;  
         $this->provincia = $rs->fields[6] ;  
         $this->telefono = $rs->fields[7] ;  
         $this->e_mail = $rs->fields[8] ;  
         $this->contacto = $rs->fields[9] ;  
         $this->activo = $rs->fields[10] ;  
         $this->activo = (string)$this->activo;
         $this->id_proveedores = $rs->fields[11] ;  
         $this->id_proveedores = (string)$this->id_proveedores;
         //----- lookup - activo
         $this->look_activo = $this->activo; 
         $this->Lookup->lookup_activo($this->look_activo); 
         $this->look_activo = ($this->look_activo == "&nbsp;") ? "" : $this->look_activo; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- razon_social
   function NM_export_razon_social()
   {
         if (!NM_is_utf8($this->razon_social))
         {
             $this->razon_social = mb_convert_encoding($this->razon_social, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->razon_social = str_replace('<', '&lt;', $this->razon_social);
          $this->razon_social = str_replace('>', '&gt;', $this->razon_social);
         $this->texto_tag .= "<td>" . $this->razon_social . "</td>\r\n";
   }
   //----- cuit
   function NM_export_cuit()
   {
         if (!NM_is_utf8($this->cuit))
         {
             $this->cuit = mb_convert_encoding($this->cuit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->cuit = str_replace('<', '&lt;', $this->cuit);
          $this->cuit = str_replace('>', '&gt;', $this->cuit);
         $this->texto_tag .= "<td>" . $this->cuit . "</td>\r\n";
   }
   //----- ing_bruto
   function NM_export_ing_bruto()
   {
         if (!NM_is_utf8($this->ing_bruto))
         {
             $this->ing_bruto = mb_convert_encoding($this->ing_bruto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->ing_bruto = str_replace('<', '&lt;', $this->ing_bruto);
          $this->ing_bruto = str_replace('>', '&gt;', $this->ing_bruto);
         $this->texto_tag .= "<td>" . $this->ing_bruto . "</td>\r\n";
   }
   //----- direccion
   function NM_export_direccion()
   {
         if (!NM_is_utf8($this->direccion))
         {
             $this->direccion = mb_convert_encoding($this->direccion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->direccion = str_replace('<', '&lt;', $this->direccion);
          $this->direccion = str_replace('>', '&gt;', $this->direccion);
         $this->texto_tag .= "<td>" . $this->direccion . "</td>\r\n";
   }
   //----- cod_postal
   function NM_export_cod_postal()
   {
         if (!NM_is_utf8($this->cod_postal))
         {
             $this->cod_postal = mb_convert_encoding($this->cod_postal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->cod_postal = str_replace('<', '&lt;', $this->cod_postal);
          $this->cod_postal = str_replace('>', '&gt;', $this->cod_postal);
         $this->texto_tag .= "<td>" . $this->cod_postal . "</td>\r\n";
   }
   //----- localidad
   function NM_export_localidad()
   {
         if (!NM_is_utf8($this->localidad))
         {
             $this->localidad = mb_convert_encoding($this->localidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->localidad = str_replace('<', '&lt;', $this->localidad);
          $this->localidad = str_replace('>', '&gt;', $this->localidad);
         $this->texto_tag .= "<td>" . $this->localidad . "</td>\r\n";
   }
   //----- provincia
   function NM_export_provincia()
   {
         if (!NM_is_utf8($this->provincia))
         {
             $this->provincia = mb_convert_encoding($this->provincia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->provincia = str_replace('<', '&lt;', $this->provincia);
          $this->provincia = str_replace('>', '&gt;', $this->provincia);
         $this->texto_tag .= "<td>" . $this->provincia . "</td>\r\n";
   }
   //----- telefono
   function NM_export_telefono()
   {
         if (!NM_is_utf8($this->telefono))
         {
             $this->telefono = mb_convert_encoding($this->telefono, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->telefono = str_replace('<', '&lt;', $this->telefono);
          $this->telefono = str_replace('>', '&gt;', $this->telefono);
         $this->texto_tag .= "<td>" . $this->telefono . "</td>\r\n";
   }
   //----- e_mail
   function NM_export_e_mail()
   {
         if (!NM_is_utf8($this->e_mail))
         {
             $this->e_mail = mb_convert_encoding($this->e_mail, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->e_mail = str_replace('<', '&lt;', $this->e_mail);
          $this->e_mail = str_replace('>', '&gt;', $this->e_mail);
         $this->texto_tag .= "<td>" . $this->e_mail . "</td>\r\n";
   }
   //----- contacto
   function NM_export_contacto()
   {
         if (!NM_is_utf8($this->contacto))
         {
             $this->contacto = mb_convert_encoding($this->contacto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->contacto = str_replace('<', '&lt;', $this->contacto);
          $this->contacto = str_replace('>', '&gt;', $this->contacto);
         $this->texto_tag .= "<td>" . $this->contacto . "</td>\r\n";
   }
   //----- activo
   function NM_export_activo()
   {
         if (!NM_is_utf8($this->look_activo))
         {
             $this->look_activo = mb_convert_encoding($this->look_activo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_activo = str_replace('<', '&lt;', $this->look_activo);
          $this->look_activo = str_replace('>', '&gt;', $this->look_activo);
         $this->texto_tag .= "<td>" . $this->look_activo . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_proveedores']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_proveedores'] ?> :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_proveedores_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
