
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_proyecto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_proyecto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tiempo_estimado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_responsable" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_categoria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_creacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_proyecto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_proyecto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_proyecto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_proyecto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tiempo_estimado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tiempo_estimado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_responsable" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_responsable" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_categoria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_categoria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_creacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_creacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cliente" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_responsable" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_categoria" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_proyecto' + iSeqRow).bind('blur', function() { sc_f_proyecto_id_proyecto_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_f_proyecto_id_proyecto_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_proyecto' + iSeqRow).bind('blur', function() { sc_f_proyecto_nombre_proyecto_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_f_proyecto_nombre_proyecto_onfocus(this, iSeqRow) });
  $('#id_sc_field_tiempo_estimado' + iSeqRow).bind('blur', function() { sc_f_proyecto_tiempo_estimado_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_f_proyecto_tiempo_estimado_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_responsable' + iSeqRow).bind('blur', function() { sc_f_proyecto_id_responsable_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_f_proyecto_id_responsable_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_categoria' + iSeqRow).bind('blur', function() { sc_f_proyecto_id_categoria_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_f_proyecto_id_categoria_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_creacion' + iSeqRow).bind('blur', function() { sc_f_proyecto_fecha_creacion_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_f_proyecto_fecha_creacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_creacion_hora' + iSeqRow).bind('blur', function() { sc_f_proyecto_fecha_creacion_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_f_proyecto_fecha_creacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_cliente' + iSeqRow).bind('blur', function() { sc_f_proyecto_id_cliente_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_f_proyecto_id_cliente_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_f_proyecto_id_proyecto_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_id_proyecto();
  scCssBlur(oThis);
}

function sc_f_proyecto_id_proyecto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_proyecto_nombre_proyecto_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_nombre_proyecto();
  scCssBlur(oThis);
}

function sc_f_proyecto_nombre_proyecto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_proyecto_tiempo_estimado_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_tiempo_estimado();
  scCssBlur(oThis);
}

function sc_f_proyecto_tiempo_estimado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_proyecto_id_responsable_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_id_responsable();
  scCssBlur(oThis);
}

function sc_f_proyecto_id_responsable_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_proyecto_id_categoria_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_id_categoria();
  scCssBlur(oThis);
}

function sc_f_proyecto_id_categoria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_proyecto_fecha_creacion_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_fecha_creacion();
  scCssBlur(oThis);
}

function sc_f_proyecto_fecha_creacion_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_fecha_creacion();
  scCssBlur(oThis);
}

function sc_f_proyecto_fecha_creacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_proyecto_fecha_creacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_proyecto_id_cliente_onblur(oThis, iSeqRow) {
  do_ajax_f_proyecto_mob_validate_id_cliente();
  scCssBlur(oThis);
}

function sc_f_proyecto_id_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_proyecto", "", status);
	displayChange_field("nombre_proyecto", "", status);
	displayChange_field("tiempo_estimado", "", status);
	displayChange_field("id_responsable", "", status);
	displayChange_field("id_categoria", "", status);
	displayChange_field("fecha_creacion", "", status);
	displayChange_field("id_cliente", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_proyecto(row, status);
	displayChange_field_nombre_proyecto(row, status);
	displayChange_field_tiempo_estimado(row, status);
	displayChange_field_id_responsable(row, status);
	displayChange_field_id_categoria(row, status);
	displayChange_field_fecha_creacion(row, status);
	displayChange_field_id_cliente(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_proyecto" == field) {
		displayChange_field_id_proyecto(row, status);
	}
	if ("nombre_proyecto" == field) {
		displayChange_field_nombre_proyecto(row, status);
	}
	if ("tiempo_estimado" == field) {
		displayChange_field_tiempo_estimado(row, status);
	}
	if ("id_responsable" == field) {
		displayChange_field_id_responsable(row, status);
	}
	if ("id_categoria" == field) {
		displayChange_field_id_categoria(row, status);
	}
	if ("fecha_creacion" == field) {
		displayChange_field_fecha_creacion(row, status);
	}
	if ("id_cliente" == field) {
		displayChange_field_id_cliente(row, status);
	}
}

function displayChange_field_id_proyecto(row, status) {
}

function displayChange_field_nombre_proyecto(row, status) {
}

function displayChange_field_tiempo_estimado(row, status) {
}

function displayChange_field_id_responsable(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_responsable__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_responsable" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_responsable");
	}
}

function displayChange_field_id_categoria(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_categoria__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_categoria" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_categoria");
	}
}

function displayChange_field_fecha_creacion(row, status) {
}

function displayChange_field_id_cliente(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_cliente__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_cliente" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_cliente");
	}
}

function scRecreateSelect2() {
	displayChange_field_id_responsable("all", "on");
	displayChange_field_id_categoria("all", "on");
	displayChange_field_id_cliente("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_f_proyecto_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_creacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_creacion" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_creacion']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_creacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_f_proyecto_mob_validate_fecha_creacion(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_creacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon = $this->jqueryIconFile('calendar');
$miniCalendarFA   = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "id_responsable" == specificField) {
    scJQSelect2Add_id_responsable(seqRow);
  }
  if (null == specificField || "id_categoria" == specificField) {
    scJQSelect2Add_id_categoria(seqRow);
  }
  if (null == specificField || "id_cliente" == specificField) {
    scJQSelect2Add_id_cliente(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_responsable(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_responsable_obj" : "#id_sc_field_id_responsable" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_responsable_obj',
      dropdownCssClass: 'css_id_responsable_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_categoria(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_categoria_obj" : "#id_sc_field_id_categoria" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_categoria_obj',
      dropdownCssClass: 'css_id_categoria_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_cliente(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_cliente_obj" : "#id_sc_field_id_cliente" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_cliente_obj',
      dropdownCssClass: 'css_id_cliente_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
