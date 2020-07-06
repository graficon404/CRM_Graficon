function grid_documentos_id_documento_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_id_documento" + seqRow).html();
}

function grid_documentos_id_documento_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_id_documento" + seqRow).html(newValue);
}

function grid_documentos_decripcion_doc_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_decripcion_doc" + seqRow).html();
}

function grid_documentos_decripcion_doc_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_decripcion_doc" + seqRow).html(newValue);
}

function grid_documentos_numero_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_numero" + seqRow).html();
}

function grid_documentos_numero_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_numero" + seqRow).html(newValue);
}

function grid_documentos_punto_vta_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_punto_vta" + seqRow).html();
}

function grid_documentos_punto_vta_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_punto_vta" + seqRow).html(newValue);
}

function grid_documentos_cantidad_filas_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_cantidad_filas" + seqRow).html();
}

function grid_documentos_cantidad_filas_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_cantidad_filas" + seqRow).html(newValue);
}

function grid_documentos_control_stock_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_control_stock" + seqRow).html();
}

function grid_documentos_control_stock_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_control_stock" + seqRow).html(newValue);
}

function grid_documentos_graba_caja_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_graba_caja" + seqRow).html();
}

function grid_documentos_graba_caja_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_graba_caja" + seqRow).html(newValue);
}

function grid_documentos_graba_cliente_ctacte_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_graba_cliente_ctacte" + seqRow).html();
}

function grid_documentos_graba_cliente_ctacte_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_graba_cliente_ctacte" + seqRow).html(newValue);
}

function grid_documentos_graba_prov_ctacte_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_graba_prov_ctacte" + seqRow).html();
}

function grid_documentos_graba_prov_ctacte_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_graba_prov_ctacte" + seqRow).html(newValue);
}

function grid_documentos_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_documento" == field) {
    return grid_documentos_id_documento_getValue(seqRow);
  }
  if ("decripcion_doc" == field) {
    return grid_documentos_decripcion_doc_getValue(seqRow);
  }
  if ("numero" == field) {
    return grid_documentos_numero_getValue(seqRow);
  }
  if ("punto_vta" == field) {
    return grid_documentos_punto_vta_getValue(seqRow);
  }
  if ("cantidad_filas" == field) {
    return grid_documentos_cantidad_filas_getValue(seqRow);
  }
  if ("control_stock" == field) {
    return grid_documentos_control_stock_getValue(seqRow);
  }
  if ("graba_caja" == field) {
    return grid_documentos_graba_caja_getValue(seqRow);
  }
  if ("graba_cliente_ctacte" == field) {
    return grid_documentos_graba_cliente_ctacte_getValue(seqRow);
  }
  if ("graba_prov_ctacte" == field) {
    return grid_documentos_graba_prov_ctacte_getValue(seqRow);
  }
}

function grid_documentos_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_documento" == field) {
    grid_documentos_id_documento_setValue(newValue, seqRow);
  }
  if ("decripcion_doc" == field) {
    grid_documentos_decripcion_doc_setValue(newValue, seqRow);
  }
  if ("numero" == field) {
    grid_documentos_numero_setValue(newValue, seqRow);
  }
  if ("punto_vta" == field) {
    grid_documentos_punto_vta_setValue(newValue, seqRow);
  }
  if ("cantidad_filas" == field) {
    grid_documentos_cantidad_filas_setValue(newValue, seqRow);
  }
  if ("control_stock" == field) {
    grid_documentos_control_stock_setValue(newValue, seqRow);
  }
  if ("graba_caja" == field) {
    grid_documentos_graba_caja_setValue(newValue, seqRow);
  }
  if ("graba_cliente_ctacte" == field) {
    grid_documentos_graba_cliente_ctacte_setValue(newValue, seqRow);
  }
  if ("graba_prov_ctacte" == field) {
    grid_documentos_graba_prov_ctacte_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_documentos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_documentos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_documentos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_documentos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_documentos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_documentos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_documentos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_documentos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_documentos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_documentos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_documentos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_documentos').style.width  = '0px';
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
