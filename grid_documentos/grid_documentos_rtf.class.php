<?php

class grid_documentos_rtf
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
   function grid_documentos_rtf()
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
      $this->arquivo   .= "_grid_documentos";
      $this->arquivo   .= ".rtf";
      $this->tit_doc    = "grid_documentos.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_documentos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_documentos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_documentos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['campos_busca']))
      { 
          $this->punto_vta = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['campos_busca']['punto_vta']; 
          $tmp_pos = strpos($this->punto_vta, "##@@");
          if ($tmp_pos !== false)
          {
              $this->punto_vta = substr($this->punto_vta, 0, $tmp_pos);
          }
          $this->id_documento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['campos_busca']['id_documento']; 
          $tmp_pos = strpos($this->id_documento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_documento = substr($this->id_documento, 0, $tmp_pos);
          }
          $this->decripcion_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['campos_busca']['decripcion_doc']; 
          $tmp_pos = strpos($this->decripcion_doc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->decripcion_doc = substr($this->decripcion_doc, 0, $tmp_pos);
          }
          $this->numero = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['campos_busca']['numero']; 
          $tmp_pos = strpos($this->numero, "##@@");
          if ($tmp_pos !== false)
          {
              $this->numero = substr($this->numero, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['rtf_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['rtf_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_documento, Decripcion_doc, numero, Punto_vta, Cantidad_filas, Control_stock, Graba_caja, Graba_cliente_ctacte, Graba_prov_Ctacte from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_documento, Decripcion_doc, numero, Punto_vta, Cantidad_filas, Control_stock, Graba_caja, Graba_cliente_ctacte, Graba_prov_Ctacte from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->texto_tag .= "<table>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_documento'])) ? $this->New_label['id_documento'] : "Id Documento"; 
          if ($Cada_col == "id_documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['decripcion_doc'])) ? $this->New_label['decripcion_doc'] : "Decripción"; 
          if ($Cada_col == "decripcion_doc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "Número"; 
          if ($Cada_col == "numero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['punto_vta'])) ? $this->New_label['punto_vta'] : "Punto Vta"; 
          if ($Cada_col == "punto_vta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cantidad_filas'])) ? $this->New_label['cantidad_filas'] : "Cant. Filas"; 
          if ($Cada_col == "cantidad_filas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['control_stock'])) ? $this->New_label['control_stock'] : "Control Stock"; 
          if ($Cada_col == "control_stock" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['graba_caja'])) ? $this->New_label['graba_caja'] : "Graba Caja"; 
          if ($Cada_col == "graba_caja" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['graba_cliente_ctacte'])) ? $this->New_label['graba_cliente_ctacte'] : "Graba Cliente Ctacte"; 
          if ($Cada_col == "graba_cliente_ctacte" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['graba_prov_ctacte'])) ? $this->New_label['graba_prov_ctacte'] : "Graba Prov. Ctacte"; 
          if ($Cada_col == "graba_prov_ctacte" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->id_documento = $rs->fields[0] ;  
         $this->id_documento = (string)$this->id_documento;
         $this->decripcion_doc = $rs->fields[1] ;  
         $this->numero = $rs->fields[2] ;  
         $this->numero = (string)$this->numero;
         $this->punto_vta = $rs->fields[3] ;  
         $this->cantidad_filas = $rs->fields[4] ;  
         $this->cantidad_filas = (string)$this->cantidad_filas;
         $this->control_stock = $rs->fields[5] ;  
         $this->control_stock = (string)$this->control_stock;
         $this->graba_caja = $rs->fields[6] ;  
         $this->graba_caja = (string)$this->graba_caja;
         $this->graba_cliente_ctacte = $rs->fields[7] ;  
         $this->graba_cliente_ctacte = (string)$this->graba_cliente_ctacte;
         $this->graba_prov_ctacte = $rs->fields[8] ;  
         $this->graba_prov_ctacte = (string)$this->graba_prov_ctacte;
         //----- lookup - control_stock
         $this->look_control_stock = $this->control_stock; 
         $this->Lookup->lookup_control_stock($this->look_control_stock); 
         $this->look_control_stock = ($this->look_control_stock == "&nbsp;") ? "" : $this->look_control_stock; 
         //----- lookup - graba_caja
         $this->look_graba_caja = $this->graba_caja; 
         $this->Lookup->lookup_graba_caja($this->look_graba_caja); 
         $this->look_graba_caja = ($this->look_graba_caja == "&nbsp;") ? "" : $this->look_graba_caja; 
         //----- lookup - graba_cliente_ctacte
         $this->look_graba_cliente_ctacte = $this->graba_cliente_ctacte; 
         $this->Lookup->lookup_graba_cliente_ctacte($this->look_graba_cliente_ctacte); 
         $this->look_graba_cliente_ctacte = ($this->look_graba_cliente_ctacte == "&nbsp;") ? "" : $this->look_graba_cliente_ctacte; 
         //----- lookup - graba_prov_ctacte
         $this->look_graba_prov_ctacte = $this->graba_prov_ctacte; 
         $this->Lookup->lookup_graba_prov_ctacte($this->look_graba_prov_ctacte); 
         $this->look_graba_prov_ctacte = ($this->look_graba_prov_ctacte == "&nbsp;") ? "" : $this->look_graba_prov_ctacte; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['field_order'] as $Cada_col)
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
   //----- id_documento
   function NM_export_id_documento()
   {
         nmgp_Form_Num_Val($this->id_documento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_documento))
         {
             $this->id_documento = mb_convert_encoding($this->id_documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->id_documento = str_replace('<', '&lt;', $this->id_documento);
          $this->id_documento = str_replace('>', '&gt;', $this->id_documento);
         $this->texto_tag .= "<td>" . $this->id_documento . "</td>\r\n";
   }
   //----- decripcion_doc
   function NM_export_decripcion_doc()
   {
         if (!NM_is_utf8($this->decripcion_doc))
         {
             $this->decripcion_doc = mb_convert_encoding($this->decripcion_doc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->decripcion_doc = str_replace('<', '&lt;', $this->decripcion_doc);
          $this->decripcion_doc = str_replace('>', '&gt;', $this->decripcion_doc);
         $this->texto_tag .= "<td>" . $this->decripcion_doc . "</td>\r\n";
   }
   //----- numero
   function NM_export_numero()
   {
         nmgp_Form_Num_Val($this->numero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->numero))
         {
             $this->numero = mb_convert_encoding($this->numero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->numero = str_replace('<', '&lt;', $this->numero);
          $this->numero = str_replace('>', '&gt;', $this->numero);
         $this->texto_tag .= "<td>" . $this->numero . "</td>\r\n";
   }
   //----- punto_vta
   function NM_export_punto_vta()
   {
         if (!NM_is_utf8($this->punto_vta))
         {
             $this->punto_vta = mb_convert_encoding($this->punto_vta, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->punto_vta = str_replace('<', '&lt;', $this->punto_vta);
          $this->punto_vta = str_replace('>', '&gt;', $this->punto_vta);
         $this->texto_tag .= "<td>" . $this->punto_vta . "</td>\r\n";
   }
   //----- cantidad_filas
   function NM_export_cantidad_filas()
   {
         nmgp_Form_Num_Val($this->cantidad_filas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->cantidad_filas))
         {
             $this->cantidad_filas = mb_convert_encoding($this->cantidad_filas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->cantidad_filas = str_replace('<', '&lt;', $this->cantidad_filas);
          $this->cantidad_filas = str_replace('>', '&gt;', $this->cantidad_filas);
         $this->texto_tag .= "<td>" . $this->cantidad_filas . "</td>\r\n";
   }
   //----- control_stock
   function NM_export_control_stock()
   {
         if (!NM_is_utf8($this->look_control_stock))
         {
             $this->look_control_stock = mb_convert_encoding($this->look_control_stock, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_control_stock = str_replace('<', '&lt;', $this->look_control_stock);
          $this->look_control_stock = str_replace('>', '&gt;', $this->look_control_stock);
         $this->texto_tag .= "<td>" . $this->look_control_stock . "</td>\r\n";
   }
   //----- graba_caja
   function NM_export_graba_caja()
   {
         if (!NM_is_utf8($this->look_graba_caja))
         {
             $this->look_graba_caja = mb_convert_encoding($this->look_graba_caja, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_graba_caja = str_replace('<', '&lt;', $this->look_graba_caja);
          $this->look_graba_caja = str_replace('>', '&gt;', $this->look_graba_caja);
         $this->texto_tag .= "<td>" . $this->look_graba_caja . "</td>\r\n";
   }
   //----- graba_cliente_ctacte
   function NM_export_graba_cliente_ctacte()
   {
         if (!NM_is_utf8($this->look_graba_cliente_ctacte))
         {
             $this->look_graba_cliente_ctacte = mb_convert_encoding($this->look_graba_cliente_ctacte, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_graba_cliente_ctacte = str_replace('<', '&lt;', $this->look_graba_cliente_ctacte);
          $this->look_graba_cliente_ctacte = str_replace('>', '&gt;', $this->look_graba_cliente_ctacte);
         $this->texto_tag .= "<td>" . $this->look_graba_cliente_ctacte . "</td>\r\n";
   }
   //----- graba_prov_ctacte
   function NM_export_graba_prov_ctacte()
   {
         if (!NM_is_utf8($this->look_graba_prov_ctacte))
         {
             $this->look_graba_prov_ctacte = mb_convert_encoding($this->look_graba_prov_ctacte, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_graba_prov_ctacte = str_replace('<', '&lt;', $this->look_graba_prov_ctacte);
          $this->look_graba_prov_ctacte = str_replace('>', '&gt;', $this->look_graba_prov_ctacte);
         $this->texto_tag .= "<td>" . $this->look_graba_prov_ctacte . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_documentos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - documentos :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_documentos_download.php" target="_blank" style="display: none"> 
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
