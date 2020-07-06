
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
  $('#id_sc_field_id_depositos' + iSeqRow).bind('blur', function() { sc_form_depositos_id_depositos_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_depositos_id_depositos_onfocus(this, iSeqRow) });
  $('#id_sc_field_deposito' + iSeqRow).bind('blur', function() { sc_form_depositos_deposito_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_depositos_deposito_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_depositos_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_depositos_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_postal' + iSeqRow).bind('blur', function() { sc_form_depositos_cod_postal_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_depositos_cod_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_localidad' + iSeqRow).bind('blur', function() { sc_form_depositos_localidad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_depositos_localidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia' + iSeqRow).bind('blur', function() { sc_form_depositos_provincia_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_depositos_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_depositos_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_depositos_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_responsable' + iSeqRow).bind('blur', function() { sc_form_depositos_responsable_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_depositos_responsable_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_depositos_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_depositos_observaciones_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_depositos_id_depositos_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_id_depositos();
  scCssBlur(oThis);
}

function sc_form_depositos_id_depositos_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_deposito_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_deposito();
  scCssBlur(oThis);
}

function sc_form_depositos_deposito_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_depositos_direccion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_cod_postal_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_cod_postal();
  scCssBlur(oThis);
}

function sc_form_depositos_cod_postal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_localidad_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_localidad();
  scCssBlur(oThis);
}

function sc_form_depositos_localidad_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_provincia();
  scCssBlur(oThis);
}

function sc_form_depositos_provincia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_depositos_sc_field_0_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_responsable_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_responsable();
  scCssBlur(oThis);
}

function sc_form_depositos_responsable_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_depositos_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_depositos_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_depositos_observaciones_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

