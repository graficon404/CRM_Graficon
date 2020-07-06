
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
  $('#id_sc_field_id_documento' + iSeqRow).bind('blur', function() { sc_form_documentos_id_documento_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_documentos_id_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_decripcion_doc' + iSeqRow).bind('blur', function() { sc_form_documentos_decripcion_doc_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_documentos_decripcion_doc_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero' + iSeqRow).bind('blur', function() { sc_form_documentos_numero_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_documentos_numero_onfocus(this, iSeqRow) });
  $('#id_sc_field_punto_vta' + iSeqRow).bind('blur', function() { sc_form_documentos_punto_vta_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_documentos_punto_vta_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_filas' + iSeqRow).bind('blur', function() { sc_form_documentos_cantidad_filas_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_documentos_cantidad_filas_onfocus(this, iSeqRow) });
  $('#id_sc_field_control_stock' + iSeqRow).bind('blur', function() { sc_form_documentos_control_stock_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_documentos_control_stock_onfocus(this, iSeqRow) });
  $('#id_sc_field_graba_caja' + iSeqRow).bind('blur', function() { sc_form_documentos_graba_caja_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_documentos_graba_caja_onfocus(this, iSeqRow) });
  $('#id_sc_field_graba_cliente_ctacte' + iSeqRow).bind('blur', function() { sc_form_documentos_graba_cliente_ctacte_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_documentos_graba_cliente_ctacte_onfocus(this, iSeqRow) });
  $('#id_sc_field_graba_prov_ctacte' + iSeqRow).bind('blur', function() { sc_form_documentos_graba_prov_ctacte_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_documentos_graba_prov_ctacte_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_documentos_id_documento_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_id_documento();
  scCssBlur(oThis);
}

function sc_form_documentos_id_documento_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_decripcion_doc_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_decripcion_doc();
  scCssBlur(oThis);
}

function sc_form_documentos_decripcion_doc_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_numero_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_numero();
  scCssBlur(oThis);
}

function sc_form_documentos_numero_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_punto_vta_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_punto_vta();
  scCssBlur(oThis);
}

function sc_form_documentos_punto_vta_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_cantidad_filas_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_cantidad_filas();
  scCssBlur(oThis);
}

function sc_form_documentos_cantidad_filas_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_control_stock_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_control_stock();
  scCssBlur(oThis);
}

function sc_form_documentos_control_stock_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_graba_caja_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_graba_caja();
  scCssBlur(oThis);
}

function sc_form_documentos_graba_caja_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_graba_cliente_ctacte_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_graba_cliente_ctacte();
  scCssBlur(oThis);
}

function sc_form_documentos_graba_cliente_ctacte_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_documentos_graba_prov_ctacte_onblur(oThis, iSeqRow) {
  do_ajax_form_documentos_validate_graba_prov_ctacte();
  scCssBlur(oThis);
}

function sc_form_documentos_graba_prov_ctacte_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

