function grid_proveedores_razon_social_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_razon_social" + seqRow).html();
}

function grid_proveedores_razon_social_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_razon_social" + seqRow).html(newValue);
}

function grid_proveedores_cuit_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_cuit" + seqRow).html();
}

function grid_proveedores_cuit_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_cuit" + seqRow).html(newValue);
}

function grid_proveedores_ing_bruto_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_ing_bruto" + seqRow).html();
}

function grid_proveedores_ing_bruto_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_ing_bruto" + seqRow).html(newValue);
}

function grid_proveedores_direccion_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_direccion" + seqRow).html();
}

function grid_proveedores_direccion_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_direccion" + seqRow).html(newValue);
}

function grid_proveedores_cod_postal_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_cod_postal" + seqRow).html();
}

function grid_proveedores_cod_postal_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_cod_postal" + seqRow).html(newValue);
}

function grid_proveedores_localidad_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_localidad" + seqRow).html();
}

function grid_proveedores_localidad_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_localidad" + seqRow).html(newValue);
}

function grid_proveedores_provincia_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_provincia" + seqRow).html();
}

function grid_proveedores_provincia_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_provincia" + seqRow).html(newValue);
}

function grid_proveedores_telefono_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_telefono" + seqRow).html();
}

function grid_proveedores_telefono_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_telefono" + seqRow).html(newValue);
}

function grid_proveedores_e_mail_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_e_mail" + seqRow).html();
}

function grid_proveedores_e_mail_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_e_mail" + seqRow).html(newValue);
}

function grid_proveedores_contacto_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_contacto" + seqRow).html();
}

function grid_proveedores_contacto_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_contacto" + seqRow).html(newValue);
}

function grid_proveedores_activo_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_activo" + seqRow).html();
}

function grid_proveedores_activo_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_activo" + seqRow).html(newValue);
}

function grid_proveedores_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("razon_social" == field) {
    return grid_proveedores_razon_social_getValue(seqRow);
  }
  if ("cuit" == field) {
    return grid_proveedores_cuit_getValue(seqRow);
  }
  if ("ing_bruto" == field) {
    return grid_proveedores_ing_bruto_getValue(seqRow);
  }
  if ("direccion" == field) {
    return grid_proveedores_direccion_getValue(seqRow);
  }
  if ("cod_postal" == field) {
    return grid_proveedores_cod_postal_getValue(seqRow);
  }
  if ("localidad" == field) {
    return grid_proveedores_localidad_getValue(seqRow);
  }
  if ("provincia" == field) {
    return grid_proveedores_provincia_getValue(seqRow);
  }
  if ("telefono" == field) {
    return grid_proveedores_telefono_getValue(seqRow);
  }
  if ("e_mail" == field) {
    return grid_proveedores_e_mail_getValue(seqRow);
  }
  if ("contacto" == field) {
    return grid_proveedores_contacto_getValue(seqRow);
  }
  if ("activo" == field) {
    return grid_proveedores_activo_getValue(seqRow);
  }
}

function grid_proveedores_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("razon_social" == field) {
    grid_proveedores_razon_social_setValue(newValue, seqRow);
  }
  if ("cuit" == field) {
    grid_proveedores_cuit_setValue(newValue, seqRow);
  }
  if ("ing_bruto" == field) {
    grid_proveedores_ing_bruto_setValue(newValue, seqRow);
  }
  if ("direccion" == field) {
    grid_proveedores_direccion_setValue(newValue, seqRow);
  }
  if ("cod_postal" == field) {
    grid_proveedores_cod_postal_setValue(newValue, seqRow);
  }
  if ("localidad" == field) {
    grid_proveedores_localidad_setValue(newValue, seqRow);
  }
  if ("provincia" == field) {
    grid_proveedores_provincia_setValue(newValue, seqRow);
  }
  if ("telefono" == field) {
    grid_proveedores_telefono_setValue(newValue, seqRow);
  }
  if ("e_mail" == field) {
    grid_proveedores_e_mail_setValue(newValue, seqRow);
  }
  if ("contacto" == field) {
    grid_proveedores_contacto_setValue(newValue, seqRow);
  }
  if ("activo" == field) {
    grid_proveedores_activo_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_proveedores').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_proveedores').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_proveedores').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_proveedores').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_proveedores').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_proveedores').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_proveedores').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_proveedores').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_proveedores').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_proveedores').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_proveedores').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_proveedores').style.width  = '0px';
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
