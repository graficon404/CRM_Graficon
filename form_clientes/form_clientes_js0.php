<form name="F2" method=post 
               action="./" 
               target="_self"> 
<input type=hidden name="id_cliente" value="<?php echo NM_encode_input($this->nmgp_dados_form['id_cliente']); ?>">
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="master_nav" value="off">
<input type=hidden name="sc_ifr_height" value="">
<input type="hidden" name="nmgp_parms" value=""/>
<input type="hidden" name="nmgp_ordem" value=""/>
<input type="hidden" name="nmgp_clone" value=""/>
<input type="hidden" name="nmgp_fast_search" value=""/>
<input type="hidden" name="nmgp_cond_fast_search" value=""/>
<input type="hidden" name="nmgp_arg_fast_search" value=""/>
<input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
</form> 
<form name="F5" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="nmgp_opcao" value="<?php if ($this->nm_Start_new) {echo "ini";} elseif ($this->sc_insert_on) {echo "final";} else {echo "igual";}?>"/>
  <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes']['parms']); ?>"/>
  <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
</form> 
<form name="F6" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
</form> 
<div id="id_div_process" style="display: none; margin: 10px; whitespace: nowrap" class="scFormProcessFixed"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_fatal_error" class="scFormLabelOdd" style="display: none; position: absolute"></div>
<script type="text/javascript"> 
 NM_tp_critica(1);

function scInlineFormSend()
{
  return false;
}

function NM_critica (form, campo, label, mask, tipo, intr, dec, min, max)
{
    this.form = form;
    this.campo = campo;
    this.label = label;
    this.mask = mask;
    this.tipo = tipo;
    this.intr = intr;
    this.dec = dec;
    this.min = min;
    this.max = max;
}
 NM_tab_crit = new NM_critica(17);
 NM_tab_crit[1] = new NM_critica('F1', 'cuit', 'cuit', 'naomask', 'lista', 'cxab', 14, 'TUDO');
 NM_tab_crit[2] = new NM_critica('F1', 'razon_social', 'razon_social', 'naomask', 'lista', 'cxab', 66, 'TUDO');
 NM_tab_crit[3] = new NM_critica('F1', 'titular', 'titular', 'naomask', 'lista', 'cxab', 59, 'TUDO');
 NM_tab_crit[4] = new NM_critica('F1', 'domicilio', 'domicilio', 'naomask', 'lista', 'cxab', 40, 'TUDO');
 NM_tab_crit[5] = new NM_critica('F1', 'codigo_postal', 'codigo_postal', 'naomask', 'lista', 'cxab', 8, 'TUDO');
 NM_tab_crit[6] = new NM_critica('F1', 'localidad', 'localidad', 'naomask', 'lista', 'cxab', 36, 'TUDO');
 NM_tab_crit[7] = new NM_critica('F1', 'provincia', 'provincia', 'naomask', 'lista', 'cxab', 19, 'TUDO');
 NM_tab_crit[8] = new NM_critica('F1', 'telefonos', 'telefonos', 'naomask', 'lista', 'cxab', 20, 'TUDO');
 NM_tab_crit[9] = new NM_critica('F1', 'fax', 'fax', 'naomask', 'lista', 'cxab', 14, 'TUDO');
 NM_tab_crit[10] = new NM_critica('F1', 'e_mail', 'e_mail', 'naomask', 'lista', 'cxab', 26, 'TUDO');
 NM_tab_crit[11] = new NM_critica('F1', 'contacto', 'contacto', 'naomask', 'lista', 'cxab', 39, 'TUDO');
 NM_tab_crit[12] = new NM_critica('F1', 'ing_bruto', 'ing_bruto', 'naomask', 'lista', 'cxab', 18, 'TUDO');
 NM_tab_crit[13] = new NM_critica('F1', 'inicio_actividad', 'inicio_actividad', 'naomask', 'lista', 'cxab', 10, 'TUDO');
 NM_tab_crit[14] = new NM_critica('F1', 'cpa', 'cpa', 'naomask', 'lista', 'cxab', 30, 'TUDO');
 NM_tab_crit[15] = new NM_critica('F1', 'observaciones', 'observaciones', 'naomask', 'lista', 'cxab', 42, 'TUDO');
 NM_tab_crit[16] = new NM_critica('F1', 'saldo', 'saldo', 'naomask', 'valor', 4, 2, -0, 999999, '<?php echo str_replace("'", "\'", $this->field_config['saldo']['symbol_grp']); ?>', '<?php echo str_replace("'", "\'", $this->field_config['saldo']['symbol_dec']); ?>');
 NM_tab_crit[17] = new NM_critica('NM_final');
 NM_tab_crit_1 = new NM_critica(17);
 NM_tab_crit_1[1] = new NM_critica('F1', 'cuit', 'cuit', 'naomask', 'lista', 'cxab', 14, 'TUDO');
 NM_tab_crit_1[2] = new NM_critica('F1', 'razon_social', 'razon_social', 'naomask', 'lista', 'cxab', 66, 'TUDO');
 NM_tab_crit_1[3] = new NM_critica('F1', 'titular', 'titular', 'naomask', 'lista', 'cxab', 59, 'TUDO');
 NM_tab_crit_1[4] = new NM_critica('F1', 'domicilio', 'domicilio', 'naomask', 'lista', 'cxab', 40, 'TUDO');
 NM_tab_crit_1[5] = new NM_critica('F1', 'codigo_postal', 'codigo_postal', 'naomask', 'lista', 'cxab', 8, 'TUDO');
 NM_tab_crit_1[6] = new NM_critica('F1', 'localidad', 'localidad', 'naomask', 'lista', 'cxab', 36, 'TUDO');
 NM_tab_crit_1[7] = new NM_critica('F1', 'provincia', 'provincia', 'naomask', 'lista', 'cxab', 19, 'TUDO');
 NM_tab_crit_1[8] = new NM_critica('F1', 'telefonos', 'telefonos', 'naomask', 'lista', 'cxab', 20, 'TUDO');
 NM_tab_crit_1[9] = new NM_critica('F1', 'fax', 'fax', 'naomask', 'lista', 'cxab', 14, 'TUDO');
 NM_tab_crit_1[10] = new NM_critica('F1', 'e_mail', 'e_mail', 'naomask', 'lista', 'cxab', 26, 'TUDO');
 NM_tab_crit_1[11] = new NM_critica('F1', 'contacto', 'contacto', 'naomask', 'lista', 'cxab', 39, 'TUDO');
 NM_tab_crit_1[12] = new NM_critica('F1', 'ing_bruto', 'ing_bruto', 'naomask', 'lista', 'cxab', 18, 'TUDO');
 NM_tab_crit_1[13] = new NM_critica('F1', 'inicio_actividad', 'inicio_actividad', 'naomask', 'lista', 'cxab', 10, 'TUDO');
 NM_tab_crit_1[14] = new NM_critica('F1', 'cpa', 'cpa', 'naomask', 'lista', 'cxab', 30, 'TUDO');
 NM_tab_crit_1[15] = new NM_critica('F1', 'observaciones', 'observaciones', 'naomask', 'lista', 'cxab', 42, 'TUDO');
 NM_tab_crit_1[16] = new NM_critica('F1', 'saldo', 'saldo', 'naomask', 'valor', 4, 2, -0, 999999, '<?php echo str_replace("'", "\'", $this->field_config['saldo']['symbol_grp']); ?>', '<?php echo str_replace("'", "\'", $this->field_config['saldo']['symbol_dec']); ?>');
 NM_tab_crit_1[17] = new NM_critica('NM_final');

function nm_navpage(x, op) 
{ 
    nm_move('navpage', x);
} 
function nm_move(x, y, z) 
{ 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (("inicio" == x || "retorna" == x) && "S" != Nav_permite_ret)
    {
        return;
    }
    if (("avanca" == x || "final" == x) && "S" != Nav_permite_ava)
    {
        return;
    }
    document.F2.nmgp_opcao.value = x; 
    document.F2.nmgp_ordem.value = y; 
    document.F2.nmgp_clone.value = "";
    if ("apl_detalhe" == x)
    {
        document.F2.nmgp_opcao.value = 'igual'; 
        document.F2.master_nav.value = 'on'; 
        if (z)
        {
            document.F2.sc_ifr_height.value = z;
        }
        document.F2.submit();
        return;
    }
    if ("clone" == x)
    {
        x = "novo";
        document.F2.nmgp_clone.value = "S";
        document.F2.nmgp_opcao.value = x; 
    }
    if ("fast_search" == x)
    {
        document.F2.nmgp_ordem.value = ''; 
        document.F2.nmgp_fast_search.value = scAjaxGetFieldSelect("nmgp_fast_search_" + y); 
        document.F2.nmgp_cond_fast_search.value = scAjaxGetFieldText("nmgp_cond_fast_search_" + y); 
        document.F2.nmgp_arg_fast_search.value = scAjaxGetFieldText("nmgp_arg_fast_search_" + y); 
    }
    if ("novo" == x || "edit_novo" == x)
    {
<?php
       $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
        document.F2.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
        document.F2.submit();
    }
    else
    {
        do_ajax_form_clientes_navigate_form();
    }
} 
var sc_mupload_ok = true;
function nm_atualiza(x, y) 
{ 
    if (!sc_mupload_ok)
    {
        if (!confirm("<?php echo $this->Ini->Nm_lang['lang_errm_muok'] ?>"))
        {
            return;
        }
        sc_mupload_ok = true;
    }
    var Nm_submit_ok = true; 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (!scAjaxDetailProc())
    {
        return;
    }
<?php
    $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
    document.F1.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
    document.F1.target = "_self";
    if (x == "muda_form") 
    { 
       document.F1.nmgp_num_form.value = y; 
    } 
    if (x == "excluir") 
    { 
       if (confirm ("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_errm_remv']); ?>"))  
       { 
           document.F1.nmgp_opcao.value = x; 
           document.F1.submit(); 
       } 
       else 
       { 
          return; 
       } 
    } 
    else 
    { 
       document.F1.nmgp_opcao.value = x; 
       if ("incluir" == x || "muda_form" == x)
       {
           Nm_Proc_Atualiz = true;
           document.F1.submit();
       }
       else
       {
           Nm_Proc_Atualiz = true;
           do_ajax_form_clientes_submit_form();
       }
    } 
    if (Nm_submit_ok)
    { 
        Nm_Proc_Atualiz = true;
    } 
} 
function nm_mostra_img(imagem, altura, largura)
{
    tb_show('', imagem, '');
}
function nm_recarga_form(nm_ult_ancora, nm_ult_page) 
{ 
    document.F1.target = "_self";
    document.F1.nmgp_parms.value = "";
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_opcao.value= "recarga"; 
    document.F1.action += "#" +  nm_ult_ancora;
    document.F1.submit(); 
} 
function nm_link_url(Sc_url)
{
    if (Sc_url.substr(0, 7) != 'http://' && Sc_url.substr(0, 8) != 'https://')
    {
        Sc_url = 'http://' + Sc_url;
    }
    return Sc_url;
}
function sc_trim(str, chars) {
        return sc_ltrim(sc_rtrim(str, chars), chars);
}
function sc_ltrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
function sc_rtrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
var hasJsFormOnload = false;

function scCssFocus(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectFocusOdd')
             .removeClass('scFormObjectOdd');
}

function scCssBlur(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectOdd')
             .removeClass('scFormObjectFocusOdd');
}

</script> 
