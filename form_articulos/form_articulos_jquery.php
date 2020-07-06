
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
  $('#id_sc_field_codigo_barra' + iSeqRow).bind('blur', function() { sc_form_articulos_codigo_barra_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_articulos_codigo_barra_onfocus(this, iSeqRow) });
  $('#id_sc_field_rubro_id' + iSeqRow).bind('blur', function() { sc_form_articulos_rubro_id_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_articulos_rubro_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_articulos_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_articulos_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad' + iSeqRow).bind('blur', function() { sc_form_articulos_unidad_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_articulos_unidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_costo' + iSeqRow).bind('blur', function() { sc_form_articulos_costo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_articulos_costo_onfocus(this, iSeqRow) });
  $('#id_sc_field_coeficiente_ctdo' + iSeqRow).bind('blur', function() { sc_form_articulos_coeficiente_ctdo_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_articulos_coeficiente_ctdo_onfocus(this, iSeqRow) });
  $('#id_sc_field_iva' + iSeqRow).bind('blur', function() { sc_form_articulos_iva_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_articulos_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio' + iSeqRow).bind('blur', function() { sc_form_articulos_precio_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_articulos_precio_onfocus(this, iSeqRow) });
  $('#id_sc_field_stock' + iSeqRow).bind('blur', function() { sc_form_articulos_stock_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_articulos_stock_onfocus(this, iSeqRow) });
  $('#id_sc_field_stock_minimo' + iSeqRow).bind('blur', function() { sc_form_articulos_stock_minimo_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_articulos_stock_minimo_onfocus(this, iSeqRow) });
  $('#id_sc_field_deposito' + iSeqRow).bind('blur', function() { sc_form_articulos_deposito_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_articulos_deposito_onfocus(this, iSeqRow) });
  $('#id_sc_field_ubicacion' + iSeqRow).bind('blur', function() { sc_form_articulos_ubicacion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_articulos_ubicacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_articulos_activo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_articulos_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_lista_precio' + iSeqRow).bind('blur', function() { sc_form_articulos_lista_precio_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_articulos_lista_precio_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_articulos_codigo_barra_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_codigo_barra();
  scCssBlur(oThis);
}

function sc_form_articulos_codigo_barra_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_rubro_id_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_rubro_id();
  scCssBlur(oThis);
}

function sc_form_articulos_rubro_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_articulos_descripcion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_unidad_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_unidad();
  scCssBlur(oThis);
}

function sc_form_articulos_unidad_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_costo_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_costo();
  scCssBlur(oThis);
  do_ajax_form_articulos_event_costo_onblur();
}

function sc_form_articulos_costo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_coeficiente_ctdo_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_coeficiente_ctdo();
  scCssBlur(oThis);
  do_ajax_form_articulos_event_coeficiente_ctdo_onblur();
}

function sc_form_articulos_coeficiente_ctdo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_iva();
  scCssBlur(oThis);
}

function sc_form_articulos_iva_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_precio_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_precio();
  scCssBlur(oThis);
}

function sc_form_articulos_precio_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_stock_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_stock();
  scCssBlur(oThis);
}

function sc_form_articulos_stock_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_stock_minimo_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_stock_minimo();
  scCssBlur(oThis);
}

function sc_form_articulos_stock_minimo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_deposito_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_deposito();
  scCssBlur(oThis);
}

function sc_form_articulos_deposito_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_ubicacion_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_ubicacion();
  scCssBlur(oThis);
}

function sc_form_articulos_ubicacion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_activo();
  scCssBlur(oThis);
}

function sc_form_articulos_activo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_articulos_lista_precio_onblur(oThis, iSeqRow) {
  do_ajax_form_articulos_validate_lista_precio();
  scCssBlur(oThis);
}

function sc_form_articulos_lista_precio_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_precio" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_precio" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_precio']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

