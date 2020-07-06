function grid_factura_numero_fac_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_numero_fac" + seqRow).html();
}

function grid_factura_numero_fac_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_numero_fac" + seqRow).html(newValue);
}

function grid_factura_fecha_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_fecha" + seqRow).html();
}

function grid_factura_fecha_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_fecha" + seqRow).html(newValue);
}

function grid_factura_cliente_id_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_cliente_id" + seqRow).html();
}

function grid_factura_cliente_id_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_cliente_id" + seqRow).html(newValue);
}

function grid_factura_vendedor_id_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_vendedor_id" + seqRow).html();
}

function grid_factura_vendedor_id_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_vendedor_id" + seqRow).html(newValue);
}

function grid_factura_forma_pago_id_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_forma_pago_id" + seqRow).html();
}

function grid_factura_forma_pago_id_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_forma_pago_id" + seqRow).html(newValue);
}

function grid_factura_condicion_vta_id_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_condicion_vta_id" + seqRow).html();
}

function grid_factura_condicion_vta_id_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_condicion_vta_id" + seqRow).html(newValue);
}

function grid_factura_remito_nro_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_remito_nro" + seqRow).html();
}

function grid_factura_remito_nro_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_remito_nro" + seqRow).html(newValue);
}

function grid_factura_pedido_nro_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_pedido_nro" + seqRow).html();
}

function grid_factura_pedido_nro_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_pedido_nro" + seqRow).html(newValue);
}

function grid_factura_subtotal_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_subtotal" + seqRow).html();
}

function grid_factura_subtotal_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_subtotal" + seqRow).html(newValue);
}

function grid_factura_descuento_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_descuento" + seqRow).html();
}

function grid_factura_descuento_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_descuento" + seqRow).html(newValue);
}

function grid_factura_iva_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_iva" + seqRow).html();
}

function grid_factura_iva_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_iva" + seqRow).html(newValue);
}

function grid_factura_total_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_total" + seqRow).html();
}

function grid_factura_total_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_total" + seqRow).html(newValue);
}

function grid_factura_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("numero_fac" == field) {
    return grid_factura_numero_fac_getValue(seqRow);
  }
  if ("fecha" == field) {
    return grid_factura_fecha_getValue(seqRow);
  }
  if ("cliente_id" == field) {
    return grid_factura_cliente_id_getValue(seqRow);
  }
  if ("vendedor_id" == field) {
    return grid_factura_vendedor_id_getValue(seqRow);
  }
  if ("forma_pago_id" == field) {
    return grid_factura_forma_pago_id_getValue(seqRow);
  }
  if ("condicion_vta_id" == field) {
    return grid_factura_condicion_vta_id_getValue(seqRow);
  }
  if ("remito_nro" == field) {
    return grid_factura_remito_nro_getValue(seqRow);
  }
  if ("pedido_nro" == field) {
    return grid_factura_pedido_nro_getValue(seqRow);
  }
  if ("subtotal" == field) {
    return grid_factura_subtotal_getValue(seqRow);
  }
  if ("descuento" == field) {
    return grid_factura_descuento_getValue(seqRow);
  }
  if ("iva" == field) {
    return grid_factura_iva_getValue(seqRow);
  }
  if ("total" == field) {
    return grid_factura_total_getValue(seqRow);
  }
}

function grid_factura_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("numero_fac" == field) {
    grid_factura_numero_fac_setValue(newValue, seqRow);
  }
  if ("fecha" == field) {
    grid_factura_fecha_setValue(newValue, seqRow);
  }
  if ("cliente_id" == field) {
    grid_factura_cliente_id_setValue(newValue, seqRow);
  }
  if ("vendedor_id" == field) {
    grid_factura_vendedor_id_setValue(newValue, seqRow);
  }
  if ("forma_pago_id" == field) {
    grid_factura_forma_pago_id_setValue(newValue, seqRow);
  }
  if ("condicion_vta_id" == field) {
    grid_factura_condicion_vta_id_setValue(newValue, seqRow);
  }
  if ("remito_nro" == field) {
    grid_factura_remito_nro_setValue(newValue, seqRow);
  }
  if ("pedido_nro" == field) {
    grid_factura_pedido_nro_setValue(newValue, seqRow);
  }
  if ("subtotal" == field) {
    grid_factura_subtotal_setValue(newValue, seqRow);
  }
  if ("descuento" == field) {
    grid_factura_descuento_setValue(newValue, seqRow);
  }
  if ("iva" == field) {
    grid_factura_iva_setValue(newValue, seqRow);
  }
  if ("total" == field) {
    grid_factura_total_setValue(newValue, seqRow);
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
