
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
  $('#id_sc_field_id_caja' + iSeqRow).bind('blur', function() { sc_form_caja_id_caja_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_caja_id_caja_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_caja_fecha_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_caja_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_hora' + iSeqRow).bind('blur', function() { sc_form_caja_fecha_hora_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_caja_fecha_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_operacion' + iSeqRow).bind('blur', function() { sc_form_caja_operacion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_caja_operacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle' + iSeqRow).bind('blur', function() { sc_form_caja_detalle_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_caja_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendedor_id' + iSeqRow).bind('blur', function() { sc_form_caja_vendedor_id_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_caja_vendedor_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_importe' + iSeqRow).bind('blur', function() { sc_form_caja_importe_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_caja_importe_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_caja_id_caja_onblur(oThis, iSeqRow) {
  do_ajax_form_caja_validate_id_caja();
  scCssBlur(oThis);
}

function sc_form_caja_id_caja_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_caja_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_caja_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_caja_fecha_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_caja_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_caja_fecha_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_caja_fecha_hora_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_caja_operacion_onblur(oThis, iSeqRow) {
  do_ajax_form_caja_validate_operacion();
  scCssBlur(oThis);
}

function sc_form_caja_operacion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_caja_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_caja_validate_detalle();
  scCssBlur(oThis);
}

function sc_form_caja_detalle_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_caja_vendedor_id_onblur(oThis, iSeqRow) {
  do_ajax_form_caja_validate_vendedor_id();
  scCssBlur(oThis);
}

function sc_form_caja_vendedor_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_caja_importe_onblur(oThis, iSeqRow) {
  do_ajax_form_caja_validate_importe();
  scCssBlur(oThis);
}

function sc_form_caja_importe_onfocus(oThis, iSeqRow) {
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

