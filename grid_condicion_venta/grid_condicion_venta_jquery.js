function grid_condicion_venta_id_condicion_vta_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_id_condicion_vta" + seqRow).html();
}

function grid_condicion_venta_id_condicion_vta_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_id_condicion_vta" + seqRow).html(newValue);
}

function grid_condicion_venta_decripcion_vta_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_decripcion_vta" + seqRow).html();
}

function grid_condicion_venta_decripcion_vta_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_decripcion_vta" + seqRow).html(newValue);
}

function grid_condicion_venta_entrega_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_entrega" + seqRow).html();
}

function grid_condicion_venta_entrega_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_entrega" + seqRow).html(newValue);
}

function grid_condicion_venta_vecimiento_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_vecimiento" + seqRow).html();
}

function grid_condicion_venta_vecimiento_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_vecimiento" + seqRow).html(newValue);
}

function grid_condicion_venta_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_condicion_vta" == field) {
    return grid_condicion_venta_id_condicion_vta_getValue(seqRow);
  }
  if ("decripcion_vta" == field) {
    return grid_condicion_venta_decripcion_vta_getValue(seqRow);
  }
  if ("entrega" == field) {
    return grid_condicion_venta_entrega_getValue(seqRow);
  }
  if ("vecimiento" == field) {
    return grid_condicion_venta_vecimiento_getValue(seqRow);
  }
}

function grid_condicion_venta_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_condicion_vta" == field) {
    grid_condicion_venta_id_condicion_vta_setValue(newValue, seqRow);
  }
  if ("decripcion_vta" == field) {
    grid_condicion_venta_decripcion_vta_setValue(newValue, seqRow);
  }
  if ("entrega" == field) {
    grid_condicion_venta_entrega_setValue(newValue, seqRow);
  }
  if ("vecimiento" == field) {
    grid_condicion_venta_vecimiento_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_condicion_venta').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_condicion_venta').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_condicion_venta').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_condicion_venta').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_condicion_venta').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_condicion_venta').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_condicion_venta').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_condicion_venta').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_condicion_venta').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_condicion_venta').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_condicion_venta').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_condicion_venta').style.width  = '0px';
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
