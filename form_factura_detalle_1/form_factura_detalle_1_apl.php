<?php
//
class form_factura_detalle_1_apl
{
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                               );
   var $Nav_permite_ava = true;
   var $Nav_permite_ret = true;
   var $Apl_com_erro    = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id_fact_detalle_;
   var $factura_nro_;
   var $articulo_id_;
   var $articulo_id__1;
   var $importe_;
   var $cantidad_;
   var $precio_;
   var $unidad_;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_factura_detalle_1 = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = true;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['articulo_id_']))
          {
              $this->articulo_id_ = $this->NM_ajax_info['param']['articulo_id_'];
          }
          if (isset($this->NM_ajax_info['param']['cantidad_']))
          {
              $this->cantidad_ = $this->NM_ajax_info['param']['cantidad_'];
          }
          if (isset($this->NM_ajax_info['param']['id_fact_detalle_']))
          {
              $this->id_fact_detalle_ = $this->NM_ajax_info['param']['id_fact_detalle_'];
          }
          if (isset($this->NM_ajax_info['param']['importe_']))
          {
              $this->importe_ = $this->NM_ajax_info['param']['importe_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['precio_']))
          {
              $this->precio_ = $this->NM_ajax_info['param']['precio_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['unidad_']))
          {
              $this->unidad_ = $this->NM_ajax_info['param']['unidad_'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['id_fact_detalle'] = "id_fact_detalle_";
      $this->sc_conv_var['factura_nro'] = "factura_nro_";
      $this->sc_conv_var['articulo_id'] = "articulo_id_";
      $this->sc_conv_var['importe'] = "importe_";
      $this->sc_conv_var['cantidad'] = "cantidad_";
      $this->sc_conv_var['precio'] = "precio_";
      $this->sc_conv_var['unidad'] = "unidad_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todo = explode("?@?", $nmgp_parms);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_factura_detalle_1($cadapar[1]);
                 $this->$cadapar[0] = $cadapar[1];
                 if ($cadapar[0] == "id_fact_detalle_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "id_fact_detalle = " . $this->id_fact_detalle_;
                     $tem_where_parms        = true;
                 }
                 if ($cadapar[0] == "NM_where_filter")
                 {
                     $tem_where_parms = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          else
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['where_filter_form'] = $this->NM_where_filter_form;
             unset($_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['parms']);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_factura_detalle_1']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_factura_detalle_1_ini(); 
          $this->Ini->init();
      } 
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['articulo_id_'] = '' . $this->Ini->Nm_lang['lang_factura_detalle_fld_articulo_id'] . '';
      $this->nm_new_label['importe_'] = '' . $this->Ini->Nm_lang['lang_factura_detalle_fld_Importe'] . '';
      $this->nm_new_label['cantidad_'] = '' . $this->Ini->Nm_lang['lang_factura_detalle_fld_cantidad'] . '';
      $this->nm_new_label['precio_'] = '' . $this->Ini->Nm_lang['lang_factura_detalle_fld_precio'] . '';
      $this->nm_new_label['unidad_'] = '' . $this->Ini->Nm_lang['lang_factura_detalle_fld_Unidad'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;



      $_SESSION['scriptcase']['error_icon']['form_factura_detalle_1']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_factura_detalle_1'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['goto']);
      }
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['first']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['back']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['forward'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['last']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['qsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['summary'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['navpage'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['goto']    = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['first']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['back']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['forward'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['last']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['qsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['summary'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['navpage'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['goto']    = 'on';
          }
      }

      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
      }
      else
      {
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_factura_detalle_1']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_factura_detalle_1", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      $this->nm_data = new nm_data("es");

      if (is_file($this->Ini->path_aplicacao . 'form_factura_detalle_1_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_factura_detalle_1_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_factura_detalle_1/form_factura_detalle_1_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_factura_detalle_1_erro.class.php"); 
      }
      $this->Erro      = new form_factura_detalle_1_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao']))
         { 
             if ($this->id_fact_detalle_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cantidad_
      $this->field_config['cantidad_']               = array();
      $this->field_config['cantidad_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidad_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidad_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['cantidad_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidad_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- precio_
      $this->field_config['precio_']               = array();
      $this->field_config['precio_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['precio_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['precio_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['precio_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['precio_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- importe_
      $this->field_config['importe_']               = array();
      $this->field_config['importe_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['importe_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['importe_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['importe_']['symbol_mon'] = '';
      $this->field_config['importe_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['importe_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- id_fact_detalle_
      $this->field_config['id_fact_detalle_']               = array();
      $this->field_config['id_fact_detalle_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_fact_detalle_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_fact_detalle_']['symbol_dec'] = '';
      $this->field_config['id_fact_detalle_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_fact_detalle_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- factura_nro_
      $this->field_config['factura_nro_']               = array();
      $this->field_config['factura_nro_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['factura_nro_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['factura_nro_']['symbol_dec'] = '';
      $this->field_config['factura_nro_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['factura_nro_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = form_factura_detalle_1_pack_protect_string(NM_charset_to_utf8($this->New_Line));
         $this->NM_close_db();
         form_factura_detalle_1_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_factura_detalle_1_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->articulo_id_)) { $this->nm_limpa_alfa($this->articulo_id_); }
         if (isset($this->importe_)) { $this->nm_limpa_alfa($this->importe_); }
         if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
         if (isset($this->precio_)) { $this->nm_limpa_alfa($this->precio_); }
         if (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_form'][$sc_seq_vert];
             $this->id_fact_detalle_ = $this->nmgp_dados_form['id_fact_detalle_']; 
             $this->factura_nro_ = $this->nmgp_dados_form['factura_nro_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_factura_detalle_1']) || !is_array($this->NM_ajax_info['errList']['geral_form_factura_detalle_1']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_factura_detalle_1'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_factura_detalle_1'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_factura_detalle_1'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_factura_detalle_1'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         form_factura_detalle_1_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_articulo_id_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'articulo_id_');
          }
          if ('validate_cantidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidad_');
          }
          if ('validate_unidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'unidad_');
          }
          if ('validate_precio_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'precio_');
          }
          if ('validate_importe_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importe_');
          }
          form_factura_detalle_1_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->articulo_id_ = $GLOBALS["articulo_id_" . $sc_seq_vert]; 
         $this->cantidad_ = $GLOBALS["cantidad_" . $sc_seq_vert]; 
         $this->unidad_ = $GLOBALS["unidad_" . $sc_seq_vert]; 
         $this->precio_ = $GLOBALS["precio_" . $sc_seq_vert]; 
         $this->importe_ = $GLOBALS["importe_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_form'][$sc_seq_vert];
             $this->id_fact_detalle_ = $this->nmgp_dados_form['id_fact_detalle_']; 
             $this->factura_nro_ = $this->nmgp_dados_form['factura_nro_']; 
         }
         if (isset($this->articulo_id_)) { $this->nm_limpa_alfa($this->articulo_id_); }
         if (isset($this->importe_)) { $this->nm_limpa_alfa($this->importe_); }
         if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
         if (isset($this->precio_)) { $this->nm_limpa_alfa($this->precio_); }
         if (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['articulo_id_'] =  $this->articulo_id_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['precio_'] =  $this->precio_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['importe_'] =  $this->importe_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['id_fact_detalle_'] =  $this->id_fact_detalle_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['factura_nro_'] =  $this->factura_nro_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && (!$this->NM_ajax_flag || 'event_' != substr($this->NM_ajax_opcao, 0, 6))) 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt || $this->sc_teve_excl) 
          { 
              $this->sc_after_all_update = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_factura_detalle_1_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_factura_detalle_1);
          $this->NM_ajax_info['fldList']['id_fact_detalle_']['keyVal'] = htmlentities($this->nmgp_dados_form['id_fact_detalle_'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
          $this->NM_close_db();
          form_factura_detalle_1_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_articulo_id__onblur' == $this->NM_ajax_opcao)
          {
              $this->articulo_id__onBlur();
          }
          if ('event_cantidad__onblur' == $this->NM_ajax_opcao)
          {
              $this->cantidad__onBlur();
          }
          $this->NM_close_db();
          form_factura_detalle_1_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_factura_detalle_1_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && $this->nmgp_opcao != "menu_link")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'articulo_id_':
               return "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_articulo_id'] . "";
               break;
           case 'cantidad_':
               return "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_cantidad'] . "";
               break;
           case 'unidad_':
               return "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_Unidad'] . "";
               break;
           case 'precio_':
               return "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_precio'] . "";
               break;
           case 'importe_':
               return "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_Importe'] . "";
               break;
           case 'id_fact_detalle_':
               return "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_id_fact_detalle'] . "";
               break;
           case 'factura_nro_':
               return "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_factura_nro'] . "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();
      if ('' == $filtro || 'articulo_id_' == $filtro)
        $this->ValidateField_articulo_id_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cantidad_' == $filtro)
        $this->ValidateField_cantidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'unidad_' == $filtro)
        $this->ValidateField_unidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'precio_' == $filtro)
        $this->ValidateField_precio_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'importe_' == $filtro)
        $this->ValidateField_importe_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_articulo_id_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->articulo_id_ == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['articulo_id_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['articulo_id_'] == "on"))
      {
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_articulo_id'] . "" ; 
          if (!isset($Campos_Erros['articulo_id_']))
          {
              $Campos_Erros['articulo_id_'] = array();
          }
          $Campos_Erros['articulo_id_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['articulo_id_']) || !is_array($this->NM_ajax_info['errList']['articulo_id_']))
          {
              $this->NM_ajax_info['errList']['articulo_id_'] = array();
          }
          $this->NM_ajax_info['errList']['articulo_id_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->articulo_id_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_']) && !in_array($this->articulo_id_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['articulo_id_']))
              {
                  $Campos_Erros['articulo_id_'] = array();
              }
              $Campos_Erros['articulo_id_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['articulo_id_']) || !is_array($this->NM_ajax_info['errList']['articulo_id_']))
              {
                  $this->NM_ajax_info['errList']['articulo_id_'] = array();
              }
              $this->NM_ajax_info['errList']['articulo_id_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
    } // ValidateField_articulo_id_

    function ValidateField_cantidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['cantidad_']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']) ; 
          if ('.' == substr($this->cantidad_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cantidad_, 1)))
              {
                  $this->cantidad_ = '';
              }
              else
              {
                  $this->cantidad_ = '0' . $this->cantidad_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidad_ != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->cantidad_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_cantidad'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidad_']))
                  {
                      $Campos_Erros['cantidad_'] = array();
                  }
                  $Campos_Erros['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidad_, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_cantidad'] . "; " ; 
                  if (!isset($Campos_Erros['cantidad_']))
                  {
                      $Campos_Erros['cantidad_'] = array();
                  }
                  $Campos_Erros['cantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['cantidad_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['cantidad_'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_cantidad'] . "" ; 
              if (!isset($Campos_Erros['cantidad_']))
              {
                  $Campos_Erros['cantidad_'] = array();
              }
              $Campos_Erros['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_cantidad_

    function ValidateField_unidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['unidad_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['unidad_'] == "on")) 
      { 
          if ($this->unidad_ == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_Unidad'] . "" ; 
              if (!isset($Campos_Erros['unidad_']))
              {
                  $Campos_Erros['unidad_'] = array();
              }
              $Campos_Erros['unidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['unidad_']) || !is_array($this->NM_ajax_info['errList']['unidad_']))
                  {
                      $this->NM_ajax_info['errList']['unidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['unidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->unidad_) > 4) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_Unidad'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['unidad_']))
              {
                  $Campos_Erros['unidad_'] = array();
              }
              $Campos_Erros['unidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['unidad_']) || !is_array($this->NM_ajax_info['errList']['unidad_']))
              {
                  $this->NM_ajax_info['errList']['unidad_'] = array();
              }
              $this->NM_ajax_info['errList']['unidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_unidad_

    function ValidateField_precio_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['precio_']['symbol_dec']))
      {
          nm_limpa_valor($this->precio_, $this->field_config['precio_']['symbol_dec'], $this->field_config['precio_']['symbol_grp']) ; 
          if ('.' == substr($this->precio_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->precio_, 1)))
              {
                  $this->precio_ = '';
              }
              else
              {
                  $this->precio_ = '0' . $this->precio_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->precio_ != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->precio_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_precio'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['precio_']))
                  {
                      $Campos_Erros['precio_'] = array();
                  }
                  $Campos_Erros['precio_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['precio_']) || !is_array($this->NM_ajax_info['errList']['precio_']))
                  {
                      $this->NM_ajax_info['errList']['precio_'] = array();
                  }
                  $this->NM_ajax_info['errList']['precio_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->precio_, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_precio'] . "; " ; 
                  if (!isset($Campos_Erros['precio_']))
                  {
                      $Campos_Erros['precio_'] = array();
                  }
                  $Campos_Erros['precio_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['precio_']) || !is_array($this->NM_ajax_info['errList']['precio_']))
                  {
                      $this->NM_ajax_info['errList']['precio_'] = array();
                  }
                  $this->NM_ajax_info['errList']['precio_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['precio_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['precio_'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_precio'] . "" ; 
              if (!isset($Campos_Erros['precio_']))
              {
                  $Campos_Erros['precio_'] = array();
              }
              $Campos_Erros['precio_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['precio_']) || !is_array($this->NM_ajax_info['errList']['precio_']))
                  {
                      $this->NM_ajax_info['errList']['precio_'] = array();
                  }
                  $this->NM_ajax_info['errList']['precio_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_precio_

    function ValidateField_importe_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->field_config['importe_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->importe_, $this->field_config['importe_']['symbol_dec'], $this->field_config['importe_']['symbol_grp'], $this->field_config['importe_']['symbol_mon']); 
          nm_limpa_valor($this->importe_, $this->field_config['importe_']['symbol_dec'], $this->field_config['importe_']['symbol_grp']) ; 
          if ('.' == substr($this->importe_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importe_, 1)))
              {
                  $this->importe_ = '';
              }
              else
              {
                  $this->importe_ = '0' . $this->importe_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->importe_ != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->importe_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_Importe'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importe_']))
                  {
                      $Campos_Erros['importe_'] = array();
                  }
                  $Campos_Erros['importe_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importe_']) || !is_array($this->NM_ajax_info['errList']['importe_']))
                  {
                      $this->NM_ajax_info['errList']['importe_'] = array();
                  }
                  $this->NM_ajax_info['errList']['importe_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importe_, 4, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_Importe'] . "; " ; 
                  if (!isset($Campos_Erros['importe_']))
                  {
                      $Campos_Erros['importe_'] = array();
                  }
                  $Campos_Erros['importe_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importe_']) || !is_array($this->NM_ajax_info['errList']['importe_']))
                  {
                      $this->NM_ajax_info['errList']['importe_'] = array();
                  }
                  $this->NM_ajax_info['errList']['importe_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['importe_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['php_cmp_required']['importe_'] == "on") 
           { 
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_factura_detalle_fld_Importe'] . "" ; 
              if (!isset($Campos_Erros['importe_']))
              {
                  $Campos_Erros['importe_'] = array();
              }
              $Campos_Erros['importe_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importe_']) || !is_array($this->NM_ajax_info['errList']['importe_']))
                  {
                      $this->NM_ajax_info['errList']['importe_'] = array();
                  }
                  $this->NM_ajax_info['errList']['importe_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_importe_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['articulo_id_'] = $this->articulo_id_;
    $this->nmgp_dados_form['cantidad_'] = $this->cantidad_;
    $this->nmgp_dados_form['unidad_'] = $this->unidad_;
    $this->nmgp_dados_form['precio_'] = $this->precio_;
    $this->nmgp_dados_form['importe_'] = $this->importe_;
    $this->nmgp_dados_form['id_fact_detalle_'] = $this->id_fact_detalle_;
    $this->nmgp_dados_form['factura_nro_'] = $this->factura_nro_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      if (!empty($this->field_config['cantidad_']['symbol_dec']))
      {
         nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']);
      }
      if (!empty($this->field_config['precio_']['symbol_dec']))
      {
         nm_limpa_valor($this->precio_, $this->field_config['precio_']['symbol_dec'], $this->field_config['precio_']['symbol_grp']);
      }
      if (!empty($this->field_config['importe_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->importe_, $this->field_config['importe_']['symbol_dec'], $this->field_config['importe_']['symbol_grp'], $this->field_config['importe_']['symbol_mon']);
         nm_limpa_valor($this->importe_, $this->field_config['importe_']['symbol_dec'], $this->field_config['importe_']['symbol_grp']);
      }
      nm_limpa_numero($this->id_fact_detalle_, $this->field_config['id_fact_detalle_']['symbol_grp']) ; 
      nm_limpa_numero($this->factura_nro_, $this->field_config['factura_nro_']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "cantidad_")
      {
          if (!empty($this->field_config['cantidad_']['symbol_dec']))
          {
             nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "precio_")
      {
          if (!empty($this->field_config['precio_']['symbol_dec']))
          {
             nm_limpa_valor($this->precio_, $this->field_config['precio_']['symbol_dec'], $this->field_config['precio_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importe_")
      {
          if (!empty($this->field_config['importe_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->importe_, $this->field_config['importe_']['symbol_dec'], $this->field_config['importe_']['symbol_grp'], $this->field_config['importe_']['symbol_mon']);
             nm_limpa_valor($this->importe_, $this->field_config['importe_']['symbol_dec'], $this->field_config['importe_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "id_fact_detalle_")
      {
          nm_limpa_numero($this->id_fact_detalle_, $this->field_config['id_fact_detalle_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "factura_nro_")
      {
          nm_limpa_numero($this->factura_nro_, $this->field_config['factura_nro_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if (!empty($this->cantidad_) || (!empty($format_fields) && isset($format_fields['cantidad_'])))
      {
          nmgp_Form_Num_Val($this->cantidad_, $this->field_config['cantidad_']['symbol_grp'], $this->field_config['cantidad_']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['cantidad_']['symbol_fmt']) ; 
      }
      if (!empty($this->precio_) || (!empty($format_fields) && isset($format_fields['precio_'])))
      {
          nmgp_Form_Num_Val($this->precio_, $this->field_config['precio_']['symbol_grp'], $this->field_config['precio_']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['precio_']['symbol_fmt']) ; 
      }
      if (!empty($this->importe_) || (!empty($format_fields) && isset($format_fields['importe_'])))
      {
          nmgp_Form_Num_Val($this->importe_, $this->field_config['importe_']['symbol_grp'], $this->field_config['importe_']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['importe_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['importe_']['symbol_mon'];
          $this->sc_add_currency($this->importe_, $sMonSymb, $this->field_config['importe_']['format_pos']); 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_fact_detalle_']['keyVal'] = form_factura_detalle_1_pack_protect_string($this->nmgp_dados_form['id_fact_detalle_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_factura_detalle_1[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {
                  if (isset($this->NM_ajax_changed['articulo_id_']) && $this->NM_ajax_changed['articulo_id_'])
                  {
                      $this->form_vert_form_factura_detalle_1[$this->nmgp_refresh_row]['articulo_id_'] = $this->articulo_id_;
                  }
                  if (isset($this->NM_ajax_changed['cantidad_']) && $this->NM_ajax_changed['cantidad_'])
                  {
                      $this->form_vert_form_factura_detalle_1[$this->nmgp_refresh_row]['cantidad_'] = $this->cantidad_;
                  }
                  if (isset($this->NM_ajax_changed['unidad_']) && $this->NM_ajax_changed['unidad_'])
                  {
                      $this->form_vert_form_factura_detalle_1[$this->nmgp_refresh_row]['unidad_'] = $this->unidad_;
                  }
                  if (isset($this->NM_ajax_changed['precio_']) && $this->NM_ajax_changed['precio_'])
                  {
                      $this->form_vert_form_factura_detalle_1[$this->nmgp_refresh_row]['precio_'] = $this->precio_;
                  }
                  if (isset($this->NM_ajax_changed['importe_']) && $this->NM_ajax_changed['importe_'])
                  {
                      $this->form_vert_form_factura_detalle_1[$this->nmgp_refresh_row]['importe_'] = $this->importe_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_factura_detalle_1[$this->nmgp_refresh_row]['unidad_'] = $this->unidad_;
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_factura_detalle_1);
          foreach($this->form_vert_form_factura_detalle_1 as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("articulo_id_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['articulo_id_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_precio_ = $this->precio_;
   $old_value_importe_ = $this->importe_;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_precio_ = $this->precio_;
   $unformatted_value_importe_ = $this->importe_;

   $nm_comando = "SELECT id_articulo, Descripcion 
FROM articulos 
ORDER BY Descripcion";

   $this->cantidad_ = $old_value_cantidad_;
   $this->precio_ = $old_value_precio_;
   $this->importe_ = $old_value_importe_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_factura_detalle_1_pack_protect_string($rs->fields[0]) => form_factura_detalle_1_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"articulo_id_\"";
          if (isset($this->NM_ajax_info['select_html']['articulo_id_']) && !empty($this->NM_ajax_info['select_html']['articulo_id_']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['articulo_id_'] . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['articulo_id_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['articulo_id_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['articulo_id_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['articulo_id_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cantidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cantidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("unidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['unidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['unidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("precio_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['precio_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['precio_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importe_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['importe_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['importe_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
          }
   }

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->cantidad_ = str_replace($sc_parm1, $sc_parm2, $this->cantidad_); 
      $this->precio_ = str_replace($sc_parm1, $sc_parm2, $this->precio_); 
      $this->importe_ = str_replace($sc_parm1, $sc_parm2, $this->importe_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cantidad_ = "'" . $this->cantidad_ . "'";
      $this->precio_ = "'" . $this->precio_ . "'";
      $this->importe_ = "'" . $this->importe_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cantidad_ = str_replace("'", "", $this->cantidad_); 
      $this->precio_ = str_replace("'", "", $this->precio_); 
      $this->importe_ = str_replace("'", "", $this->importe_); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $SC_tem_cmp_update = true; 
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['articulo_id_'] == $this->articulo_id_ &&
              $this->nmgp_dados_select['cantidad_'] == $this->cantidad_ &&
              $this->nmgp_dados_select['unidad_'] == $this->unidad_ &&
              $this->nmgp_dados_select['precio_'] == $this->precio_ &&
              $this->nmgp_dados_select['importe_'] == $this->importe_)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['articulo_id_'] = $this->articulo_id_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['cantidad_'] = $this->cantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['unidad_'] = $this->unidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['precio_'] = $this->precio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['importe_'] = $this->importe_;
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['articulo_id_'] = $this->articulo_id_;
      $NM_val_form['cantidad_'] = $this->cantidad_;
      $NM_val_form['unidad_'] = $this->unidad_;
      $NM_val_form['precio_'] = $this->precio_;
      $NM_val_form['importe_'] = $this->importe_;
      $NM_val_form['id_fact_detalle_'] = $this->id_fact_detalle_;
      $NM_val_form['factura_nro_'] = $this->factura_nro_;
      if ($this->id_fact_detalle_ == "")  
      { 
          $this->id_fact_detalle_ = 0;
      } 
      if ($this->factura_nro_ == "")  
      { 
          $this->factura_nro_ = 0;
          $this->sc_force_zero[] = 'factura_nro_';
      } 
      if ($this->articulo_id_ == "")  
      { 
          $this->articulo_id_ = 0;
          $this->sc_force_zero[] = 'articulo_id_';
      } 
      if ($this->importe_ == "")  
      { 
          $this->importe_ = 0;
          $this->sc_force_zero[] = 'importe_';
      } 
      if ($this->cantidad_ == "")  
      { 
          $this->cantidad_ = 0;
          $this->sc_force_zero[] = 'cantidad_';
      } 
      if ($this->precio_ == "")  
      { 
          $this->precio_ = 0;
          $this->sc_force_zero[] = 'precio_';
      } 
      $nm_bases_lob_geral = array();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->unidad_ = substr($this->Db->qstr($this->unidad_), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_fact_detalle = $this->id_fact_detalle_ ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_fact_detalle = $this->id_fact_detalle_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_factura_detalle_1_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              $comando = "UPDATE " . $this->Ini->nm_tabela . " SET articulo_id = $this->articulo_id_, Importe = $this->importe_, cantidad = $this->cantidad_, precio = $this->precio_, Unidad = '$this->unidad_'";  
              if (isset($NM_val_form['factura_nro_']) && $NM_val_form['factura_nro_'] != $this->nmgp_dados_select['factura_nro_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " factura_nro = $this->factura_nro_"; 
                  $comando_oracle        .= " factura_nro = $this->factura_nro_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE id_fact_detalle = $this->id_fact_detalle_ ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_factura_detalle_1_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['articulo_id_'])) { $this->articulo_id_ = $NM_val_form['articulo_id_']; }
              elseif (isset($this->articulo_id_)) { $this->nm_limpa_alfa($this->articulo_id_); }
              if     (isset($NM_val_form) && isset($NM_val_form['importe_'])) { $this->importe_ = $NM_val_form['importe_']; }
              elseif (isset($this->importe_)) { $this->nm_limpa_alfa($this->importe_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidad_'])) { $this->cantidad_ = $NM_val_form['cantidad_']; }
              elseif (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['precio_'])) { $this->precio_ = $NM_val_form['precio_']; }
              elseif (isset($this->precio_)) { $this->nm_limpa_alfa($this->precio_); }
              if     (isset($NM_val_form) && isset($NM_val_form['unidad_'])) { $this->unidad_ = $NM_val_form['unidad_']; }
              elseif (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array('articulo_id_', 'cantidad_', 'unidad_', 'precio_', 'importe_');
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['articulo_id_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['precio_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['importe_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id_fact_detalle, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "factura_nro, articulo_id, Importe, cantidad, precio, Unidad) VALUES (" . $NM_seq_auto . "$this->factura_nro_, $this->articulo_id_, $this->importe_, $this->cantidad_, $this->precio_, '$this->unidad_')"; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_factura_detalle_1_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_fact_detalle_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_fact_detalle_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_I_E']++; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['articulo_id_'] = $this->articulo_id_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['cantidad_'] = $this->cantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['unidad_'] = $this->unidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['precio_'] = $this->precio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert]['importe_'] = $this->importe_;
              if (!empty($this->sc_force_zero))
              {
                  foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
                  {
                      eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
                  }
              }
              $this->sc_force_zero = array();
              if (!empty($NM_val_null))
              {
                  foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
                  {
                      eval('$this->' . $sc_val_null_field . ' = "";');
                  }
              }
              if (isset($this->articulo_id_)) { $this->nm_limpa_alfa($this->articulo_id_); }
              if (isset($this->importe_)) { $this->nm_limpa_alfa($this->importe_); }
              if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
              if (isset($this->precio_)) { $this->nm_limpa_alfa($this->precio_); }
              if (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_precio_ = $this->precio_;
   $old_value_importe_ = $this->importe_;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_precio_ = $this->precio_;
   $unformatted_value_importe_ = $this->importe_;

   $nm_comando = "SELECT id_articulo, Descripcion 
FROM articulos 
ORDER BY Descripcion";

   $this->cantidad_ = $old_value_cantidad_;
   $this->precio_ = $old_value_precio_;
   $this->importe_ = $old_value_importe_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_factura_detalle_1_pack_protect_string($rs->fields[0]) => form_factura_detalle_1_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['Lookup_articulo_id_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->articulo_id_)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_articulo_id_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['articulo_id_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['articulo_id_' . $this->nmgp_refresh_row]['valList'] = array($this->articulo_id_);
                  $this->NM_ajax_info['fldList']['articulo_id_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_articulo_id_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['articulo_id_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['articulo_id_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['articulo_id_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['articulo_id_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->cantidad_);
                  $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_cantidad_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['valList'] = array($this->unidad_);
                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_unidad_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['precio_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['precio_' . $this->nmgp_refresh_row]['valList'] = array($this->precio_);
                  $this->NM_ajax_info['fldList']['precio_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_precio_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['precio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['precio_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['precio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['precio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['importe_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['importe_' . $this->nmgp_refresh_row]['valList'] = array($this->importe_);
                  $this->NM_ajax_info['fldList']['importe_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_importe_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['importe_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['importe_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['importe_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['importe_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['id_fact_detalle_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['id_fact_detalle_' . $this->nmgp_refresh_row]['valList'] = array($this->id_fact_detalle_);
                  $this->NM_ajax_info['fldList']['id_fact_detalle_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_fact_detalle_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_fact_detalle_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_fact_detalle_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_fact_detalle_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_fact_detalle_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_fact_detalle_ = substr($this->Db->qstr($this->id_fact_detalle_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_fact_detalle = $this->id_fact_detalle_"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_fact_detalle = $this->id_fact_detalle_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_fact_detalle = $this->id_fact_detalle_ "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_fact_detalle = $this->id_fact_detalle_ "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_factura_detalle_1_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_I_E']--; 
              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'on';
         CalculaSubtotal();
$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['parms'] = "id_fact_detalle_?#?$this->id_fact_detalle_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_fact_detalle_ = substr($this->Db->qstr($this->id_fact_detalle_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_factura_detalle_1']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['embutida_liga_qtd_reg'];
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_factura_detalle_1 = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['parms'] = ""; 
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          if ('' == $sc_where)
          {
              $sc_where = " where (";
          }
          else
          {
              $sc_where .= " and (";
          }
          $sc_where .= "id_fact_detalle_ = " . $this->id_fact_detalle_;
          $sc_where .= ")";
      }
      if ('total' != $this->form_paginacao)
      {
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_factura_detalle_1 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total'] = $qt_geral_reg_form_factura_detalle_1;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = 0; 
          } 
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_fact_detalle_))
          {
              $Key_Where = "id_fact_detalle < $this->id_fact_detalle_ "; 
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_factura_detalle_1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_factura_detalle_1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] > $qt_geral_reg_form_factura_detalle_1)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = $qt_geral_reg_form_factura_detalle_1 - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = ($qt_geral_reg_form_factura_detalle_1 + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_I_E'] = 0; 
      }
      $sc_order_by = "";
      $sc_order_by = "id_fact_detalle";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem") 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['ordem_ord']; 
      } 
      $nmgp_select = "SELECT id_fact_detalle, factura_nro, articulo_id, Importe, cantidad, precio, Unidad from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start']) ;  
                  } 
              } 
          } 
      }
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_fact_detalle_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_fact_detalle_'] = $this->id_fact_detalle_;
              $this->factura_nro_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['factura_nro_'] = $this->factura_nro_;
              $this->articulo_id_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['articulo_id_'] = $this->articulo_id_;
              $this->importe_ = trim($rs->fields[3]) ; 
              $this->nmgp_dados_select['importe_'] = $this->importe_;
              $this->cantidad_ = trim($rs->fields[4]) ; 
              $this->nmgp_dados_select['cantidad_'] = $this->cantidad_;
              $this->precio_ = trim($rs->fields[5]) ; 
              $this->nmgp_dados_select['precio_'] = $this->precio_;
              $this->unidad_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['unidad_'] = $this->unidad_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_fact_detalle_ = (string)$this->id_fact_detalle_; 
              $this->factura_nro_ = (string)$this->factura_nro_; 
              $this->articulo_id_ = (string)$this->articulo_id_; 
              $this->importe_ = (strpos(strtolower($this->importe_), "e")) ? (float)$this->importe_ : $this->importe_; 
              $this->importe_ = (string)$this->importe_; 
              $this->cantidad_ = (strpos(strtolower($this->cantidad_), "e")) ? (float)$this->cantidad_ : $this->cantidad_; 
              $this->cantidad_ = (string)$this->cantidad_; 
              $this->precio_ = (strpos(strtolower($this->precio_), "e")) ? (float)$this->precio_ : $this->precio_; 
              $this->precio_ = (string)$this->precio_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['parms'] = "id_fact_detalle_?#?$this->id_fact_detalle_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['articulo_id_'] =  $this->articulo_id_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['precio_'] =  $this->precio_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['importe_'] =  $this->importe_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['id_fact_detalle_'] =  $this->id_fact_detalle_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['factura_nro_'] =  $this->factura_nro_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_form_factura_detalle_1); 
          $rs->Close(); 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['reg_start'] < (($qt_geral_reg_form_factura_detalle_1 + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->articulo_id_ = "";  
              $this->importe_ = "";  
              $this->cantidad_ = "";  
              $this->precio_ = "";  
              $this->unidad_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['articulo_id_'] =  $this->articulo_id_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['precio_'] =  $this->precio_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['importe_'] =  $this->importe_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['id_fact_detalle_'] =  $this->id_fact_detalle_; 
             $this->form_vert_form_factura_detalle_1[$sc_seq_vert]['factura_nro_'] =  $this->factura_nro_; 
              $sc_seq_vert++; 
          } 
      }  
  }
//
function Importe()
{
$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'on';
         

$this->importe_ =($this->precio_ *$this->cantidad_ );
	


$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'off';
}
function SC_function_0()
{
$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'on';
         



$check_sql = "SELECT unidad, precio"
   . " FROM articulos"
   . " WHERE id_articulo = '" . $this->articulo_id_  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->unidad_  = $this->rs[0][0];
    $this->precio_  = $this->rs[0][1];
}
		else     
{
		    $this->unidad_  = '';
    $this->precio_  = 0;
}
$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'off';
}
function articulo_id__onBlur()
{
$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'on';
         
$original_articulo_id_ = $this->articulo_id_;
$original_unidad_ = $this->unidad_;
$original_precio_ = $this->precio_;


$modificado_articulo_id_ = $this->articulo_id_;
$modificado_unidad_ = $this->unidad_;
$modificado_precio_ = $this->precio_;
$this->nm_formatar_campos('articulo_id_', 'unidad_', 'precio_');
if ($original_articulo_id_ != $modificado_articulo_id_ || (isset($bFlagRead_articulo_id_) && $bFlagRead_articulo_id_))
{
    $this->NM_ajax_info['fldList']['articulo_id_' . $this->nmgp_refresh_row]['type']    = 'select';
    $this->NM_ajax_info['fldList']['articulo_id_' . $this->nmgp_refresh_row]['valList'] = array(NM_charset_to_utf8($this->articulo_id_));
    $this->NM_ajax_changed['articulo_id_'] = true;
}
if ($original_unidad_ != $modificado_unidad_ || (isset($bFlagRead_unidad_) && $bFlagRead_unidad_))
{
    $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['type']    = 'label';
    $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['valList'] = array(NM_charset_to_utf8($this->unidad_));
    $this->NM_ajax_changed['unidad_'] = true;
}
if ($original_precio_ != $modificado_precio_ || (isset($bFlagRead_precio_) && $bFlagRead_precio_))
{
    $this->NM_ajax_info['fldList']['precio_' . $this->nmgp_refresh_row]['type']    = 'label';
    $this->NM_ajax_info['fldList']['precio_' . $this->nmgp_refresh_row]['valList'] = array(NM_charset_to_utf8($this->precio_));
    $this->NM_ajax_changed['precio_'] = true;
}
form_factura_detalle_1_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'off';
}
function cantidad__onBlur()
{
$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'on';
         
$original_importe_ = $this->importe_;
$original_precio_ = $this->precio_;
$original_cantidad_ = $this->cantidad_;


$modificado_importe_ = $this->importe_;
$modificado_precio_ = $this->precio_;
$modificado_cantidad_ = $this->cantidad_;
$this->nm_formatar_campos('importe_', 'precio_', 'cantidad_');
if ($original_importe_ != $modificado_importe_ || (isset($bFlagRead_importe_) && $bFlagRead_importe_))
{
    $this->NM_ajax_info['fldList']['importe_' . $this->nmgp_refresh_row]['type']    = 'label';
    $this->NM_ajax_info['fldList']['importe_' . $this->nmgp_refresh_row]['valList'] = array(NM_charset_to_utf8($this->importe_));
    $this->NM_ajax_changed['importe_'] = true;
}
if ($original_precio_ != $modificado_precio_ || (isset($bFlagRead_precio_) && $bFlagRead_precio_))
{
    $this->NM_ajax_info['fldList']['precio_' . $this->nmgp_refresh_row]['type']    = 'label';
    $this->NM_ajax_info['fldList']['precio_' . $this->nmgp_refresh_row]['valList'] = array(NM_charset_to_utf8($this->precio_));
    $this->NM_ajax_changed['precio_'] = true;
}
if ($original_cantidad_ != $modificado_cantidad_ || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
    $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array(NM_charset_to_utf8($this->cantidad_));
    $this->NM_ajax_changed['cantidad_'] = true;
}
form_factura_detalle_1_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_factura_detalle_1']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_factura_detalle_1_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_detal'];
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_articulo_id_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "articulo_id", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cantidad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Unidad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "precio", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Importe", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $sc_where = " where " . $comando;
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
     $qt_geral_reg_form_factura_detalle_1 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['total'] = $qt_geral_reg_form_factura_detalle_1;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['fast_search'][2] = $sv_data;
      $rt->Close(); 
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_numeric = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id_fact_detalle";$nm_numeric[] = "factura_nro";$nm_numeric[] = "articulo_id";$nm_numeric[] = "importe";$nm_numeric[] = "cantidad";$nm_numeric[] = "precio";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['decimal_db'] == ".")
         {
             $nm_aspas = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cmd     = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $comando        .= $NM_cmd;
                   }
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
               }
            break;
            case "NP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cmd     = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "year($nome) <> " . $this->NM_data_qp['ano'];
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "month($nome) <> " . $this->NM_data_qp['mes'];
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "day($nome) <> " . $this->NM_data_qp['dia'];
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $comando        .= $NM_cmd;
                   }
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
               }
            break;
            case "DF":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF")
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
               }
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
            break;
         }
   }
   function SC_lookup_articulo_id_($condicao, $campo)
   {
       $result = array();
       $nm_comando = "SELECT Descripcion, id_articulo FROM articulos WHERE (Descripcion LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_factura_detalle_1_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['opc_ant']);
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_factura_detalle_1_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo NM_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_factura_detalle_1']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>