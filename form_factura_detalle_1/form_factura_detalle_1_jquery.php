
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
  $('#id_sc_field_articulo_id_' + iSeqRow).bind('blur', function() { sc_form_factura_detalle_1_articulo_id__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_factura_detalle_1_articulo_id__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_factura_detalle_1_articulo_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_importe_' + iSeqRow).bind('blur', function() { sc_form_factura_detalle_1_importe__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_factura_detalle_1_importe__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_factura_detalle_1_importe__onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_' + iSeqRow).bind('blur', function() { sc_form_factura_detalle_1_cantidad__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_factura_detalle_1_cantidad__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_factura_detalle_1_cantidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_precio_' + iSeqRow).bind('blur', function() { sc_form_factura_detalle_1_precio__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_factura_detalle_1_precio__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_factura_detalle_1_precio__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad_' + iSeqRow).bind('blur', function() { sc_form_factura_detalle_1_unidad__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_factura_detalle_1_unidad__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_factura_detalle_1_unidad__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_factura_detalle_1_articulo_id__onblur(oThis, iSeqRow) {
  do_ajax_form_factura_detalle_1_validate_articulo_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_factura_detalle_1_event_articulo_id__onblur(iSeqRow);
}

function sc_form_factura_detalle_1_articulo_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_factura_detalle_1_articulo_id__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_factura_detalle_1_importe__onblur(oThis, iSeqRow) {
  do_ajax_form_factura_detalle_1_validate_importe_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_factura_detalle_1_importe__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_factura_detalle_1_importe__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_factura_detalle_1_cantidad__onblur(oThis, iSeqRow) {
  do_ajax_form_factura_detalle_1_validate_cantidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_factura_detalle_1_event_cantidad__onblur(iSeqRow);
}

function sc_form_factura_detalle_1_cantidad__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_factura_detalle_1_cantidad__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_factura_detalle_1_precio__onblur(oThis, iSeqRow) {
  do_ajax_form_factura_detalle_1_validate_precio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_factura_detalle_1_precio__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_factura_detalle_1_precio__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_factura_detalle_1_unidad__onblur(oThis, iSeqRow) {
  do_ajax_form_factura_detalle_1_validate_unidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_factura_detalle_1_unidad__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_factura_detalle_1_unidad__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

