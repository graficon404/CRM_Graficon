function grid_rubro_id_rubro_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_id_rubro" + seqRow).html();
}

function grid_rubro_id_rubro_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_id_rubro" + seqRow).html(newValue);
}

function grid_rubro_descripcion_rubro_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_descripcion_rubro" + seqRow).html();
}

function grid_rubro_descripcion_rubro_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_descripcion_rubro" + seqRow).html(newValue);
}

function grid_rubro_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_rubro" == field) {
    return grid_rubro_id_rubro_getValue(seqRow);
  }
  if ("descripcion_rubro" == field) {
    return grid_rubro_descripcion_rubro_getValue(seqRow);
  }
}

function grid_rubro_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_rubro" == field) {
    grid_rubro_id_rubro_setValue(newValue, seqRow);
  }
  if ("descripcion_rubro" == field) {
    grid_rubro_descripcion_rubro_setValue(newValue, seqRow);
  }
}

function scJQAddEvents(seqRow) {
  seqRow = scSeqNormalize(seqRow);
}

function scSeqNormalize(seqRow) {
  var newSeqRow = seqRow.toString();
  if ("" == newSeqRow) {
    return "";
  }
  if ("_" != newSeqRow.substr(0, 1)) {
    return "_" + newSeqRow;
  }
  return newSeqRow;
}
function ajax_navigate(opc, parm)
{
    scAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_navigate&script_case_init=" + document.F4.script_case_init.value + "&script_case_session=" + document.F4.script_case_session.value + "&opc=" + opc  + "&parm=" + parm,
      success: function(jsonNavigate) {
        var i, oResp;
        eval("oResp = " + jsonNavigate);
        document.getElementById('nmsc_iframe_liga_A_grid_rubro').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_rubro').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_rubro').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_rubro').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_rubro').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_rubro').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_rubro').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_rubro').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_rubro').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_rubro').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_rubro').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_rubro').style.width  = '0px';
        if (oResp["redirInfo"]) {
           scAjaxRedir(oResp);
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
               $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["setDisplay"]) {
          for (i = 0; i < oResp["setDisplay"].length; i++) {
               document.getElementById(oResp["setDisplay"][i]["field"]).style.display = oResp["setDisplay"][i]["value"];
          }
        }
        if (oResp["setDisabled"]) {
          for (i = 0; i < oResp["setDisabled"].length; i++) {
               document.getElementById(oResp["setDisabled"][i]["field"]).disabled = oResp["setDisabled"][i]["value"];
          }
        }
        if (oResp["setClass"]) {
          for (i = 0; i < oResp["setClass"].length; i++) {
               document.getElementById(oResp["setClass"][i]["field"]).className = oResp["setClass"][i]["value"];
          }
        }
        if (oResp["setSrc"]) {
          for (i = 0; i < oResp["setSrc"].length; i++) {
               document.getElementById(oResp["setSrc"][i]["field"]).src = oResp["setSrc"][i]["value"];
          }
        }
        if (oResp["redirInfo"]) {
           scAjaxRedir(oResp);
        }
        if (oResp["htmOutput"]) {
           scAjaxShowDebug(oResp);
        }
        if (!SC_Link_View)
        {
            if (Qsearch_ok)
            {
                scQSInitVal = $("#SC_fast_search_top").val();
                scQSInit = true;
                scQuickSearchInit(false, '');
                $('#SC_fast_search_top').listen();
                scQuickSearchKeyUp('top', null);
                scQSInit = false;
            }
            SC_init_jquery();
            tb_init('a.thickbox, area.thickbox, input.thickbox');
        }
        scAjaxProcOff();
      }
    });
}
