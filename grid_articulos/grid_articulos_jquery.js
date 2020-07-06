function grid_articulos_codigo_barra_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_codigo_barra" + seqRow).html();
}

function grid_articulos_codigo_barra_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_codigo_barra" + seqRow).html(newValue);
}

function grid_articulos_descripcion_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_descripcion" + seqRow).html();
}

function grid_articulos_descripcion_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_descripcion" + seqRow).html(newValue);
}

function grid_articulos_unidad_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_unidad" + seqRow).html();
}

function grid_articulos_unidad_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_unidad" + seqRow).html(newValue);
}

function grid_articulos_rubro_id_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_rubro_id" + seqRow).html();
}

function grid_articulos_rubro_id_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_rubro_id" + seqRow).html(newValue);
}

function grid_articulos_costo_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_costo" + seqRow).html();
}

function grid_articulos_costo_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_costo" + seqRow).html(newValue);
}

function grid_articulos_coeficiente_ctdo_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_coeficiente_ctdo" + seqRow).html();
}

function grid_articulos_coeficiente_ctdo_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_coeficiente_ctdo" + seqRow).html(newValue);
}

function grid_articulos_precio_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_precio" + seqRow).html();
}

function grid_articulos_precio_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_precio" + seqRow).html(newValue);
}

function grid_articulos_iva_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_iva" + seqRow).html();
}

function grid_articulos_iva_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_iva" + seqRow).html(newValue);
}

function grid_articulos_stock_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_stock" + seqRow).html();
}

function grid_articulos_stock_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_stock" + seqRow).html(newValue);
}

function grid_articulos_deposito_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_deposito" + seqRow).html();
}

function grid_articulos_deposito_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_deposito" + seqRow).html(newValue);
}

function grid_articulos_activo_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_activo" + seqRow).html();
}

function grid_articulos_activo_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_activo" + seqRow).html(newValue);
}

function grid_articulos_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("codigo_barra" == field) {
    return grid_articulos_codigo_barra_getValue(seqRow);
  }
  if ("descripcion" == field) {
    return grid_articulos_descripcion_getValue(seqRow);
  }
  if ("unidad" == field) {
    return grid_articulos_unidad_getValue(seqRow);
  }
  if ("rubro_id" == field) {
    return grid_articulos_rubro_id_getValue(seqRow);
  }
  if ("costo" == field) {
    return grid_articulos_costo_getValue(seqRow);
  }
  if ("coeficiente_ctdo" == field) {
    return grid_articulos_coeficiente_ctdo_getValue(seqRow);
  }
  if ("precio" == field) {
    return grid_articulos_precio_getValue(seqRow);
  }
  if ("iva" == field) {
    return grid_articulos_iva_getValue(seqRow);
  }
  if ("stock" == field) {
    return grid_articulos_stock_getValue(seqRow);
  }
  if ("deposito" == field) {
    return grid_articulos_deposito_getValue(seqRow);
  }
  if ("activo" == field) {
    return grid_articulos_activo_getValue(seqRow);
  }
}

function grid_articulos_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("codigo_barra" == field) {
    grid_articulos_codigo_barra_setValue(newValue, seqRow);
  }
  if ("descripcion" == field) {
    grid_articulos_descripcion_setValue(newValue, seqRow);
  }
  if ("unidad" == field) {
    grid_articulos_unidad_setValue(newValue, seqRow);
  }
  if ("rubro_id" == field) {
    grid_articulos_rubro_id_setValue(newValue, seqRow);
  }
  if ("costo" == field) {
    grid_articulos_costo_setValue(newValue, seqRow);
  }
  if ("coeficiente_ctdo" == field) {
    grid_articulos_coeficiente_ctdo_setValue(newValue, seqRow);
  }
  if ("precio" == field) {
    grid_articulos_precio_setValue(newValue, seqRow);
  }
  if ("iva" == field) {
    grid_articulos_iva_setValue(newValue, seqRow);
  }
  if ("stock" == field) {
    grid_articulos_stock_setValue(newValue, seqRow);
  }
  if ("deposito" == field) {
    grid_articulos_deposito_setValue(newValue, seqRow);
  }
  if ("activo" == field) {
    grid_articulos_activo_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_articulos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_articulos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_articulos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_articulos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_articulos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_articulos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_articulos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_articulos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_articulos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_articulos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_articulos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_articulos').style.width  = '0px';
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
