function grid_clientes_cuit_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_cuit" + seqRow).html();
}

function grid_clientes_cuit_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_cuit" + seqRow).html(newValue);
}

function grid_clientes_razon_social_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_razon_social" + seqRow).html();
}

function grid_clientes_razon_social_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_razon_social" + seqRow).html(newValue);
}

function grid_clientes_titular_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_titular" + seqRow).html();
}

function grid_clientes_titular_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_titular" + seqRow).html(newValue);
}

function grid_clientes_domicilio_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_domicilio" + seqRow).html();
}

function grid_clientes_domicilio_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_domicilio" + seqRow).html(newValue);
}

function grid_clientes_codigo_postal_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_codigo_postal" + seqRow).html();
}

function grid_clientes_codigo_postal_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_codigo_postal" + seqRow).html(newValue);
}

function grid_clientes_localidad_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_localidad" + seqRow).html();
}

function grid_clientes_localidad_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_localidad" + seqRow).html(newValue);
}

function grid_clientes_provincia_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_provincia" + seqRow).html();
}

function grid_clientes_provincia_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_provincia" + seqRow).html(newValue);
}

function grid_clientes_telefonos_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_telefonos" + seqRow).html();
}

function grid_clientes_telefonos_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_telefonos" + seqRow).html(newValue);
}

function grid_clientes_activo_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_activo" + seqRow).html();
}

function grid_clientes_activo_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_activo" + seqRow).html(newValue);
}

function grid_clientes_contacto_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_contacto" + seqRow).html();
}

function grid_clientes_contacto_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_contacto" + seqRow).html(newValue);
}

function grid_clientes_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("cuit" == field) {
    return grid_clientes_cuit_getValue(seqRow);
  }
  if ("razon_social" == field) {
    return grid_clientes_razon_social_getValue(seqRow);
  }
  if ("titular" == field) {
    return grid_clientes_titular_getValue(seqRow);
  }
  if ("domicilio" == field) {
    return grid_clientes_domicilio_getValue(seqRow);
  }
  if ("codigo_postal" == field) {
    return grid_clientes_codigo_postal_getValue(seqRow);
  }
  if ("localidad" == field) {
    return grid_clientes_localidad_getValue(seqRow);
  }
  if ("provincia" == field) {
    return grid_clientes_provincia_getValue(seqRow);
  }
  if ("telefonos" == field) {
    return grid_clientes_telefonos_getValue(seqRow);
  }
  if ("activo" == field) {
    return grid_clientes_activo_getValue(seqRow);
  }
  if ("contacto" == field) {
    return grid_clientes_contacto_getValue(seqRow);
  }
}

function grid_clientes_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("cuit" == field) {
    grid_clientes_cuit_setValue(newValue, seqRow);
  }
  if ("razon_social" == field) {
    grid_clientes_razon_social_setValue(newValue, seqRow);
  }
  if ("titular" == field) {
    grid_clientes_titular_setValue(newValue, seqRow);
  }
  if ("domicilio" == field) {
    grid_clientes_domicilio_setValue(newValue, seqRow);
  }
  if ("codigo_postal" == field) {
    grid_clientes_codigo_postal_setValue(newValue, seqRow);
  }
  if ("localidad" == field) {
    grid_clientes_localidad_setValue(newValue, seqRow);
  }
  if ("provincia" == field) {
    grid_clientes_provincia_setValue(newValue, seqRow);
  }
  if ("telefonos" == field) {
    grid_clientes_telefonos_setValue(newValue, seqRow);
  }
  if ("activo" == field) {
    grid_clientes_activo_setValue(newValue, seqRow);
  }
  if ("contacto" == field) {
    grid_clientes_contacto_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_clientes').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_clientes').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_clientes').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_clientes').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_clientes').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_clientes').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_clientes').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_clientes').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_clientes').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_clientes').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_clientes').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_clientes').style.width  = '0px';
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
