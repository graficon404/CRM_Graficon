
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
  $('#id_sc_field_numero_fac' + iSeqRow).bind('blur', function() { sc_form_factura_numero_fac_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_factura_numero_fac_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_factura_fecha_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_factura_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente_id' + iSeqRow).bind('blur', function() { sc_form_factura_cliente_id_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_factura_cliente_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendedor_id' + iSeqRow).bind('blur', function() { sc_form_factura_vendedor_id_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_factura_vendedor_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_forma_pago_id' + iSeqRow).bind('blur', function() { sc_form_factura_forma_pago_id_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_factura_forma_pago_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_condicion_vta_id' + iSeqRow).bind('blur', function() { sc_form_factura_condicion_vta_id_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_factura_condicion_vta_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_remito_nro' + iSeqRow).bind('blur', function() { sc_form_factura_remito_nro_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_factura_remito_nro_onfocus(this, iSeqRow) });
  $('#id_sc_field_pedido_nro' + iSeqRow).bind('blur', function() { sc_form_factura_pedido_nro_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_factura_pedido_nro_onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal' + iSeqRow).bind('blur', function() { sc_form_factura_subtotal_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_factura_subtotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento' + iSeqRow).bind('blur', function() { sc_form_factura_descuento_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_factura_descuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_iva' + iSeqRow).bind('blur', function() { sc_form_factura_iva_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_factura_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_factura_total_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_factura_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_factura_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_factura_observaciones_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_factura_numero_fac_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_numero_fac();
  scCssBlur(oThis);
}

function sc_form_factura_numero_fac_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_factura_fecha_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_cliente_id_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_cliente_id();
  scCssBlur(oThis);
}

function sc_form_factura_cliente_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_vendedor_id_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_vendedor_id();
  scCssBlur(oThis);
}

function sc_form_factura_vendedor_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_forma_pago_id_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_forma_pago_id();
  scCssBlur(oThis);
}

function sc_form_factura_forma_pago_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_condicion_vta_id_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_condicion_vta_id();
  scCssBlur(oThis);
}

function sc_form_factura_condicion_vta_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_remito_nro_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_remito_nro();
  scCssBlur(oThis);
}

function sc_form_factura_remito_nro_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_pedido_nro_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_pedido_nro();
  scCssBlur(oThis);
}

function sc_form_factura_pedido_nro_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_subtotal_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_subtotal();
  scCssBlur(oThis);
}

function sc_form_factura_subtotal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_descuento_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_descuento();
  scCssBlur(oThis);
}

function sc_form_factura_descuento_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_iva();
  scCssBlur(oThis);
}

function sc_form_factura_iva_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_total_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_total();
  scCssBlur(oThis);
}

function sc_form_factura_total_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_factura_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_factura_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_factura_observaciones_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ['<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd']);        ?>'],
    dayNamesMin: ['<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd']); ?>'],
    monthNamesShort: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece']); ?>'],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

