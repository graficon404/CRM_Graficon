<?php

class grid_factura_rtf
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
   function grid_factura_rtf()
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
      $this->arquivo   .= "_grid_factura";
      $this->arquivo   .= ".rtf";
      $this->tit_doc    = "grid_factura.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_factura']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_factura']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_factura']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['campos_busca']))
      { 
          $this->numero_fac = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['campos_busca']['numero_fac']; 
          $tmp_pos = strpos($this->numero_fac, "##@@");
          if ($tmp_pos !== false)
          {
              $this->numero_fac = substr($this->numero_fac, 0, $tmp_pos);
          }
          $this->fecha = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['campos_busca']['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false)
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->cliente_id = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['campos_busca']['cliente_id']; 
          $tmp_pos = strpos($this->cliente_id, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cliente_id = substr($this->cliente_id, 0, $tmp_pos);
          }
          $this->vendedor_id = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['campos_busca']['vendedor_id']; 
          $tmp_pos = strpos($this->vendedor_id, "##@@");
          if ($tmp_pos !== false)
          {
              $this->vendedor_id = substr($this->vendedor_id, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['rtf_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['rtf_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Numero_fac, fecha, cliente_id, vendedor_id, forma_pago_id, condicion_vta_id, Remito_nro, Pedido_nro, Subtotal, Descuento, IVA, Total from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT Numero_fac, fecha, cliente_id, vendedor_id, forma_pago_id, condicion_vta_id, Remito_nro, Pedido_nro, Subtotal, Descuento, IVA, Total from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['numero_fac'] = "" . $this->Ini->Nm_lang['lang_factura_fld_Numero_fac'] . "";
      $this->New_label['fecha'] = "" . $this->Ini->Nm_lang['lang_factura_fld_fecha'] . "";
      $this->New_label['cliente_id'] = "" . $this->Ini->Nm_lang['lang_factura_fld_cliente_id'] . "";
      $this->New_label['vendedor_id'] = "" . $this->Ini->Nm_lang['lang_factura_fld_vendedor_id'] . "";
      $this->New_label['forma_pago_id'] = "" . $this->Ini->Nm_lang['lang_factura_fld_forma_pago_id'] . "";
      $this->New_label['condicion_vta_id'] = "" . $this->Ini->Nm_lang['lang_factura_fld_condicion_vta_id'] . "";
      $this->New_label['remito_nro'] = "" . $this->Ini->Nm_lang['lang_factura_fld_Remito_nro'] . "";
      $this->New_label['pedido_nro'] = "" . $this->Ini->Nm_lang['lang_factura_fld_Pedido_nro'] . "";
      $this->New_label['subtotal'] = "" . $this->Ini->Nm_lang['lang_factura_fld_Subtotal'] . "";
      $this->New_label['descuento'] = "" . $this->Ini->Nm_lang['lang_factura_fld_Descuento'] . "";
      $this->New_label['iva'] = "" . $this->Ini->Nm_lang['lang_factura_fld_IVA'] . "";
      $this->New_label['total'] = "" . $this->Ini->Nm_lang['lang_factura_fld_Total'] . "";
      $this->New_label['observaciones'] = "" . $this->Ini->Nm_lang['lang_factura_fld_observaciones'] . "";
      $this->New_label['impresa'] = "" . $this->Ini->Nm_lang['lang_factura_fld_impresa'] . "";

      $this->texto_tag .= "<table>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['numero_fac'])) ? $this->New_label['numero_fac'] : ""; 
          if ($Cada_col == "numero_fac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : ""; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente_id'])) ? $this->New_label['cliente_id'] : ""; 
          if ($Cada_col == "cliente_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vendedor_id'])) ? $this->New_label['vendedor_id'] : ""; 
          if ($Cada_col == "vendedor_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['forma_pago_id'])) ? $this->New_label['forma_pago_id'] : ""; 
          if ($Cada_col == "forma_pago_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['condicion_vta_id'])) ? $this->New_label['condicion_vta_id'] : ""; 
          if ($Cada_col == "condicion_vta_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['remito_nro'])) ? $this->New_label['remito_nro'] : ""; 
          if ($Cada_col == "remito_nro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pedido_nro'])) ? $this->New_label['pedido_nro'] : ""; 
          if ($Cada_col == "pedido_nro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : ""; 
          if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descuento'])) ? $this->New_label['descuento'] : ""; 
          if ($Cada_col == "descuento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iva'])) ? $this->New_label['iva'] : ""; 
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
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : ""; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->numero_fac = $rs->fields[0] ;  
         $this->numero_fac = (string)$this->numero_fac;
         $this->fecha = $rs->fields[1] ;  
         $this->cliente_id = $rs->fields[2] ;  
         $this->cliente_id = (string)$this->cliente_id;
         $this->vendedor_id = $rs->fields[3] ;  
         $this->vendedor_id = (string)$this->vendedor_id;
         $this->forma_pago_id = $rs->fields[4] ;  
         $this->forma_pago_id = (string)$this->forma_pago_id;
         $this->condicion_vta_id = $rs->fields[5] ;  
         $this->condicion_vta_id = (string)$this->condicion_vta_id;
         $this->remito_nro = $rs->fields[6] ;  
         $this->remito_nro = (string)$this->remito_nro;
         $this->pedido_nro = $rs->fields[7] ;  
         $this->pedido_nro = (string)$this->pedido_nro;
         $this->subtotal = $rs->fields[8] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;
         $this->descuento = $rs->fields[9] ;  
         $this->descuento =  str_replace(",", ".", $this->descuento);
         $this->descuento = (strpos(strtolower($this->descuento), "e")) ? (float)$this->descuento : $this->descuento; 
         $this->descuento = (string)$this->descuento;
         $this->iva = $rs->fields[10] ;  
         $this->iva =  str_replace(",", ".", $this->iva);
         $this->iva = (strpos(strtolower($this->iva), "e")) ? (float)$this->iva : $this->iva; 
         $this->iva = (string)$this->iva;
         $this->total = $rs->fields[11] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         //----- lookup - cliente_id
         $this->look_cliente_id = $this->cliente_id; 
         $this->Lookup->lookup_cliente_id($this->look_cliente_id, $this->cliente_id) ; 
         $this->look_cliente_id = ($this->look_cliente_id == "&nbsp;") ? "" : $this->look_cliente_id; 
         //----- lookup - vendedor_id
         $this->look_vendedor_id = $this->vendedor_id; 
         $this->Lookup->lookup_vendedor_id($this->look_vendedor_id, $this->vendedor_id) ; 
         $this->look_vendedor_id = ($this->look_vendedor_id == "&nbsp;") ? "" : $this->look_vendedor_id; 
         //----- lookup - forma_pago_id
         $this->look_forma_pago_id = $this->forma_pago_id; 
         $this->Lookup->lookup_forma_pago_id($this->look_forma_pago_id, $this->forma_pago_id) ; 
         $this->look_forma_pago_id = ($this->look_forma_pago_id == "&nbsp;") ? "" : $this->look_forma_pago_id; 
         //----- lookup - condicion_vta_id
         $this->look_condicion_vta_id = $this->condicion_vta_id; 
         $this->Lookup->lookup_condicion_vta_id($this->look_condicion_vta_id, $this->condicion_vta_id) ; 
         $this->look_condicion_vta_id = ($this->look_condicion_vta_id == "&nbsp;") ? "" : $this->look_condicion_vta_id; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['field_order'] as $Cada_col)
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
   //----- numero_fac
   function NM_export_numero_fac()
   {
         nmgp_Form_Num_Val($this->numero_fac, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->numero_fac))
         {
             $this->numero_fac = mb_convert_encoding($this->numero_fac, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->numero_fac = str_replace('<', '&lt;', $this->numero_fac);
          $this->numero_fac = str_replace('>', '&gt;', $this->numero_fac);
         $this->texto_tag .= "<td>" . $this->numero_fac . "</td>\r\n";
   }
   //----- fecha
   function NM_export_fecha()
   {
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD");
             $this->fecha = $this->nm_data->FormataSaida($this->Nm_date_format("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->fecha))
         {
             $this->fecha = mb_convert_encoding($this->fecha, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->fecha = str_replace('<', '&lt;', $this->fecha);
          $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
   }
   //----- cliente_id
   function NM_export_cliente_id()
   {
         nmgp_Form_Num_Val($this->look_cliente_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_cliente_id))
         {
             $this->look_cliente_id = mb_convert_encoding($this->look_cliente_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_cliente_id = str_replace('<', '&lt;', $this->look_cliente_id);
          $this->look_cliente_id = str_replace('>', '&gt;', $this->look_cliente_id);
         $this->texto_tag .= "<td>" . $this->look_cliente_id . "</td>\r\n";
   }
   //----- vendedor_id
   function NM_export_vendedor_id()
   {
         nmgp_Form_Num_Val($this->look_vendedor_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_vendedor_id))
         {
             $this->look_vendedor_id = mb_convert_encoding($this->look_vendedor_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_vendedor_id = str_replace('<', '&lt;', $this->look_vendedor_id);
          $this->look_vendedor_id = str_replace('>', '&gt;', $this->look_vendedor_id);
         $this->texto_tag .= "<td>" . $this->look_vendedor_id . "</td>\r\n";
   }
   //----- forma_pago_id
   function NM_export_forma_pago_id()
   {
         nmgp_Form_Num_Val($this->look_forma_pago_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_forma_pago_id))
         {
             $this->look_forma_pago_id = mb_convert_encoding($this->look_forma_pago_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_forma_pago_id = str_replace('<', '&lt;', $this->look_forma_pago_id);
          $this->look_forma_pago_id = str_replace('>', '&gt;', $this->look_forma_pago_id);
         $this->texto_tag .= "<td>" . $this->look_forma_pago_id . "</td>\r\n";
   }
   //----- condicion_vta_id
   function NM_export_condicion_vta_id()
   {
         nmgp_Form_Num_Val($this->look_condicion_vta_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_condicion_vta_id))
         {
             $this->look_condicion_vta_id = mb_convert_encoding($this->look_condicion_vta_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->look_condicion_vta_id = str_replace('<', '&lt;', $this->look_condicion_vta_id);
          $this->look_condicion_vta_id = str_replace('>', '&gt;', $this->look_condicion_vta_id);
         $this->texto_tag .= "<td>" . $this->look_condicion_vta_id . "</td>\r\n";
   }
   //----- remito_nro
   function NM_export_remito_nro()
   {
         nmgp_Form_Num_Val($this->remito_nro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->remito_nro))
         {
             $this->remito_nro = mb_convert_encoding($this->remito_nro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->remito_nro = str_replace('<', '&lt;', $this->remito_nro);
          $this->remito_nro = str_replace('>', '&gt;', $this->remito_nro);
         $this->texto_tag .= "<td>" . $this->remito_nro . "</td>\r\n";
   }
   //----- pedido_nro
   function NM_export_pedido_nro()
   {
         nmgp_Form_Num_Val($this->pedido_nro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->pedido_nro))
         {
             $this->pedido_nro = mb_convert_encoding($this->pedido_nro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->pedido_nro = str_replace('<', '&lt;', $this->pedido_nro);
          $this->pedido_nro = str_replace('>', '&gt;', $this->pedido_nro);
         $this->texto_tag .= "<td>" . $this->pedido_nro . "</td>\r\n";
   }
   //----- subtotal
   function NM_export_subtotal()
   {
         nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->subtotal))
         {
             $this->subtotal = mb_convert_encoding($this->subtotal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->subtotal = str_replace('<', '&lt;', $this->subtotal);
          $this->subtotal = str_replace('>', '&gt;', $this->subtotal);
         $this->texto_tag .= "<td>" . $this->subtotal . "</td>\r\n";
   }
   //----- descuento
   function NM_export_descuento()
   {
         nmgp_Form_Num_Val($this->descuento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->descuento))
         {
             $this->descuento = mb_convert_encoding($this->descuento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->descuento = str_replace('<', '&lt;', $this->descuento);
          $this->descuento = str_replace('>', '&gt;', $this->descuento);
         $this->texto_tag .= "<td>" . $this->descuento . "</td>\r\n";
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
   //----- total
   function NM_export_total()
   {
         nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->total))
         {
             $this->total = mb_convert_encoding($this->total, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->total = str_replace('<', '&lt;', $this->total);
          $this->total = str_replace('>', '&gt;', $this->total);
         $this->texto_tag .= "<td>" . $this->total . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_factura']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tbl_factura'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_factura_download.php" target="_blank" style="display: none"> 
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
