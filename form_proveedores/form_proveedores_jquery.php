
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
  $('#id_sc_field_id_proveedores' + iSeqRow).bind('blur', function() { sc_form_proveedores_id_proveedores_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_proveedores_id_proveedores_onfocus(this, iSeqRow) });
  $('#id_sc_field_razon_social' + iSeqRow).bind('blur', function() { sc_form_proveedores_razon_social_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_proveedores_razon_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuit' + iSeqRow).bind('blur', function() { sc_form_proveedores_cuit_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_proveedores_cuit_onfocus(this, iSeqRow) });
  $('#id_sc_field_ing_bruto' + iSeqRow).bind('blur', function() { sc_form_proveedores_ing_bruto_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_proveedores_ing_bruto_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_proveedores_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_proveedores_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_postal' + iSeqRow).bind('blur', function() { sc_form_proveedores_cod_postal_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_proveedores_cod_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_localidad' + iSeqRow).bind('blur', function() { sc_form_proveedores_localidad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_proveedores_localidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia' + iSeqRow).bind('blur', function() { sc_form_proveedores_provincia_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_proveedores_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_form_proveedores_telefono_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_proveedores_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_e_mail' + iSeqRow).bind('blur', function() { sc_form_proveedores_e_mail_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_proveedores_e_mail_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto' + iSeqRow).bind('blur', function() { sc_form_proveedores_contacto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_proveedores_contacto_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_proveedores_activo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_proveedores_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_proveedores_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_proveedores_observaciones_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_proveedores_id_proveedores_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_id_proveedores();
  scCssBlur(oThis);
}

function sc_form_proveedores_id_proveedores_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_razon_social_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_razon_social();
  scCssBlur(oThis);
}

function sc_form_proveedores_razon_social_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_cuit_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_cuit();
  scCssBlur(oThis);
}

function sc_form_proveedores_cuit_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_ing_bruto_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_ing_bruto();
  scCssBlur(oThis);
}

function sc_form_proveedores_ing_bruto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_proveedores_direccion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_cod_postal_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_cod_postal();
  scCssBlur(oThis);
}

function sc_form_proveedores_cod_postal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_localidad_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_localidad();
  scCssBlur(oThis);
}

function sc_form_proveedores_localidad_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_provincia();
  scCssBlur(oThis);
}

function sc_form_proveedores_provincia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_telefono_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_telefono();
  scCssBlur(oThis);
}

function sc_form_proveedores_telefono_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_e_mail_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_e_mail();
  scCssBlur(oThis);
}

function sc_form_proveedores_e_mail_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_contacto_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_contacto();
  scCssBlur(oThis);
}

function sc_form_proveedores_contacto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_activo();
  scCssBlur(oThis);
}

function sc_form_proveedores_activo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proveedores_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_proveedores_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_proveedores_observaciones_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

