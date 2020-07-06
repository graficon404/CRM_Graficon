
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
  $('#id_sc_field_id_vendedor' + iSeqRow).bind('blur', function() { sc_form_vendedor_id_vendedor_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_vendedor_id_vendedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendedor' + iSeqRow).bind('blur', function() { sc_form_vendedor_vendedor_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_vendedor_vendedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_comision' + iSeqRow).bind('blur', function() { sc_form_vendedor_comision_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_vendedor_comision_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_vendedor_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_vendedor_observaciones_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_vendedor_id_vendedor_onblur(oThis, iSeqRow) {
  do_ajax_form_vendedor_validate_id_vendedor();
  scCssBlur(oThis);
}

function sc_form_vendedor_id_vendedor_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_vendedor_vendedor_onblur(oThis, iSeqRow) {
  do_ajax_form_vendedor_validate_vendedor();
  scCssBlur(oThis);
}

function sc_form_vendedor_vendedor_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_vendedor_comision_onblur(oThis, iSeqRow) {
  do_ajax_form_vendedor_validate_comision();
  scCssBlur(oThis);
}

function sc_form_vendedor_comision_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_vendedor_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_vendedor_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_vendedor_observaciones_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

