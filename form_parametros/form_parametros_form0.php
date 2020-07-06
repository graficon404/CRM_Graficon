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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_parametros'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_parametros'] . ""); } ?></TITLE>
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
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
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
include_once("form_parametros_sajax_js.php");
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
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
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

include_once('form_parametros_jquery.php');

?>

 var scQSInit = true;
 var scQSPos = {};
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
     scQuickSearchInit(false, '');
     $('#SC_fast_search_t').listen();
     scQuickSearchKeyUp('t', null);
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if ('' == sPos || 't' == sPos) scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['recarga'];
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
 include_once("form_parametros_js0.php");
?>
<script type="text/javascript" src="<?php echo str_replace("{str_idioma}", $this->Ini->str_lang, "../_lib/js/tab_erro_{str_idioma}.js"); ?>"> 
</script> 
<script type="text/javascript"> 
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
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe']) ? 0 : "0px";
?>
<?php
$_SESSION['scriptcase']['error_span_title']['form_parametros'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_parametros'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_parametros'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_tbl_parametros'] . ""; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo NM_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo'); return false;", "nm_move ('novo'); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir'); return false;", "nm_atualiza ('incluir'); return false;", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.F5.submit();return false;", "document.F5.submit();return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar'); return false;", "nm_atualiza ('alterar'); return false;", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir'); return false;", "nm_atualiza ('excluir'); return false;", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R")
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
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0"><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_parametros']))
           {
               $this->nmgp_cmp_readonly['id_parametros'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_parametros']))
    {
        $this->nm_new_label['id_parametros'] = "id_parametros";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_parametros = $this->id_parametros;
   $sStyleHidden_id_parametros = '';
   if (isset($this->nmgp_cmp_hidden['id_parametros']) && $this->nmgp_cmp_hidden['id_parametros'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_parametros']);
       $sStyleHidden_id_parametros = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_parametros = 'display: none;';
   $sStyleReadInp_id_parametros = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_parametros"]) &&  $this->nmgp_cmp_readonly["id_parametros"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_parametros']);
       $sStyleReadLab_id_parametros = '';
       $sStyleReadInp_id_parametros = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_parametros']) && $this->nmgp_cmp_hidden['id_parametros'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_parametros" value="<?php echo NM_encode_input($id_parametros) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_id_parametros" style="<?php echo $sStyleHidden_id_parametros; ?>;"><span id="id_label_id_parametros"><?php echo $this->nm_new_label['id_parametros']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_id_parametros" style="<?php echo $sStyleHidden_id_parametros; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span id="id_read_on_id_parametros" style=";<?php echo $sStyleReadLab_id_parametros; ?>"><?php echo NM_encode_input($this->id_parametros); ?></span><span id="id_read_off_id_parametros" style="<?php echo $sStyleReadInp_id_parametros; ?>"><input type=hidden name="id_parametros" value="<?php echo NM_encode_input($id_parametros) . "\">"?><span id="id_ajax_label_id_parametros"><?php echo nl2br($id_parametros); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_parametros_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_parametros_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razon_social']))
    {
        $this->nm_new_label['razon_social'] = "razon_social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razon_social = $this->razon_social;
   $sStyleHidden_razon_social = '';
   if (isset($this->nmgp_cmp_hidden['razon_social']) && $this->nmgp_cmp_hidden['razon_social'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razon_social']);
       $sStyleHidden_razon_social = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razon_social = 'display: none;';
   $sStyleReadInp_razon_social = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razon_social']) && $this->nmgp_cmp_readonly['razon_social'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razon_social']);
       $sStyleReadLab_razon_social = '';
       $sStyleReadInp_razon_social = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razon_social']) && $this->nmgp_cmp_hidden['razon_social'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="razon_social" value="<?php echo NM_encode_input($razon_social) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_razon_social" style="<?php echo $sStyleHidden_razon_social; ?>;"><span id="id_label_razon_social"><?php echo $this->nm_new_label['razon_social']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['razon_social']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['razon_social'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_razon_social" style="<?php echo $sStyleHidden_razon_social; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razon_social"]) &&  $this->nmgp_cmp_readonly["razon_social"] == "on") { 

 ?>
<input type=hidden name="razon_social" value="<?php echo NM_encode_input($razon_social) . "\">" . $razon_social . ""; ?>
<?php } else { ?>
<span id="id_read_on_razon_social" class="sc-ui-readonly-razon_social" style=";<?php echo $sStyleReadLab_razon_social; ?>"><?php echo NM_encode_input($this->razon_social); ?></span><span id="id_read_off_razon_social" style="white-space: nowrap;<?php echo $sStyleReadInp_razon_social; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_razon_social" type=text name="razon_social" value="<?php echo NM_encode_input($razon_social) ?>"
 size=24 maxlength=24 alt="{datatype: 'text', maxLength: 24, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razon_social_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razon_social_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_fantasia']))
    {
        $this->nm_new_label['nombre_fantasia'] = "nombre_fantasia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_fantasia = $this->nombre_fantasia;
   $sStyleHidden_nombre_fantasia = '';
   if (isset($this->nmgp_cmp_hidden['nombre_fantasia']) && $this->nmgp_cmp_hidden['nombre_fantasia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_fantasia']);
       $sStyleHidden_nombre_fantasia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_fantasia = 'display: none;';
   $sStyleReadInp_nombre_fantasia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_fantasia']) && $this->nmgp_cmp_readonly['nombre_fantasia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_fantasia']);
       $sStyleReadLab_nombre_fantasia = '';
       $sStyleReadInp_nombre_fantasia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_fantasia']) && $this->nmgp_cmp_hidden['nombre_fantasia'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="nombre_fantasia" value="<?php echo NM_encode_input($nombre_fantasia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_nombre_fantasia" style="<?php echo $sStyleHidden_nombre_fantasia; ?>;"><span id="id_label_nombre_fantasia"><?php echo $this->nm_new_label['nombre_fantasia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['nombre_fantasia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['nombre_fantasia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_nombre_fantasia" style="<?php echo $sStyleHidden_nombre_fantasia; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_fantasia"]) &&  $this->nmgp_cmp_readonly["nombre_fantasia"] == "on") { 

 ?>
<input type=hidden name="nombre_fantasia" value="<?php echo NM_encode_input($nombre_fantasia) . "\">" . $nombre_fantasia . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_fantasia" class="sc-ui-readonly-nombre_fantasia" style=";<?php echo $sStyleReadLab_nombre_fantasia; ?>"><?php echo NM_encode_input($this->nombre_fantasia); ?></span><span id="id_read_off_nombre_fantasia" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_fantasia; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_nombre_fantasia" type=text name="nombre_fantasia" value="<?php echo NM_encode_input($nombre_fantasia) ?>"
 size=24 maxlength=24 alt="{datatype: 'text', maxLength: 24, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_fantasia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_fantasia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="50%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['domicilio']))
    {
        $this->nm_new_label['domicilio'] = "domicilio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $domicilio = $this->domicilio;
   $sStyleHidden_domicilio = '';
   if (isset($this->nmgp_cmp_hidden['domicilio']) && $this->nmgp_cmp_hidden['domicilio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['domicilio']);
       $sStyleHidden_domicilio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_domicilio = 'display: none;';
   $sStyleReadInp_domicilio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['domicilio']) && $this->nmgp_cmp_readonly['domicilio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['domicilio']);
       $sStyleReadLab_domicilio = '';
       $sStyleReadInp_domicilio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['domicilio']) && $this->nmgp_cmp_hidden['domicilio'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="domicilio" value="<?php echo NM_encode_input($domicilio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_domicilio" style="<?php echo $sStyleHidden_domicilio; ?>;"><span id="id_label_domicilio"><?php echo $this->nm_new_label['domicilio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['domicilio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['domicilio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_domicilio" style="<?php echo $sStyleHidden_domicilio; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["domicilio"]) &&  $this->nmgp_cmp_readonly["domicilio"] == "on") { 

 ?>
<input type=hidden name="domicilio" value="<?php echo NM_encode_input($domicilio) . "\">" . $domicilio . ""; ?>
<?php } else { ?>
<span id="id_read_on_domicilio" class="sc-ui-readonly-domicilio" style=";<?php echo $sStyleReadLab_domicilio; ?>"><?php echo NM_encode_input($this->domicilio); ?></span><span id="id_read_off_domicilio" style="white-space: nowrap;<?php echo $sStyleReadInp_domicilio; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_domicilio" type=text name="domicilio" value="<?php echo NM_encode_input($domicilio) ?>"
 size=24 maxlength=24 alt="{datatype: 'text', maxLength: 24, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_domicilio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_domicilio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['localidad']))
    {
        $this->nm_new_label['localidad'] = "localidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $localidad = $this->localidad;
   $sStyleHidden_localidad = '';
   if (isset($this->nmgp_cmp_hidden['localidad']) && $this->nmgp_cmp_hidden['localidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['localidad']);
       $sStyleHidden_localidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_localidad = 'display: none;';
   $sStyleReadInp_localidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['localidad']) && $this->nmgp_cmp_readonly['localidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['localidad']);
       $sStyleReadLab_localidad = '';
       $sStyleReadInp_localidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['localidad']) && $this->nmgp_cmp_hidden['localidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="localidad" value="<?php echo NM_encode_input($localidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_localidad" style="<?php echo $sStyleHidden_localidad; ?>;"><span id="id_label_localidad"><?php echo $this->nm_new_label['localidad']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['localidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['localidad'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_localidad" style="<?php echo $sStyleHidden_localidad; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["localidad"]) &&  $this->nmgp_cmp_readonly["localidad"] == "on") { 

 ?>
<input type=hidden name="localidad" value="<?php echo NM_encode_input($localidad) . "\">" . $localidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_localidad" class="sc-ui-readonly-localidad" style=";<?php echo $sStyleReadLab_localidad; ?>"><?php echo NM_encode_input($this->localidad); ?></span><span id="id_read_off_localidad" style="white-space: nowrap;<?php echo $sStyleReadInp_localidad; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_localidad" type=text name="localidad" value="<?php echo NM_encode_input($localidad) ?>"
 size=24 maxlength=24 alt="{datatype: 'text', maxLength: 24, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_localidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_localidad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['provincia']))
    {
        $this->nm_new_label['provincia'] = "provincia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $provincia = $this->provincia;
   $sStyleHidden_provincia = '';
   if (isset($this->nmgp_cmp_hidden['provincia']) && $this->nmgp_cmp_hidden['provincia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['provincia']);
       $sStyleHidden_provincia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_provincia = 'display: none;';
   $sStyleReadInp_provincia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['provincia']) && $this->nmgp_cmp_readonly['provincia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['provincia']);
       $sStyleReadLab_provincia = '';
       $sStyleReadInp_provincia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['provincia']) && $this->nmgp_cmp_hidden['provincia'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="provincia" value="<?php echo NM_encode_input($provincia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_provincia" style="<?php echo $sStyleHidden_provincia; ?>;"><span id="id_label_provincia"><?php echo $this->nm_new_label['provincia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['provincia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['provincia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_provincia" style="<?php echo $sStyleHidden_provincia; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["provincia"]) &&  $this->nmgp_cmp_readonly["provincia"] == "on") { 

 ?>
<input type=hidden name="provincia" value="<?php echo NM_encode_input($provincia) . "\">" . $provincia . ""; ?>
<?php } else { ?>
<span id="id_read_on_provincia" class="sc-ui-readonly-provincia" style=";<?php echo $sStyleReadLab_provincia; ?>"><?php echo NM_encode_input($this->provincia); ?></span><span id="id_read_off_provincia" style="white-space: nowrap;<?php echo $sStyleReadInp_provincia; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_provincia" type=text name="provincia" value="<?php echo NM_encode_input($provincia) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_provincia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_provincia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefono']))
    {
        $this->nm_new_label['telefono'] = "telefono";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefono = $this->telefono;
   $sStyleHidden_telefono = '';
   if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefono']);
       $sStyleHidden_telefono = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefono = 'display: none;';
   $sStyleReadInp_telefono = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefono']) && $this->nmgp_cmp_readonly['telefono'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefono']);
       $sStyleReadLab_telefono = '';
       $sStyleReadInp_telefono = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="telefono" value="<?php echo NM_encode_input($telefono) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_telefono" style="<?php echo $sStyleHidden_telefono; ?>;"><span id="id_label_telefono"><?php echo $this->nm_new_label['telefono']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['telefono']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['telefono'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_telefono" style="<?php echo $sStyleHidden_telefono; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono"]) &&  $this->nmgp_cmp_readonly["telefono"] == "on") { 

 ?>
<input type=hidden name="telefono" value="<?php echo NM_encode_input($telefono) . "\">" . $telefono . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefono" class="sc-ui-readonly-telefono" style=";<?php echo $sStyleReadLab_telefono; ?>"><?php echo NM_encode_input($this->telefono); ?></span><span id="id_read_off_telefono" style="white-space: nowrap;<?php echo $sStyleReadInp_telefono; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_telefono" type=text name="telefono" value="<?php echo NM_encode_input($telefono) ?>"
 size=24 maxlength=24 alt="{datatype: 'text', maxLength: 24, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefono_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefono_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['e_mail']))
    {
        $this->nm_new_label['e_mail'] = "e_mail";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $e_mail = $this->e_mail;
   $sStyleHidden_e_mail = '';
   if (isset($this->nmgp_cmp_hidden['e_mail']) && $this->nmgp_cmp_hidden['e_mail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['e_mail']);
       $sStyleHidden_e_mail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_e_mail = 'display: none;';
   $sStyleReadInp_e_mail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['e_mail']) && $this->nmgp_cmp_readonly['e_mail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['e_mail']);
       $sStyleReadLab_e_mail = '';
       $sStyleReadInp_e_mail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['e_mail']) && $this->nmgp_cmp_hidden['e_mail'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="e_mail" value="<?php echo NM_encode_input($e_mail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_e_mail" style="<?php echo $sStyleHidden_e_mail; ?>;"><span id="id_label_e_mail"><?php echo $this->nm_new_label['e_mail']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_e_mail" style="<?php echo $sStyleHidden_e_mail; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["e_mail"]) &&  $this->nmgp_cmp_readonly["e_mail"] == "on") { 

 ?>
<input type=hidden name="e_mail" value="<?php echo NM_encode_input($e_mail) . "\">" . $e_mail . ""; ?>
<?php } else { ?>
<span id="id_read_on_e_mail" class="sc-ui-readonly-e_mail" style=";<?php echo $sStyleReadLab_e_mail; ?>"><?php echo NM_encode_input($this->e_mail); ?></span><span id="id_read_off_e_mail" style="white-space: nowrap;<?php echo $sStyleReadInp_e_mail; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_e_mail" type=text name="e_mail" value="<?php echo NM_encode_input($e_mail) ?>"
 size=24 maxlength=24 alt="{datatype: 'text', maxLength: 24, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_e_mail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_e_mail_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_iva_id']))
   {
       $this->nm_new_label['tipo_iva_id'] = "tipo_iva_id";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_iva_id = $this->tipo_iva_id;
   $sStyleHidden_tipo_iva_id = '';
   if (isset($this->nmgp_cmp_hidden['tipo_iva_id']) && $this->nmgp_cmp_hidden['tipo_iva_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_iva_id']);
       $sStyleHidden_tipo_iva_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_iva_id = 'display: none;';
   $sStyleReadInp_tipo_iva_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_iva_id']) && $this->nmgp_cmp_readonly['tipo_iva_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_iva_id']);
       $sStyleReadLab_tipo_iva_id = '';
       $sStyleReadInp_tipo_iva_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_iva_id']) && $this->nmgp_cmp_hidden['tipo_iva_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_iva_id" value="<?php echo NM_encode_input($this->tipo_iva_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_tipo_iva_id" style="<?php echo $sStyleHidden_tipo_iva_id; ?>;"><span id="id_label_tipo_iva_id"><?php echo $this->nm_new_label['tipo_iva_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['tipo_iva_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['tipo_iva_id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_tipo_iva_id" style="<?php echo $sStyleHidden_tipo_iva_id; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_iva_id"]) &&  $this->nmgp_cmp_readonly["tipo_iva_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array(); 
    }

   $old_value_id_parametros = $this->id_parametros;
   $old_value_sucursal = $this->sucursal;
   $old_value_valor_dolar = $this->valor_dolar;
   $old_value_alicuota_iva_1 = $this->alicuota_iva_1;
   $old_value_alicuota_iva_2 = $this->alicuota_iva_2;
   $old_value_cantidad_copias = $this->cantidad_copias;
   $old_value_control = $this->control;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_parametros = $this->id_parametros;
   $unformatted_value_sucursal = $this->sucursal;
   $unformatted_value_valor_dolar = $this->valor_dolar;
   $unformatted_value_alicuota_iva_1 = $this->alicuota_iva_1;
   $unformatted_value_alicuota_iva_2 = $this->alicuota_iva_2;
   $unformatted_value_cantidad_copias = $this->cantidad_copias;
   $unformatted_value_control = $this->control;

   $nm_comando = "SELECT ID_SitIVA, Descripcion 
FROM situacion_iva 
ORDER BY Descripcion";

   $this->id_parametros = $old_value_id_parametros;
   $this->sucursal = $old_value_sucursal;
   $this->valor_dolar = $old_value_valor_dolar;
   $this->alicuota_iva_1 = $old_value_alicuota_iva_1;
   $this->alicuota_iva_2 = $old_value_alicuota_iva_2;
   $this->cantidad_copias = $old_value_cantidad_copias;
   $this->control = $old_value_control;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'][] = $rs->fields[0];
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
   $x = 0; 
   $tipo_iva_id_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_iva_id_1))
          {
              foreach ($this->tipo_iva_id_1 as $tmp_tipo_iva_id)
              {
                  if (trim($tmp_tipo_iva_id) === trim($cadaselect[1])) { $tipo_iva_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_iva_id) === trim($cadaselect[1])) { $tipo_iva_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="tipo_iva_id" value="<?php echo NM_encode_input($tipo_iva_id) . "\">" . $tipo_iva_id_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'] = array(); 
    }

   $old_value_id_parametros = $this->id_parametros;
   $old_value_sucursal = $this->sucursal;
   $old_value_valor_dolar = $this->valor_dolar;
   $old_value_alicuota_iva_1 = $this->alicuota_iva_1;
   $old_value_alicuota_iva_2 = $this->alicuota_iva_2;
   $old_value_cantidad_copias = $this->cantidad_copias;
   $old_value_control = $this->control;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_parametros = $this->id_parametros;
   $unformatted_value_sucursal = $this->sucursal;
   $unformatted_value_valor_dolar = $this->valor_dolar;
   $unformatted_value_alicuota_iva_1 = $this->alicuota_iva_1;
   $unformatted_value_alicuota_iva_2 = $this->alicuota_iva_2;
   $unformatted_value_cantidad_copias = $this->cantidad_copias;
   $unformatted_value_control = $this->control;

   $nm_comando = "SELECT ID_SitIVA, Descripcion 
FROM situacion_iva 
ORDER BY Descripcion";

   $this->id_parametros = $old_value_id_parametros;
   $this->sucursal = $old_value_sucursal;
   $this->valor_dolar = $old_value_valor_dolar;
   $this->alicuota_iva_1 = $old_value_alicuota_iva_1;
   $this->alicuota_iva_2 = $old_value_alicuota_iva_2;
   $this->cantidad_copias = $old_value_cantidad_copias;
   $this->control = $old_value_control;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['Lookup_tipo_iva_id'][] = $rs->fields[0];
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
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $tipo_iva_id_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_iva_id_1))
          {
              foreach ($this->tipo_iva_id_1 as $tmp_tipo_iva_id)
              {
                  if (trim($tmp_tipo_iva_id) === trim($cadaselect[1])) { $tipo_iva_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_iva_id) === trim($cadaselect[1])) { $tipo_iva_id_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_iva_id\" style=\";" .  $sStyleReadLab_tipo_iva_id . "\">" . NM_encode_input($tipo_iva_id_look) . "</span><span id=\"id_read_off_tipo_iva_id\" style=\"" . $sStyleReadInp_tipo_iva_id . "\">";
   echo " <span id=\"idAjaxSelect_tipo_iva_id\"><select class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_tipo_iva_id\" name=\"tipo_iva_id\" size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_iva_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_iva_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_iva_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_iva_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['sucursal']))
    {
        $this->nm_new_label['sucursal'] = "sucursal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sucursal = $this->sucursal;
   $sStyleHidden_sucursal = '';
   if (isset($this->nmgp_cmp_hidden['sucursal']) && $this->nmgp_cmp_hidden['sucursal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sucursal']);
       $sStyleHidden_sucursal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sucursal = 'display: none;';
   $sStyleReadInp_sucursal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sucursal']) && $this->nmgp_cmp_readonly['sucursal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sucursal']);
       $sStyleReadLab_sucursal = '';
       $sStyleReadInp_sucursal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sucursal']) && $this->nmgp_cmp_hidden['sucursal'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="sucursal" value="<?php echo NM_encode_input($sucursal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_sucursal" style="<?php echo $sStyleHidden_sucursal; ?>;"><span id="id_label_sucursal"><?php echo $this->nm_new_label['sucursal']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['sucursal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['sucursal'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_sucursal" style="<?php echo $sStyleHidden_sucursal; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sucursal"]) &&  $this->nmgp_cmp_readonly["sucursal"] == "on") { 

 ?>
<input type=hidden name="sucursal" value="<?php echo NM_encode_input($sucursal) . "\">" . $sucursal . ""; ?>
<?php } else { ?>
<span id="id_read_on_sucursal" class="sc-ui-readonly-sucursal" style=";<?php echo $sStyleReadLab_sucursal; ?>"><?php echo NM_encode_input($this->sucursal); ?></span><span id="id_read_off_sucursal" style="white-space: nowrap;<?php echo $sStyleReadInp_sucursal; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_sucursal" type=text name="sucursal" value="<?php echo NM_encode_input($sucursal) ?>"
 size=4 alt="{datatype: 'integer', maxLength: 4, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['sucursal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['sucursal']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sucursal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sucursal_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valor_dolar']))
    {
        $this->nm_new_label['valor_dolar'] = "valor_dolar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_dolar = $this->valor_dolar;
   $sStyleHidden_valor_dolar = '';
   if (isset($this->nmgp_cmp_hidden['valor_dolar']) && $this->nmgp_cmp_hidden['valor_dolar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_dolar']);
       $sStyleHidden_valor_dolar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_dolar = 'display: none;';
   $sStyleReadInp_valor_dolar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_dolar']) && $this->nmgp_cmp_readonly['valor_dolar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_dolar']);
       $sStyleReadLab_valor_dolar = '';
       $sStyleReadInp_valor_dolar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_dolar']) && $this->nmgp_cmp_hidden['valor_dolar'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="valor_dolar" value="<?php echo NM_encode_input($valor_dolar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_valor_dolar" style="<?php echo $sStyleHidden_valor_dolar; ?>;"><span id="id_label_valor_dolar"><?php echo $this->nm_new_label['valor_dolar']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['valor_dolar']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['valor_dolar'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_dolar" style="<?php echo $sStyleHidden_valor_dolar; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_dolar"]) &&  $this->nmgp_cmp_readonly["valor_dolar"] == "on") { 

 ?>
<input type=hidden name="valor_dolar" value="<?php echo NM_encode_input($valor_dolar) . "\">" . $valor_dolar . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_dolar" class="sc-ui-readonly-valor_dolar" style=";<?php echo $sStyleReadLab_valor_dolar; ?>"><?php echo NM_encode_input($this->valor_dolar); ?></span><span id="id_read_off_valor_dolar" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_dolar; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:right;" id="id_sc_field_valor_dolar" type=text name="valor_dolar" value="<?php echo NM_encode_input($valor_dolar) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_dolar']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_dolar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_dolar']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_dolar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_dolar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['alicuota_iva_1']))
    {
        $this->nm_new_label['alicuota_iva_1'] = "alicuota_iva_1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $alicuota_iva_1 = $this->alicuota_iva_1;
   $sStyleHidden_alicuota_iva_1 = '';
   if (isset($this->nmgp_cmp_hidden['alicuota_iva_1']) && $this->nmgp_cmp_hidden['alicuota_iva_1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['alicuota_iva_1']);
       $sStyleHidden_alicuota_iva_1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_alicuota_iva_1 = 'display: none;';
   $sStyleReadInp_alicuota_iva_1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['alicuota_iva_1']) && $this->nmgp_cmp_readonly['alicuota_iva_1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['alicuota_iva_1']);
       $sStyleReadLab_alicuota_iva_1 = '';
       $sStyleReadInp_alicuota_iva_1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['alicuota_iva_1']) && $this->nmgp_cmp_hidden['alicuota_iva_1'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="alicuota_iva_1" value="<?php echo NM_encode_input($alicuota_iva_1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_alicuota_iva_1" style="<?php echo $sStyleHidden_alicuota_iva_1; ?>;"><span id="id_label_alicuota_iva_1"><?php echo $this->nm_new_label['alicuota_iva_1']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['alicuota_iva_1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['alicuota_iva_1'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_alicuota_iva_1" style="<?php echo $sStyleHidden_alicuota_iva_1; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alicuota_iva_1"]) &&  $this->nmgp_cmp_readonly["alicuota_iva_1"] == "on") { 

 ?>
<input type=hidden name="alicuota_iva_1" value="<?php echo NM_encode_input($alicuota_iva_1) . "\">" . $alicuota_iva_1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_alicuota_iva_1" class="sc-ui-readonly-alicuota_iva_1" style=";<?php echo $sStyleReadLab_alicuota_iva_1; ?>"><?php echo NM_encode_input($this->alicuota_iva_1); ?></span><span id="id_read_off_alicuota_iva_1" style="white-space: nowrap;<?php echo $sStyleReadInp_alicuota_iva_1; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_alicuota_iva_1" type=text name="alicuota_iva_1" value="<?php echo NM_encode_input($alicuota_iva_1) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['alicuota_iva_1']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['alicuota_iva_1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['alicuota_iva_1']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alicuota_iva_1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alicuota_iva_1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['alicuota_iva_2']))
    {
        $this->nm_new_label['alicuota_iva_2'] = "alicuota_iva_2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $alicuota_iva_2 = $this->alicuota_iva_2;
   $sStyleHidden_alicuota_iva_2 = '';
   if (isset($this->nmgp_cmp_hidden['alicuota_iva_2']) && $this->nmgp_cmp_hidden['alicuota_iva_2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['alicuota_iva_2']);
       $sStyleHidden_alicuota_iva_2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_alicuota_iva_2 = 'display: none;';
   $sStyleReadInp_alicuota_iva_2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['alicuota_iva_2']) && $this->nmgp_cmp_readonly['alicuota_iva_2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['alicuota_iva_2']);
       $sStyleReadLab_alicuota_iva_2 = '';
       $sStyleReadInp_alicuota_iva_2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['alicuota_iva_2']) && $this->nmgp_cmp_hidden['alicuota_iva_2'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="alicuota_iva_2" value="<?php echo NM_encode_input($alicuota_iva_2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_alicuota_iva_2" style="<?php echo $sStyleHidden_alicuota_iva_2; ?>;"><span id="id_label_alicuota_iva_2"><?php echo $this->nm_new_label['alicuota_iva_2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['alicuota_iva_2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['alicuota_iva_2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_alicuota_iva_2" style="<?php echo $sStyleHidden_alicuota_iva_2; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alicuota_iva_2"]) &&  $this->nmgp_cmp_readonly["alicuota_iva_2"] == "on") { 

 ?>
<input type=hidden name="alicuota_iva_2" value="<?php echo NM_encode_input($alicuota_iva_2) . "\">" . $alicuota_iva_2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_alicuota_iva_2" class="sc-ui-readonly-alicuota_iva_2" style=";<?php echo $sStyleReadLab_alicuota_iva_2; ?>"><?php echo NM_encode_input($this->alicuota_iva_2); ?></span><span id="id_read_off_alicuota_iva_2" style="white-space: nowrap;<?php echo $sStyleReadInp_alicuota_iva_2; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_alicuota_iva_2" type=text name="alicuota_iva_2" value="<?php echo NM_encode_input($alicuota_iva_2) ?>"
 size=6 alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['alicuota_iva_2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['alicuota_iva_2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['alicuota_iva_2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alicuota_iva_2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alicuota_iva_2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cantidad_copias']))
    {
        $this->nm_new_label['cantidad_copias'] = "cantidad_copias";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidad_copias = $this->cantidad_copias;
   $sStyleHidden_cantidad_copias = '';
   if (isset($this->nmgp_cmp_hidden['cantidad_copias']) && $this->nmgp_cmp_hidden['cantidad_copias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidad_copias']);
       $sStyleHidden_cantidad_copias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidad_copias = 'display: none;';
   $sStyleReadInp_cantidad_copias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidad_copias']) && $this->nmgp_cmp_readonly['cantidad_copias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidad_copias']);
       $sStyleReadLab_cantidad_copias = '';
       $sStyleReadInp_cantidad_copias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidad_copias']) && $this->nmgp_cmp_hidden['cantidad_copias'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cantidad_copias" value="<?php echo NM_encode_input($cantidad_copias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_cantidad_copias" style="<?php echo $sStyleHidden_cantidad_copias; ?>;"><span id="id_label_cantidad_copias"><?php echo $this->nm_new_label['cantidad_copias']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['cantidad_copias']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['cantidad_copias'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_cantidad_copias" style="<?php echo $sStyleHidden_cantidad_copias; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad_copias"]) &&  $this->nmgp_cmp_readonly["cantidad_copias"] == "on") { 

 ?>
<input type=hidden name="cantidad_copias" value="<?php echo NM_encode_input($cantidad_copias) . "\">" . $cantidad_copias . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad_copias" class="sc-ui-readonly-cantidad_copias" style=";<?php echo $sStyleReadLab_cantidad_copias; ?>"><?php echo NM_encode_input($this->cantidad_copias); ?></span><span id="id_read_off_cantidad_copias" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad_copias; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_cantidad_copias" type=text name="cantidad_copias" value="<?php echo NM_encode_input($cantidad_copias) ?>"
 size=4 alt="{datatype: 'integer', maxLength: 4, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_copias']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad_copias']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_copias_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_copias_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['control']))
    {
        $this->nm_new_label['control'] = "control";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $control = $this->control;
   $sStyleHidden_control = '';
   if (isset($this->nmgp_cmp_hidden['control']) && $this->nmgp_cmp_hidden['control'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['control']);
       $sStyleHidden_control = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_control = 'display: none;';
   $sStyleReadInp_control = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['control']) && $this->nmgp_cmp_readonly['control'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['control']);
       $sStyleReadLab_control = '';
       $sStyleReadInp_control = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['control']) && $this->nmgp_cmp_hidden['control'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="control" value="<?php echo NM_encode_input($control) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_control" style="<?php echo $sStyleHidden_control; ?>;"><span id="id_label_control"><?php echo $this->nm_new_label['control']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['control']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['control'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_control" style="<?php echo $sStyleHidden_control; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["control"]) &&  $this->nmgp_cmp_readonly["control"] == "on") { 

 ?>
<input type=hidden name="control" value="<?php echo NM_encode_input($control) . "\">" . $control . ""; ?>
<?php } else { ?>
<span id="id_read_on_control" class="sc-ui-readonly-control" style=";<?php echo $sStyleReadLab_control; ?>"><?php echo NM_encode_input($this->control); ?></span><span id="id_read_off_control" style="white-space: nowrap;<?php echo $sStyleReadInp_control; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_control" type=text name="control" value="<?php echo NM_encode_input($control) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['control']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['control']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['control']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_control_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_control_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_hard']))
    {
        $this->nm_new_label['id_hard'] = "id_hard";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_hard = $this->id_hard;
   $sStyleHidden_id_hard = '';
   if (isset($this->nmgp_cmp_hidden['id_hard']) && $this->nmgp_cmp_hidden['id_hard'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_hard']);
       $sStyleHidden_id_hard = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_hard = 'display: none;';
   $sStyleReadInp_id_hard = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_hard']) && $this->nmgp_cmp_readonly['id_hard'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_hard']);
       $sStyleReadLab_id_hard = '';
       $sStyleReadInp_id_hard = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_hard']) && $this->nmgp_cmp_hidden['id_hard'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_hard" value="<?php echo NM_encode_input($id_hard) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_id_hard" style="<?php echo $sStyleHidden_id_hard; ?>;"><span id="id_label_id_hard"><?php echo $this->nm_new_label['id_hard']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['id_hard']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['php_cmp_required']['id_hard'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_id_hard" style="<?php echo $sStyleHidden_id_hard; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_hard"]) &&  $this->nmgp_cmp_readonly["id_hard"] == "on") { 

 ?>
<input type=hidden name="id_hard" value="<?php echo NM_encode_input($id_hard) . "\">" . $id_hard . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_hard" class="sc-ui-readonly-id_hard" style=";<?php echo $sStyleReadLab_id_hard; ?>"><?php echo NM_encode_input($this->id_hard); ?></span><span id="id_read_off_id_hard" style="white-space: nowrap;<?php echo $sStyleReadInp_id_hard; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_id_hard" type=text name="id_hard" value="<?php echo NM_encode_input($id_hard) ?>"
 size=36 maxlength=36 alt="{datatype: 'text', maxLength: 36, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_hard_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_hard_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['observaciones']))
    {
        $this->nm_new_label['observaciones'] = "observaciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observaciones = $this->observaciones;
   $sStyleHidden_observaciones = '';
   if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observaciones']);
       $sStyleHidden_observaciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observaciones = 'display: none;';
   $sStyleReadInp_observaciones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observaciones']) && $this->nmgp_cmp_readonly['observaciones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observaciones']);
       $sStyleReadLab_observaciones = '';
       $sStyleReadInp_observaciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="observaciones" value="<?php echo NM_encode_input($observaciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>;"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type=hidden name="observaciones" value="<?php echo NM_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones" style=";<?php echo $sStyleReadLab_observaciones; ?>"><?php echo NM_encode_input($observaciones_val); ?></span><span id="id_read_off_observaciones" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea  class="sc-js-input scFormObjectOdd" style=";" name="observaciones" id="id_sc_field_observaciones" rows=2 cols=50
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $observaciones); ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio'); return false;", "nm_move ('inicio'); return false;", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca'); return false;", "nm_move ('avanca'); return false;", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
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
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F") { ?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['total'] + 1)?>);</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
  }
?>
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
 parent.scAjaxDetailStatus("form_parametros");
 parent.scAjaxDetailHeight("form_parametros", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailHeight("form_parametros", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros']['sc_modal'])
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
