<?php
class form_clientes_ctacte_form extends form_clientes_ctacte_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_clientes_ctacte'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_clientes_ctacte'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
<?php
include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
?>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_clientes_ctacte_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
 if ('S' == str_ret)
 {
  if (Nav_binicio == 'image')
  {
      if (document.getElementById("sc_b_ini_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        document.getElementById("sc_b_ini_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ini_" + str_pos)){
        document.getElementById("sc_b_ini_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['binicio']['style'] ?>";
        document.getElementById("sc_b_ini_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['binicio']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['binicio']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bretorna == 'image')
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        document.getElementById("sc_b_ret_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        document.getElementById("sc_b_ret_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bretorna']['style'] ?>";
        document.getElementById("sc_b_ret_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['bretorna']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bretorna']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        }
      }
  }
 }
 else
 {
  if (Nav_binicio_off == 'image')
  {
      if (document.getElementById("sc_b_ini_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        document.getElementById("sc_b_ini_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ini_" + str_pos)) {
        document.getElementById("sc_b_ini_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['binicio_off']['style'] ?>";
        document.getElementById("sc_b_ini_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['binicio_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['binicio_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bretorna_off == 'image')
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        document.getElementById("sc_b_ret_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        document.getElementById("sc_b_ret_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bretorna_off']['style'] ?>";
        document.getElementById("sc_b_ret_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['bretorna_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bretorna_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        }
      }
  }
 }
 if ('S' == str_ava)
 {
  if (Nav_bavanca == 'image')
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        document.getElementById("sc_b_avc_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        document.getElementById("sc_b_avc_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bavanca']['style'] ?>";
        document.getElementById("sc_b_avc_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['bavanca']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bavanca']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bfinal == 'image')
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        document.getElementById("sc_b_fim_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        document.getElementById("sc_b_fim_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bfinal']['style'] ?>";
        document.getElementById("sc_b_fim_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['bfinal']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bfinal']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        }
      }
  }
 }
 else
 {
  if (Nav_bavanca_off == 'image')
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        document.getElementById("sc_b_avc_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        document.getElementById("sc_b_avc_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bavanca_off']['style'] ?>";
        document.getElementById("sc_b_avc_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['bavanca_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bavanca_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bfinal_off == 'image')
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        document.getElementById("sc_b_fim_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        document.getElementById("sc_b_fim_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bfinal_off']['style'] ?>";
        document.getElementById("sc_b_fim_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['bfinal_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bfinal_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        }
      }
  }
 }
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_clientes_ctacte_jquery.php');

?>

 var scQSInit = true;
 var scQSPos = {};
 $(function() {


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_clientes_ctacte_js0.php");
?>
<script type="text/javascript" src="<?php echo str_replace("{str_idioma}", $this->Ini->str_lang, "../_lib/js/tab_erro_{str_idioma}.js"); ?>"> 
</script> 
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method=post 
               action="./" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_idioma_novo" value="">
<input type=hidden name="nmgp_schema_f" value="">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo NM_encode_input($nmgp_num_form); ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type=hidden name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe']) ? 0 : "0px";
?>
<?php
$_SESSION['scriptcase']['error_span_title']['form_clientes_ctacte'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_clientes_ctacte'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding="<?php echo $int_iframe_padding; ?>" cellspacing=0 class="scFormBorder" >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_clientes_ctacte'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_clientes_ctacte'] . ""; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar'); return false;", "nm_atualiza ('alterar'); return false;", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_clientes_ctacte_add_new_line(); return false;", "do_ajax_form_clientes_ctacte_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo'); return false;", "nm_move ('novo'); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir'); return false;", "nm_atualiza ('incluir'); return false;", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       echo "</td></tr><tr><td align=center>";
       echo "<font face=\"" . $this->Ini->pag_fonte_tipo . "\" color=\"" . $this->Ini->cor_txt_grid . "\" size=\"2\"><b>" . $this->Ini->Nm_lang['lang_errm_empt'] . "</b></font>";
       echo "</td></tr>";
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['fecha_']) && $this->nmgp_cmp_hidden['fecha_'] == 'off') { $sStyleHidden_fecha_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fecha_']) || $this->nmgp_cmp_hidden['fecha_'] == 'on') {
      if (!isset($this->nm_new_label['fecha_'])) {
          $this->nm_new_label['fecha_'] = "" . $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Fecha'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_fecha_" style=";<?php echo $sStyleHidden_fecha_; ?>" > <?php echo $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Fecha'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sStyleHidden_descripcion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['descripcion_']) || $this->nmgp_cmp_hidden['descripcion_'] == 'on') {
      if (!isset($this->nm_new_label['descripcion_'])) {
          $this->nm_new_label['descripcion_'] = "" . $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Descripcion'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_descripcion_" style=";<?php echo $sStyleHidden_descripcion_; ?>" > <?php echo $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Descripcion'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['comprobante_']) && $this->nmgp_cmp_hidden['comprobante_'] == 'off') { $sStyleHidden_comprobante_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['comprobante_']) || $this->nmgp_cmp_hidden['comprobante_'] == 'on') {
      if (!isset($this->nm_new_label['comprobante_'])) {
          $this->nm_new_label['comprobante_'] = "" . $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Comprobante'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_comprobante_" style=";<?php echo $sStyleHidden_comprobante_; ?>" > <?php echo $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Comprobante'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['importe_']) && $this->nmgp_cmp_hidden['importe_'] == 'off') { $sStyleHidden_importe_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['importe_']) || $this->nmgp_cmp_hidden['importe_'] == 'on') {
      if (!isset($this->nm_new_label['importe_'])) {
          $this->nm_new_label['importe_'] = "" . $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Importe'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_importe_" style="text-align:right;<?php echo $sStyleHidden_importe_; ?>" > <?php echo $this->Ini->Nm_lang['lang_clientes_ctacte_fld_Importe'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['total_']) && $this->nmgp_cmp_hidden['total_'] == 'off') { $sStyleHidden_total_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['total_']) || $this->nmgp_cmp_hidden['total_'] == 'on') {
      if (!isset($this->nm_new_label['total_'])) {
          $this->nm_new_label['total_'] = "Total"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_total_" style=";<?php echo $sStyleHidden_total_; ?>" > <?php echo $this->nm_new_label['total_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_clientes_ctacte);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_clientes_ctacte = $this->form_vert_form_clientes_ctacte;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_clientes_ctacte))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_clientes_ctacte as $sc_seq_vert => $sc_lixo)
   {
       $this->id_ctacte_ = $this->form_vert_form_clientes_ctacte[$sc_seq_vert]['id_ctacte_'];
       $this->cliente_id_ = $this->form_vert_form_clientes_ctacte[$sc_seq_vert]['cliente_id_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['fecha_'] = true;
           $this->nmgp_cmp_readonly['descripcion_'] = true;
           $this->nmgp_cmp_readonly['comprobante_'] = true;
           $this->nmgp_cmp_readonly['importe_'] = true;
           $this->nmgp_cmp_readonly['total_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['fecha_']) || $this->nmgp_cmp_readonly['fecha_'] != "on") {$this->nmgp_cmp_readonly['fecha_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['descripcion_']) || $this->nmgp_cmp_readonly['descripcion_'] != "on") {$this->nmgp_cmp_readonly['descripcion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['comprobante_']) || $this->nmgp_cmp_readonly['comprobante_'] != "on") {$this->nmgp_cmp_readonly['comprobante_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['importe_']) || $this->nmgp_cmp_readonly['importe_'] != "on") {$this->nmgp_cmp_readonly['importe_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['total_']) || $this->nmgp_cmp_readonly['total_'] != "on") {$this->nmgp_cmp_readonly['total_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->fecha_ = $this->form_vert_form_clientes_ctacte[$sc_seq_vert]['fecha_']; 
       $fecha_ = $this->fecha_; 
       $sStyleHidden_fecha_ = '';
       if (isset($sCheckRead_fecha_))
       {
           unset($sCheckRead_fecha_);
       }
       if (isset($this->nmgp_cmp_readonly['fecha_']))
       {
           $sCheckRead_fecha_ = $this->nmgp_cmp_readonly['fecha_'];
       }
       if (isset($this->nmgp_cmp_hidden['fecha_']) && $this->nmgp_cmp_hidden['fecha_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fecha_']);
           $sStyleHidden_fecha_ = 'display: none;';
       }
       $bTestReadOnly_fecha_ = true;
       $sStyleReadLab_fecha_ = 'display: none;';
       $sStyleReadInp_fecha_ = '';
       if (isset($this->nmgp_cmp_readonly['fecha_']) && $this->nmgp_cmp_readonly['fecha_'] == 'on')
       {
           $bTestReadOnly_fecha_ = false;
           unset($this->nmgp_cmp_readonly['fecha_']);
           $sStyleReadLab_fecha_ = '';
           $sStyleReadInp_fecha_ = 'display: none;';
       }
       $this->descripcion_ = $this->form_vert_form_clientes_ctacte[$sc_seq_vert]['descripcion_']; 
       $descripcion_ = $this->descripcion_; 
       $descripcion__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $descripcion_);
       $descripcion__val = nl2br($descripcion__tmp);
       $sStyleHidden_descripcion_ = '';
       if (isset($sCheckRead_descripcion_))
       {
           unset($sCheckRead_descripcion_);
       }
       if (isset($this->nmgp_cmp_readonly['descripcion_']))
       {
           $sCheckRead_descripcion_ = $this->nmgp_cmp_readonly['descripcion_'];
       }
       if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['descripcion_']);
           $sStyleHidden_descripcion_ = 'display: none;';
       }
       $bTestReadOnly_descripcion_ = true;
       $sStyleReadLab_descripcion_ = 'display: none;';
       $sStyleReadInp_descripcion_ = '';
       if (isset($this->nmgp_cmp_readonly['descripcion_']) && $this->nmgp_cmp_readonly['descripcion_'] == 'on')
       {
           $bTestReadOnly_descripcion_ = false;
           unset($this->nmgp_cmp_readonly['descripcion_']);
           $sStyleReadLab_descripcion_ = '';
           $sStyleReadInp_descripcion_ = 'display: none;';
       }
       $this->comprobante_ = $this->form_vert_form_clientes_ctacte[$sc_seq_vert]['comprobante_']; 
       $comprobante_ = $this->comprobante_; 
       $sStyleHidden_comprobante_ = '';
       if (isset($sCheckRead_comprobante_))
       {
           unset($sCheckRead_comprobante_);
       }
       if (isset($this->nmgp_cmp_readonly['comprobante_']))
       {
           $sCheckRead_comprobante_ = $this->nmgp_cmp_readonly['comprobante_'];
       }
       if (isset($this->nmgp_cmp_hidden['comprobante_']) && $this->nmgp_cmp_hidden['comprobante_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['comprobante_']);
           $sStyleHidden_comprobante_ = 'display: none;';
       }
       $bTestReadOnly_comprobante_ = true;
       $sStyleReadLab_comprobante_ = 'display: none;';
       $sStyleReadInp_comprobante_ = '';
       if (isset($this->nmgp_cmp_readonly['comprobante_']) && $this->nmgp_cmp_readonly['comprobante_'] == 'on')
       {
           $bTestReadOnly_comprobante_ = false;
           unset($this->nmgp_cmp_readonly['comprobante_']);
           $sStyleReadLab_comprobante_ = '';
           $sStyleReadInp_comprobante_ = 'display: none;';
       }
       $this->importe_ = $this->form_vert_form_clientes_ctacte[$sc_seq_vert]['importe_']; 
       $importe_ = $this->importe_; 
       $sStyleHidden_importe_ = '';
       if (isset($sCheckRead_importe_))
       {
           unset($sCheckRead_importe_);
       }
       if (isset($this->nmgp_cmp_readonly['importe_']))
       {
           $sCheckRead_importe_ = $this->nmgp_cmp_readonly['importe_'];
       }
       if (isset($this->nmgp_cmp_hidden['importe_']) && $this->nmgp_cmp_hidden['importe_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['importe_']);
           $sStyleHidden_importe_ = 'display: none;';
       }
       $bTestReadOnly_importe_ = true;
       $sStyleReadLab_importe_ = 'display: none;';
       $sStyleReadInp_importe_ = '';
       if (isset($this->nmgp_cmp_readonly['importe_']) && $this->nmgp_cmp_readonly['importe_'] == 'on')
       {
           $bTestReadOnly_importe_ = false;
           unset($this->nmgp_cmp_readonly['importe_']);
           $sStyleReadLab_importe_ = '';
           $sStyleReadInp_importe_ = 'display: none;';
       }
       $this->total_ = $this->form_vert_form_clientes_ctacte[$sc_seq_vert]['total_']; 
       $total_ = $this->total_; 
       $sStyleHidden_total_ = '';
       if (isset($sCheckRead_total_))
       {
           unset($sCheckRead_total_);
       }
       if (isset($this->nmgp_cmp_readonly['total_']))
       {
           $sCheckRead_total_ = $this->nmgp_cmp_readonly['total_'];
       }
       if (isset($this->nmgp_cmp_hidden['total_']) && $this->nmgp_cmp_hidden['total_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['total_']);
           $sStyleHidden_total_ = 'display: none;';
       }
       $bTestReadOnly_total_ = true;
       $sStyleReadLab_total_ = 'display: none;';
       $sStyleReadInp_total_ = '';
       if (isset($this->nmgp_cmp_readonly['total_']) && $this->nmgp_cmp_readonly['total_'] == 'on')
       {
           $bTestReadOnly_total_ = false;
           unset($this->nmgp_cmp_readonly['total_']);
           $sStyleReadLab_total_ = '';
           $sStyleReadInp_total_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type=checkbox name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl)) { echo " checked";} ?>> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_clientes_ctacte_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_clientes_ctacte_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_clientes_ctacte_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_clientes_ctacte_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_clientes_ctacte_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_clientes_ctacte_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['fecha_']) && $this->nmgp_cmp_hidden['fecha_'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="fecha_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($fecha_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_fecha_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fecha_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fecha_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_"]) &&  $this->nmgp_cmp_readonly["fecha_"] == "on") { 

 ?>
<input type=hidden name="fecha_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($fecha_) . "\">" . $fecha_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fecha_<?php echo $sc_seq_vert ?>" style=";<?php echo $sStyleReadLab_fecha_; ?>"><?php echo NM_encode_input($this->fecha_); ?></span><span id="id_read_off_fecha_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_; ?>">
 <input class="sc-js-input scFormObjectOddMult" style=";" id="id_sc_field_fecha_<?php echo $sc_seq_vert ?>" type=text name="fecha_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($fecha_) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['fecha_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($descripcion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_descripcion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_descripcion_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php
$descripcion__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($descripcion_));

?>

<?php if ($bTestReadOnly_descripcion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion_"]) &&  $this->nmgp_cmp_readonly["descripcion_"] == "on") { 

 ?>
<input type=hidden name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($descripcion_) . "\">" . $descripcion__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_descripcion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-descripcion_<?php echo $sc_seq_vert ?>" style=";<?php echo $sStyleReadLab_descripcion_; ?>"><?php echo NM_encode_input($descripcion__val); ?></span><span id="id_read_off_descripcion_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descripcion_; ?>">
 <textarea  class="sc-js-input scFormObjectOddMult" style=";" name="descripcion_<?php echo $sc_seq_vert ?>" id="id_sc_field_descripcion_<?php echo $sc_seq_vert ?>" rows=2 cols=50
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $descripcion_); ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['comprobante_']) && $this->nmgp_cmp_hidden['comprobante_'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="comprobante_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($comprobante_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_comprobante_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_comprobante_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_comprobante_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comprobante_"]) &&  $this->nmgp_cmp_readonly["comprobante_"] == "on") { 

 ?>
<input type=hidden name="comprobante_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($comprobante_) . "\">" . $comprobante_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_comprobante_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-comprobante_<?php echo $sc_seq_vert ?>" style=";<?php echo $sStyleReadLab_comprobante_; ?>"><?php echo NM_encode_input($this->comprobante_); ?></span><span id="id_read_off_comprobante_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_comprobante_; ?>">
 <input class="sc-js-input scFormObjectOddMult" style=";" id="id_sc_field_comprobante_<?php echo $sc_seq_vert ?>" type=text name="comprobante_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($comprobante_) ?>"
 size=7 maxlength=7 alt="{datatype: 'text', maxLength: 7, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comprobante_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comprobante_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['importe_']) && $this->nmgp_cmp_hidden['importe_'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="importe_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($importe_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_importe_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_importe_; ?>text-align:right;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult" style="text-align:right;;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_importe_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importe_"]) &&  $this->nmgp_cmp_readonly["importe_"] == "on") { 

 ?>
<input type=hidden name="importe_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($importe_) . "\">" . $importe_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_importe_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-importe_<?php echo $sc_seq_vert ?>" style="text-align:right;<?php echo $sStyleReadLab_importe_; ?>"><?php echo NM_encode_input($this->importe_); ?></span><span id="id_read_off_importe_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importe_; ?>">
 <input class="sc-js-input scFormObjectOddMult" style="text-align:left;" id="id_sc_field_importe_<?php echo $sc_seq_vert ?>" type=text name="importe_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($importe_) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importe_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importe_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importe_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importe_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importe_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['total_']) && $this->nmgp_cmp_hidden['total_'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="total_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($total_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_total_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_total_; ?>text-align:right;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult" style="text-align:right;;vertical-align: top;padding: 0px"><input type=hidden name="total_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($total_); ?>"><span id="id_ajax_label_total_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($total_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_fecha_))
       {
           $this->nmgp_cmp_readonly['fecha_'] = $sCheckRead_fecha_;
       }
       if ('display: none;' == $sStyleHidden_fecha_)
       {
           $this->nmgp_cmp_hidden['fecha_'] = 'off';
       }
       if (isset($sCheckRead_descripcion_))
       {
           $this->nmgp_cmp_readonly['descripcion_'] = $sCheckRead_descripcion_;
       }
       if ('display: none;' == $sStyleHidden_descripcion_)
       {
           $this->nmgp_cmp_hidden['descripcion_'] = 'off';
       }
       if (isset($sCheckRead_comprobante_))
       {
           $this->nmgp_cmp_readonly['comprobante_'] = $sCheckRead_comprobante_;
       }
       if ('display: none;' == $sStyleHidden_comprobante_)
       {
           $this->nmgp_cmp_hidden['comprobante_'] = 'off';
       }
       if (isset($sCheckRead_importe_))
       {
           $this->nmgp_cmp_readonly['importe_'] = $sCheckRead_importe_;
       }
       if ('display: none;' == $sStyleHidden_importe_)
       {
           $this->nmgp_cmp_hidden['importe_'] = 'off';
       }
       if (isset($sCheckRead_total_))
       {
           $this->nmgp_cmp_readonly['total_'] = $sCheckRead_total_;
       }
       if ('display: none;' == $sStyleHidden_total_)
       {
           $this->nmgp_cmp_hidden['total_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_clientes_ctacte = $guarda_form_vert_form_clientes_ctacte;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type=hidden name="sc_contr_vert" value="<?php echo NM_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == 10) ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == 20) ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == 50) ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio'); return false;", "nm_move ('inicio'); return false;", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna'); return false;", "nm_move ('retorna'); return false;", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca'); return false;", "nm_move ('avanca'); return false;", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final'); return false;", "nm_move ('final'); return false;", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F") { ?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['total'] + 1)?>);</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script> 
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
</script> 
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_clientes_ctacte");
 parent.scAjaxDetailHeight("form_clientes_ctacte", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailHeight("form_clientes_ctacte", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_ctacte']['sc_modal'])
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
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
