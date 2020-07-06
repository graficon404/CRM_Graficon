<?php

class grid_articulos_rtf
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
   function grid_articulos_rtf()
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
      $this->arquivo   .= "_grid_articulos";
      $this->arquivo   .= ".rtf";
      $this->tit_doc    = "grid_articulos.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_articulos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_articulos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_articulos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['campos_busca']))
      { 
          $this->descripcion = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['campos_busca']['descripcion']; 
          $tmp_pos = strpos($this->descripcion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->descripcion = substr($this->descripcion, 0, $tmp_pos);
          }
          $this->id_articulo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['campos_busca']['id_articulo']; 
          $tmp_pos = strpos($this->id_articulo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_articulo = substr($this->id_articulo, 0, $tmp_pos);
          }
          $this->codigo_barra = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['campos_busca']['codigo_barra']; 
          $tmp_pos = strpos($this->codigo_barra, "##@@");
          if ($tmp_pos !== false)
          {
              $this->codigo_barra = substr($this->codigo_barra, 0, $tmp_pos);
          }
          $this->rubro_id = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['campos_busca']['rubro_id']; 
          $tmp_pos = strpos($this->rubro_id, "##@@");
          if ($tmp_pos !== false)
          {
              $this->rubro_id = substr($this->rubro_id, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['rtf_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['rtf_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Codigo_barra, Descripcion, unidad, rubro_id, Costo, Coeficiente_Ctdo, Precio, IVA, Stock, Deposito, Activo, id_articulo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT Codigo_barra, Descripcion, unidad, rubro_id, Costo, Coeficiente_Ctdo, Precio, IVA, Stock, Deposito, Activo, id_articulo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['codigo_barra'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Codigo_barra'] . "";
      $this->New_label['descripcion'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Descripcion'] . "";
      $this->New_label['unidad'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_unidad'] . "";
      $this->New_label['rubro_id'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_rubro_id'] . "";
      $this->New_label['costo'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Costo'] . "";
      $this->New_label['coeficiente_ctdo'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Coeficiente_Ctdo'] . "";
      $this->New_label['precio'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Precio'] . "";
      $this->New_label['stock'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Stock'] . "";
      $this->New_label['deposito'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Deposito'] . "";
      $this->New_label['activo'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Activo'] . "";
      $this->New_label['id_articulo'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_id_articulo'] . "";
      $this->New_label['stock_minimo'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Stock_minimo'] . "";
      $this->New_label['ubicacion'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Ubicacion'] . "";
      $this->New_label['fecha_precio'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Fecha_precio'] . "";
      $this->New_label['lista_precio'] = "" . $this->Ini->Nm_lang['lang_articulos_fld_Lista_precio'] . "";

      $this->texto_tag .= "<table>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['codigo_barra'])) ? $this->New_label['codigo_barra'] : ""; 
          if ($Cada_col == "codigo_barra" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descripcion'])) ? $this->New_label['descripcion'] : ""; 
          if ($Cada_col == "descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unidad'])) ? $this->New_label['unidad'] : ""; 
          if ($Cada_col == "unidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rubro_id'])) ? $this->New_label['rubro_id'] : ""; 
          if ($Cada_col == "rubro_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['costo'])) ? $this->New_label['costo'] : ""; 
          if ($Cada_col == "costo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['coeficiente_ctdo'])) ? $this->New_label['coeficiente_ctdo'] : ""; 
          if ($Cada_col == "coeficiente_ctdo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['precio'])) ? $this->New_label['precio'] : ""; 
          if ($Cada_col == "precio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iva'])) ? $this->New_label['iva'] : "IVA"; 
          if ($Cada_col == "iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['stock'])) ? $this->New_label['stock'] : ""; 
          if ($Cada_col == "stock" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['deposito'])) ? $this->New_label['deposito'] : ""; 
          if ($Cada_col == "deposito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->codigo_barra = $rs->fields[0] ;  
         $this->descripcion = $rs->fields[1] ;  
         $this->unidad = $rs->fields[2] ;  
         $this->rubro_id = $rs->fields[3] ;  
         $this->rubro_id = (string)$this->rubro_id;
         $this->costo = $rs->fields[4] ;  
         $this->costo =  str_replace(",", ".", $this->costo);
         $this->costo = (strpos(strtolower($this->costo), "e")) ? (float)$this->costo : $this->costo; 
         $this->costo = (string)$this->costo;
         $this->coeficiente_ctdo = $rs->fields[5] ;  
         $this->coeficiente_ctdo =  str_replace(",", ".", $this->coeficiente_ctdo);
         $this->coeficiente_ctdo = (strpos(strtolower($this->coeficiente_ctdo), "e")) ? (float)$this->coeficiente_ctdo : $this->coeficiente_ctdo; 
         $this->coeficiente_ctdo = (string)$this->coeficiente_ctdo;
         $this->precio = $rs->fields[6] ;  
         $this->precio =  str_replace(",", ".", $this->precio);
         $this->precio = (strpos(strtolower($this->precio), "e")) ? (float)$this->precio : $this->precio; 
         $this->precio = (string)$this->precio;
         $this->iva = $rs->fields[7] ;  
         $this->iva =  str_replace(",", ".", $this->iva);
         $this->iva = (strpos(strtolower($this->iva), "e")) ? (float)$this->iva : $this->iva; 
         $this->iva = (string)$this->iva;
         $this->stock = $rs->fields[8] ;  
         $this->stock =  str_replace(",", ".", $this->stock);
         $this->stock = (strpos(strtolower($this->stock), "e")) ? (float)$this->stock : $this->stock; 
         $this->stock = (string)$this->stock;
         $this->deposito = $rs->fields[9] ;  
         $this->deposito = (string)$this->deposito;
         $this->activo = $rs->fields[10] ;  
         $this->activo = (string)$this->activo;
         $this->id_articulo = $rs->fields[11] ;  
         $this->id_articulo = (string)$this->id_articulo;
         //----- lookup - rubro_id
         $this->look_rubro_id = $this->rubro_id; 
         $this->Lookup->lookup_rubro_id($this->look_rubro_id, $this->rubro_id) ; 
         $this->look_rubro_id = ($this->look_rubro_id == "&nbsp;") ? "" : $this->look_rubro_id; 
         //----- lookup - deposito
         $this->look_deposito = $this->deposito; 
         $this->Lookup->lookup_deposito($this->look_deposito, $this->deposito) ; 
         $this->look_deposito = ($this->look_deposito == "&nbsp;") ? "" : $this->look_deposito; 
         //----- lookup - activo
         $this->look_activo = $this->activo; 
         $this->Lookup->lookup_activo($this->look_activo); 
         $this->look_activo = ($this->look_activo == "&nbsp;") ? "" : $this->look_activo; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['field_order'] as $Cada_col)
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
   //----- codigo_barra
   function NM_export_codigo_barra()
   {
         if (!NM_is_utf8($this->codigo_barra))
         {
             $this->codigo_barra = mb_convert_encoding($this->codigo_barra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->codigo_barra = str_replace('<', '&lt;', $this->codigo_barra);
          $this->codigo_barra = str_replace('>', '&gt;', $this->codigo_barra);
         $this->texto_tag .= "<td>" . $this->codigo_barra . "</td>\r\n";
   }
   //----- descripcion
   function NM_export_descripcion()
   {
         if (!NM_is_utf8($this->descripcion))
         {
             $this->descripcion = mb_convert_encoding($this->descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->descripcion = str_replace('<', '&lt;', $this->descripcion);
          $this->descripcion = str_replace('>', '&gt;', $this->descripcion);
         $this->texto_tag .= "<td>" . $this->descripcion . "</td>\r\n";
   }
   //----- unidad
   function NM_export_unidad()
   {
         if (!NM_is_utf8($this->unidad))
         {
             $this->unidad = mb_convert_encoding($this->unidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->unidad = str_replace('<', '&lt;', $this->unidad);
          $this->unidad = str_replace('>', '&gt;', $this->unidad);
         $this->texto_tag .= "<td>" . $this->unidad . "</td>\r\n";
   }
   //----- rubro_id
   function NM_export_rubro_id()
   {
         nmgp_Form_Num_Val($this->look_rubro_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_rubro_id))
         {
             $this->look_rubro_id = mb_convert_encoding($this->look_rubro_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_rubro_id = str_replace('<', '&lt;', $this->look_rubro_id);
          $this->look_rubro_id = str_replace('>', '&gt;', $this->look_rubro_id);
         $this->texto_tag .= "<td>" . $this->look_rubro_id . "</td>\r\n";
   }
   //----- costo
   function NM_export_costo()
   {
         nmgp_Form_Num_Val($this->costo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->costo))
         {
             $this->costo = mb_convert_encoding($this->costo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->costo = str_replace('<', '&lt;', $this->costo);
          $this->costo = str_replace('>', '&gt;', $this->costo);
         $this->texto_tag .= "<td>" . $this->costo . "</td>\r\n";
   }
   //----- coeficiente_ctdo
   function NM_export_coeficiente_ctdo()
   {
         nmgp_Form_Num_Val($this->coeficiente_ctdo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->coeficiente_ctdo))
         {
             $this->coeficiente_ctdo = mb_convert_encoding($this->coeficiente_ctdo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->coeficiente_ctdo = str_replace('<', '&lt;', $this->coeficiente_ctdo);
          $this->coeficiente_ctdo = str_replace('>', '&gt;', $this->coeficiente_ctdo);
         $this->texto_tag .= "<td>" . $this->coeficiente_ctdo . "</td>\r\n";
   }
   //----- precio
   function NM_export_precio()
   {
         nmgp_Form_Num_Val($this->precio, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->precio))
         {
             $this->precio = mb_convert_encoding($this->precio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->precio = str_replace('<', '&lt;', $this->precio);
          $this->precio = str_replace('>', '&gt;', $this->precio);
         $this->texto_tag .= "<td>" . $this->precio . "</td>\r\n";
   }
   //----- iva
   function NM_export_iva()
   {
         nmgp_Form_Num_Val($this->iva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->iva))
         {
             $this->iva = mb_convert_encoding($this->iva, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->iva = str_replace('<', '&lt;', $this->iva);
          $this->iva = str_replace('>', '&gt;', $this->iva);
         $this->texto_tag .= "<td>" . $this->iva . "</td>\r\n";
   }
   //----- stock
   function NM_export_stock()
   {
         nmgp_Form_Num_Val($this->stock, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->stock))
         {
             $this->stock = mb_convert_encoding($this->stock, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->stock = str_replace('<', '&lt;', $this->stock);
          $this->stock = str_replace('>', '&gt;', $this->stock);
         $this->texto_tag .= "<td>" . $this->stock . "</td>\r\n";
   }
   //----- deposito
   function NM_export_deposito()
   {
         nmgp_Form_Num_Val($this->look_deposito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_deposito))
         {
             $this->look_deposito = mb_convert_encoding($this->look_deposito, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_deposito = str_replace('<', '&lt;', $this->look_deposito);
          $this->look_deposito = str_replace('>', '&gt;', $this->look_deposito);
         $this->texto_tag .= "<td>" . $this->look_deposito . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_articulos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - articulos :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_articulos_download.php" target="_blank" style="display: none"> 
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

 function Nm_date_format($Type, $Format)
 {
     $Form_base = str_replace("/", "", $Format);
     $Form_base = str_replace("-", "", $Form_base);
     $Form_base = str_replace(":", "", $Form_base);
     $Form_base = str_replace(";", "", $Form_base);
     $Form_base = str_replace(" ", "", $Form_base);
     $Form_base = str_replace("a", "Y", $Form_base);
     $Form_base = str_replace("y", "Y", $Form_base);
     $Form_base = str_replace("h", "H", $Form_base);
     $date_format_show = "";
     if ($Type == "DT" || $Type == "DH")
     {
         $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
         $Str_date = str_replace("y", "Y", $Str_date);
         $Str_date = str_replace("h", "H", $Str_date);
         $Lim   = strlen($Str_date);
         $Ult   = "";
         $Arr_D = array();
         for ($I = 0; $I < $Lim; $I++)
         {
              $Char = substr($Str_date, $I, 1);
              if ($Char != $Ult)
              {
                  $Arr_D[] = $Char;
              }
              $Ult = $Char;
         }
         $Prim = true;
         foreach ($Arr_D as $Cada_d)
         {
             if (strpos($Form_base, $Cada_d) !== false)
             {
                 $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
                 $date_format_show .= $Cada_d;
                 $Prim = false;
             }
         }
     }
     if ($Type == "DH" || $Type == "HH")
     {
         if ($Type == "DH")
         {
             $date_format_show .= " ";
         }
         $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
         $Str_time = str_replace("h", "H", $Str_time);
         $Lim   = strlen($Str_time);
         $Ult   = "";
         $Arr_T = array();
         for ($I = 0; $I < $Lim; $I++)
         {
              $Char = substr($Str_time, $I, 1);
              if ($Char != $Ult)
              {
                  $Arr_T[] = $Char;
              }
              $Ult = $Char;
         }
         $Prim = true;
         foreach ($Arr_T as $Cada_t)
         {
             if (strpos($Form_base, $Cada_t) !== false)
             {
                 $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
                 $date_format_show .= $Cada_t;
                 $Prim = false;
             }
         }
     }
     return $date_format_show;
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
