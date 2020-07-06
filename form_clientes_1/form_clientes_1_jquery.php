
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (0 < $oField.length && 0 < $oField[0].offsetHeight && 0 < $oField[0].offsetWidth && !$oField[0].disabled) {
    $oField[0].focus();
  }
} // scFocusField

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_cuit' + iSeqRow).bind('blur', function() { sc_form_clientes_1_cuit_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_clientes_1_cuit_onfocus(this, iSeqRow) });
  $('#id_sc_field_razon_social' + iSeqRow).bind('blur', function() { sc_form_clientes_1_razon_social_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clientes_1_razon_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_titular' + iSeqRow).bind('blur', function() { sc_form_clientes_1_titular_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clientes_1_titular_onfocus(this, iSeqRow) });
  $('#id_sc_field_domicilio' + iSeqRow).bind('blur', function() { sc_form_clientes_1_domicilio_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_1_domicilio_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_postal' + iSeqRow).bind('blur', function() { sc_form_clientes_1_codigo_postal_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clientes_1_codigo_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_localidad' + iSeqRow).bind('blur', function() { sc_form_clientes_1_localidad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_1_localidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia' + iSeqRow).bind('blur', function() { sc_form_clientes_1_provincia_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_1_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefonos' + iSeqRow).bind('blur', function() { sc_form_clientes_1_telefonos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_1_telefonos_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctacte' + iSeqRow).bind('blur', function() { sc_form_clientes_1_ctacte_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_clientes_1_ctacte_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_clientes_1_cuit_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_cuit();
  scCssBlur(oThis);
}

function sc_form_clientes_1_cuit_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_razon_social_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_razon_social();
  scCssBlur(oThis);
}

function sc_form_clientes_1_razon_social_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_titular_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_titular();
  scCssBlur(oThis);
}

function sc_form_clientes_1_titular_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_domicilio_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_domicilio();
  scCssBlur(oThis);
}

function sc_form_clientes_1_domicilio_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_codigo_postal_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_codigo_postal();
  scCssBlur(oThis);
}

function sc_form_clientes_1_codigo_postal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_localidad_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_localidad();
  scCssBlur(oThis);
}

function sc_form_clientes_1_localidad_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_provincia();
  scCssBlur(oThis);
}

function sc_form_clientes_1_provincia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_telefonos_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_telefonos();
  scCssBlur(oThis);
}

function sc_form_clientes_1_telefonos_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_1_ctacte_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_1_validate_ctacte();
  scCssBlur(oThis);
}

function sc_form_clientes_1_ctacte_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

