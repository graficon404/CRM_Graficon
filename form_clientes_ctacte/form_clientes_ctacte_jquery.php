
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
  $('#id_sc_field_fecha_' + iSeqRow).bind('blur', function() { sc_form_clientes_ctacte_fecha__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_clientes_ctacte_fecha__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_clientes_ctacte_fecha__onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion_' + iSeqRow).bind('blur', function() { sc_form_clientes_ctacte_descripcion__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_clientes_ctacte_descripcion__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clientes_ctacte_descripcion__onfocus(this, iSeqRow) });
  $('#id_sc_field_importe_' + iSeqRow).bind('blur', function() { sc_form_clientes_ctacte_importe__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_clientes_ctacte_importe__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_clientes_ctacte_importe__onfocus(this, iSeqRow) });
  $('#id_sc_field_comprobante_' + iSeqRow).bind('blur', function() { sc_form_clientes_ctacte_comprobante__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_clientes_ctacte_comprobante__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clientes_ctacte_comprobante__onfocus(this, iSeqRow) });
  $('#id_sc_field_total_' + iSeqRow).bind('blur', function() { sc_form_clientes_ctacte_total__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_clientes_ctacte_total__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_clientes_ctacte_total__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_clientes_ctacte_fecha__onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_ctacte_validate_fecha_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_fecha__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_clientes_ctacte_fecha__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_descripcion__onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_ctacte_validate_descripcion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_descripcion__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_clientes_ctacte_descripcion__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_importe__onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_ctacte_validate_importe_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_importe__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_clientes_ctacte_importe__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_comprobante__onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_ctacte_validate_comprobante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_comprobante__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_clientes_ctacte_comprobante__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_total__onblur(oThis, iSeqRow) {
  do_ajax_form_clientes_ctacte_validate_total_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_clientes_ctacte_total__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_clientes_ctacte_total__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

