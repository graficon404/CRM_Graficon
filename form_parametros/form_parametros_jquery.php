
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
  $('#id_sc_field_id_parametros' + iSeqRow).bind('blur', function() { sc_form_parametros_id_parametros_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_parametros_id_parametros_onfocus(this, iSeqRow) });
  $('#id_sc_field_razon_social' + iSeqRow).bind('blur', function() { sc_form_parametros_razon_social_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_parametros_razon_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_fantasia' + iSeqRow).bind('blur', function() { sc_form_parametros_nombre_fantasia_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_parametros_nombre_fantasia_onfocus(this, iSeqRow) });
  $('#id_sc_field_domicilio' + iSeqRow).bind('blur', function() { sc_form_parametros_domicilio_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_parametros_domicilio_onfocus(this, iSeqRow) });
  $('#id_sc_field_localidad' + iSeqRow).bind('blur', function() { sc_form_parametros_localidad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_parametros_localidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia' + iSeqRow).bind('blur', function() { sc_form_parametros_provincia_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_parametros_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_form_parametros_telefono_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_parametros_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_e_mail' + iSeqRow).bind('blur', function() { sc_form_parametros_e_mail_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_parametros_e_mail_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_iva_id' + iSeqRow).bind('blur', function() { sc_form_parametros_tipo_iva_id_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_parametros_tipo_iva_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_sucursal' + iSeqRow).bind('blur', function() { sc_form_parametros_sucursal_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_parametros_sucursal_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_dolar' + iSeqRow).bind('blur', function() { sc_form_parametros_valor_dolar_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_parametros_valor_dolar_onfocus(this, iSeqRow) });
  $('#id_sc_field_alicuota_iva_1' + iSeqRow).bind('blur', function() { sc_form_parametros_alicuota_iva_1_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_parametros_alicuota_iva_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_alicuota_iva_2' + iSeqRow).bind('blur', function() { sc_form_parametros_alicuota_iva_2_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_parametros_alicuota_iva_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_copias' + iSeqRow).bind('blur', function() { sc_form_parametros_cantidad_copias_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_parametros_cantidad_copias_onfocus(this, iSeqRow) });
  $('#id_sc_field_control' + iSeqRow).bind('blur', function() { sc_form_parametros_control_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_parametros_control_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_hard' + iSeqRow).bind('blur', function() { sc_form_parametros_id_hard_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_parametros_id_hard_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_parametros_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_parametros_observaciones_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_parametros_id_parametros_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_id_parametros();
  scCssBlur(oThis);
}

function sc_form_parametros_id_parametros_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_razon_social_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_razon_social();
  scCssBlur(oThis);
}

function sc_form_parametros_razon_social_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_nombre_fantasia_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_nombre_fantasia();
  scCssBlur(oThis);
}

function sc_form_parametros_nombre_fantasia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_domicilio_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_domicilio();
  scCssBlur(oThis);
}

function sc_form_parametros_domicilio_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_localidad_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_localidad();
  scCssBlur(oThis);
}

function sc_form_parametros_localidad_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_provincia();
  scCssBlur(oThis);
}

function sc_form_parametros_provincia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_telefono_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_telefono();
  scCssBlur(oThis);
}

function sc_form_parametros_telefono_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_e_mail_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_e_mail();
  scCssBlur(oThis);
}

function sc_form_parametros_e_mail_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_tipo_iva_id_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_tipo_iva_id();
  scCssBlur(oThis);
}

function sc_form_parametros_tipo_iva_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_sucursal_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_sucursal();
  scCssBlur(oThis);
}

function sc_form_parametros_sucursal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_valor_dolar_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_valor_dolar();
  scCssBlur(oThis);
}

function sc_form_parametros_valor_dolar_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_alicuota_iva_1_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_alicuota_iva_1();
  scCssBlur(oThis);
}

function sc_form_parametros_alicuota_iva_1_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_alicuota_iva_2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_alicuota_iva_2();
  scCssBlur(oThis);
}

function sc_form_parametros_alicuota_iva_2_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_cantidad_copias_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_cantidad_copias();
  scCssBlur(oThis);
}

function sc_form_parametros_cantidad_copias_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_control_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_control();
  scCssBlur(oThis);
}

function sc_form_parametros_control_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_id_hard_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_id_hard();
  scCssBlur(oThis);
}

function sc_form_parametros_id_hard_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_parametros_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_parametros_observaciones_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_control" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_control" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['control']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

