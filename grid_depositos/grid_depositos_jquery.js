function grid_depositos_id_depositos_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_id_depositos" + seqRow).html();
}

function grid_depositos_id_depositos_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_id_depositos" + seqRow).html(newValue);
}

function grid_depositos_deposito_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_deposito" + seqRow).html();
}

function grid_depositos_deposito_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_deposito" + seqRow).html(newValue);
}

function grid_depositos_direccion_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_direccion" + seqRow).html();
}

function grid_depositos_direccion_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_direccion" + seqRow).html(newValue);
}

function grid_depositos_cod_postal_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_cod_postal" + seqRow).html();
}

function grid_depositos_cod_postal_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_cod_postal" + seqRow).html(newValue);
}

function grid_depositos_localidad_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_localidad" + seqRow).html();
}

function grid_depositos_localidad_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_localidad" + seqRow).html(newValue);
}

function grid_depositos_provincia_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_provincia" + seqRow).html();
}

function grid_depositos_provincia_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_provincia" + seqRow).html(newValue);
}

function grid_depositos_responsable_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_responsable" + seqRow).html();
}

function grid_depositos_responsable_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_responsable" + seqRow).html(newValue);
}

function grid_depositos_sc_field_0_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_sc_field_0" + seqRow).html();
}

function grid_depositos_sc_field_0_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_sc_field_0" + seqRow).html(newValue);
}

function grid_depositos_observaciones_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_observaciones" + seqRow).html();
}

function grid_depositos_observaciones_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_observaciones" + seqRow).html(newValue);
}

function grid_depositos_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_depositos" == field) {
    return grid_depositos_id_depositos_getValue(seqRow);
  }
  if ("deposito" == field) {
    return grid_depositos_deposito_getValue(seqRow);
  }
  if ("direccion" == field) {
    return grid_depositos_direccion_getValue(seqRow);
  }
  if ("cod_postal" == field) {
    return grid_depositos_cod_postal_getValue(seqRow);
  }
  if ("localidad" == field) {
    return grid_depositos_localidad_getValue(seqRow);
  }
  if ("provincia" == field) {
    return grid_depositos_provincia_getValue(seqRow);
  }
  if ("responsable" == field) {
    return grid_depositos_responsable_getValue(seqRow);
  }
  if ("sc_field_0" == field) {
    return grid_depositos_sc_field_0_getValue(seqRow);
  }
  if ("observaciones" == field) {
    return grid_depositos_observaciones_getValue(seqRow);
  }
}

function grid_depositos_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("id_depositos" == field) {
    grid_depositos_id_depositos_setValue(newValue, seqRow);
  }
  if ("deposito" == field) {
    grid_depositos_deposito_setValue(newValue, seqRow);
  }
  if ("direccion" == field) {
    grid_depositos_direccion_setValue(newValue, seqRow);
  }
  if ("cod_postal" == field) {
    grid_depositos_cod_postal_setValue(newValue, seqRow);
  }
  if ("localidad" == field) {
    grid_depositos_localidad_setValue(newValue, seqRow);
  }
  if ("provincia" == field) {
    grid_depositos_provincia_setValue(newValue, seqRow);
  }
  if ("responsable" == field) {
    grid_depositos_responsable_setValue(newValue, seqRow);
  }
  if ("sc_field_0" == field) {
    grid_depositos_sc_field_0_setValue(newValue, seqRow);
  }
  if ("observaciones" == field) {
    grid_depositos_observaciones_setValue(newValue, seqRow);
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
        document.getElementById('nmsc_iframe_liga_A_grid_depositos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_depositos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_depositos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_depositos').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_depositos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_depositos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_depositos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_depositos').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_depositos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_depositos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_depositos').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_depositos').style.width  = '0px';
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
