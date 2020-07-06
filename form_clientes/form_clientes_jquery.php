
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
  $('#id_sc_field_cuit' + iSeqRow).bind('blur', function() { sc_form_clientes_cuit_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_clientes_cuit_onfocus(this, iSeqRow) });
  $('#id_sc_field_razon_social' + iSeqRow).bind('blur', function() { sc_form_clientes_razon_social_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clientes_razon_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_titular' + iSeqRow).bind('blur', function() { sc_form_clientes_titular_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clientes_titular_onfocus(this, iSeqRow) });
  $('#id_sc_field_domicilio' + iSeqRow).bind('blur', function() { sc_form_clientes_domicilio_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_domicilio_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_postal' + iSeqRow).bind('blur', function() { sc_form_clientes_codigo_postal_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clientes_codigo_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_localidad' + iSeqRow).bind('blur', function() { sc_form_clientes_localidad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_localidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia' + iSeqRow).bind('blur', function() { sc_form_clientes_provincia_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefonos' + iSeqRow).bind('blur', function() { sc_form_clientes_telefonos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_telefonos_onfocus(this, iSeqRow) });
  $('#id_sc_field_fax' + iSeqRow).bind('blur', function() { sc_form_clientes_fax_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_clientes_fax_onfocus(this, iSeqRow) });
  $('#id_sc_field_e_mail' + iSeqRow).bind('blur', function() { sc_form_clientes_e_mail_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_clientes_e_mail_onfocus(this, iSeqRow) });
  $('#id_sc_field_situacion_iva' + iSeqRow).bind('blur', function() { sc_form_clientes_situacion_iva_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clientes_situacion_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_ing_bruto' + iSeqRow).bind('blur', function() { sc_form_clientes_ing_bruto_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clientes_ing_bruto_onfocus(this, iSeqRow) });
  $('#id_sc_field_inicio_actividad' + iSeqRow).bind('blur', function() { sc_form_clientes_inicio_actividad_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_clientes_inicio_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_cpa' + iSeqRow).bind('blur', function() { sc_form_clientes_cpa_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_clientes_cpa_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto' + iSeqRow).bind('blur', function() { sc_form_clientes_contacto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_clientes_contacto_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldo' + iSeqRow).bind('blur', function() { sc_form_clientes_saldo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_clientes_saldo_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_clientes_activo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_clientes_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_clientes_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clientes_observaciones_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_clientes_cuit_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_cuit();
  scCssBlur(oThis);
}

function sc_form_clientes_cuit_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_razon_social_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_razon_social();
  scCssBlur(oThis);
}

function sc_form_clientes_razon_social_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_titular_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_titular();
  scCssBlur(oThis);
}

function sc_form_clientes_titular_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_domicilio_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_domicilio();
  scCssBlur(oThis);
}

function sc_form_clientes_domicilio_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_codigo_postal_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_codigo_postal();
  scCssBlur(oThis);
}

function sc_form_clientes_codigo_postal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_localidad_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_localidad();
  scCssBlur(oThis);
}

function sc_form_clientes_localidad_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_provincia();
  scCssBlur(oThis);
}

function sc_form_clientes_provincia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_telefonos_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_telefonos();
  scCssBlur(oThis);
}

function sc_form_clientes_telefonos_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_fax_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_fax();
  scCssBlur(oThis);
}

function sc_form_clientes_fax_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_e_mail_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_e_mail();
  scCssBlur(oThis);
}

function sc_form_clientes_e_mail_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_situacion_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_situacion_iva();
  scCssBlur(oThis);
}

function sc_form_clientes_situacion_iva_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_ing_bruto_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_ing_bruto();
  scCssBlur(oThis);
}

function sc_form_clientes_ing_bruto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_inicio_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_inicio_actividad();
  scCssBlur(oThis);
}

function sc_form_clientes_inicio_actividad_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_cpa_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_cpa();
  scCssBlur(oThis);
}

function sc_form_clientes_cpa_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_contacto_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_contacto();
  scCssBlur(oThis);
}

function sc_form_clientes_contacto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_saldo_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_saldo();
  scCssBlur(oThis);
}

function sc_form_clientes_saldo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_activo();
  scCssBlur(oThis);
}

function sc_form_clientes_activo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clientes_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_clientes_observaciones_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

