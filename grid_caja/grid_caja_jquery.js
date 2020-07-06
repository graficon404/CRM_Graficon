function grid_caja_fecha_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_fecha" + seqRow).html();
}

function grid_caja_fecha_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_fecha" + seqRow).html(newValue);
}

function grid_caja_detalle_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_detalle" + seqRow).html();
}

function grid_caja_detalle_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_detalle" + seqRow).html(newValue);
}

function grid_caja_vendedor_id_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_vendedor_id" + seqRow).html();
}

function grid_caja_vendedor_id_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_vendedor_id" + seqRow).html(newValue);
}

function grid_caja_importe_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_importe" + seqRow).html();
}

function grid_caja_importe_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_importe" + seqRow).html(newValue);
}

function grid_caja_total_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_total" + seqRow).html();
}

function grid_caja_total_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_total" + seqRow).html(newValue);
}

function grid_caja_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("fecha" == field) {
    return grid_caja_fecha_getValue(seqRow);
  }
  if ("detalle" == field) {
    return grid_caja_detalle_getValue(seqRow);
  }
  if ("vendedor_id" == field) {
    return grid_caja_vendedor_id_getValue(seqRow);
  }
  if ("importe" == field) {
    return grid_caja_importe_getValue(seqRow);
  }
  if ("total" == field) {
    return grid_caja_total_getValue(seqRow);
  }
}

function grid_caja_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("fecha" == field) {
    grid_caja_fecha_setValue(newValue, seqRow);
  }
  if ("detalle" == field) {
    grid_caja_detalle_setValue(newValue, seqRow);
  }
  if ("vendedor_id" == field) {
    grid_caja_vendedor_id_setValue(newValue, seqRow);
  }
  if ("importe" == field) {
    grid_caja_importe_setValue(newValue, seqRow);
  }
  if ("total" == field) {
    grid_caja_total_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_caja').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_caja').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_caja').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_caja').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_caja').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_caja').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_caja').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_caja').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_caja').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_caja').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_caja').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_caja').style.width  = '0px';
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
