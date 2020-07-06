function grid_vendedor_id_vendedor_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_id_vendedor" + seqRow).html();
}

function grid_vendedor_id_vendedor_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_id_vendedor" + seqRow).html(newValue);
}

function grid_vendedor_vendedor_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_vendedor" + seqRow).html();
}

function grid_vendedor_vendedor_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_vendedor" + seqRow).html(newValue);
}

function grid_vendedor_comision_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_comision" + seqRow).html();
}

function grid_vendedor_comision_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_comision" + seqRow).html(newValue);
}

function grid_vendedor_observaciones_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_observaciones" + seqRow).html();
}

function grid_vendedor_observaciones_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_observaciones" + seqRow).html(newValue);
}

function grid_vendedor_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_vendedor" == field) {
    return grid_vendedor_id_vendedor_getValue(seqRow);
  }
  if ("vendedor" == field) {
    return grid_vendedor_vendedor_getValue(seqRow);
  }
  if ("comision" == field) {
    return grid_vendedor_comision_getValue(seqRow);
  }
  if ("observaciones" == field) {
    return grid_vendedor_observaciones_getValue(seqRow);
  }
}

function grid_vendedor_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_vendedor" == field) {
    grid_vendedor_id_vendedor_setValue(newValue, seqRow);
  }
  if ("vendedor" == field) {
    grid_vendedor_vendedor_setValue(newValue, seqRow);
  }
  if ("comision" == field) {
    grid_vendedor_comision_setValue(newValue, seqRow);
  }
  if ("observaciones" == field) {
    grid_vendedor_observaciones_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_vendedor').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_vendedor').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_vendedor').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_vendedor').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_vendedor').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_vendedor').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_vendedor').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_vendedor').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_vendedor').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_vendedor').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_vendedor').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_vendedor').style.width  = '0px';
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
