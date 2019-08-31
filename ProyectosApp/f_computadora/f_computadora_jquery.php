
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
  scEventControl_data["id_computadora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marca" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memoria_gb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["almacenamiento_gb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_tipocomputadora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_computadora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_computadora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marca" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marca" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memoria_gb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memoria_gb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["almacenamiento_gb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["almacenamiento_gb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipocomputadora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipocomputadora" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_tipocomputadora" + iSeq == fieldName) {
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
  $('#id_sc_field_id_computadora' + iSeqRow).bind('blur', function() { sc_f_computadora_id_computadora_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_f_computadora_id_computadora_onfocus(this, iSeqRow) });
  $('#id_sc_field_marca' + iSeqRow).bind('blur', function() { sc_f_computadora_marca_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_f_computadora_marca_onfocus(this, iSeqRow) });
  $('#id_sc_field_modelo' + iSeqRow).bind('blur', function() { sc_f_computadora_modelo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_f_computadora_modelo_onfocus(this, iSeqRow) });
  $('#id_sc_field_memoria_gb' + iSeqRow).bind('blur', function() { sc_f_computadora_memoria_gb_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_f_computadora_memoria_gb_onfocus(this, iSeqRow) });
  $('#id_sc_field_almacenamiento_gb' + iSeqRow).bind('blur', function() { sc_f_computadora_almacenamiento_gb_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_f_computadora_almacenamiento_gb_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipocomputadora' + iSeqRow).bind('blur', function() { sc_f_computadora_id_tipocomputadora_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_f_computadora_id_tipocomputadora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_f_computadora_id_computadora_onblur(oThis, iSeqRow) {
  do_ajax_f_computadora_validate_id_computadora();
  scCssBlur(oThis);
}

function sc_f_computadora_id_computadora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_computadora_marca_onblur(oThis, iSeqRow) {
  do_ajax_f_computadora_validate_marca();
  scCssBlur(oThis);
}

function sc_f_computadora_marca_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_computadora_modelo_onblur(oThis, iSeqRow) {
  do_ajax_f_computadora_validate_modelo();
  scCssBlur(oThis);
}

function sc_f_computadora_modelo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_computadora_memoria_gb_onblur(oThis, iSeqRow) {
  do_ajax_f_computadora_validate_memoria_gb();
  scCssBlur(oThis);
}

function sc_f_computadora_memoria_gb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_computadora_almacenamiento_gb_onblur(oThis, iSeqRow) {
  do_ajax_f_computadora_validate_almacenamiento_gb();
  scCssBlur(oThis);
}

function sc_f_computadora_almacenamiento_gb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_computadora_id_tipocomputadora_onblur(oThis, iSeqRow) {
  do_ajax_f_computadora_validate_id_tipocomputadora();
  scCssBlur(oThis);
}

function sc_f_computadora_id_tipocomputadora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_computadora", "", status);
	displayChange_field("marca", "", status);
	displayChange_field("modelo", "", status);
	displayChange_field("memoria_gb", "", status);
	displayChange_field("almacenamiento_gb", "", status);
	displayChange_field("id_tipocomputadora", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_computadora(row, status);
	displayChange_field_marca(row, status);
	displayChange_field_modelo(row, status);
	displayChange_field_memoria_gb(row, status);
	displayChange_field_almacenamiento_gb(row, status);
	displayChange_field_id_tipocomputadora(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_computadora" == field) {
		displayChange_field_id_computadora(row, status);
	}
	if ("marca" == field) {
		displayChange_field_marca(row, status);
	}
	if ("modelo" == field) {
		displayChange_field_modelo(row, status);
	}
	if ("memoria_gb" == field) {
		displayChange_field_memoria_gb(row, status);
	}
	if ("almacenamiento_gb" == field) {
		displayChange_field_almacenamiento_gb(row, status);
	}
	if ("id_tipocomputadora" == field) {
		displayChange_field_id_tipocomputadora(row, status);
	}
}

function displayChange_field_id_computadora(row, status) {
}

function displayChange_field_marca(row, status) {
}

function displayChange_field_modelo(row, status) {
}

function displayChange_field_memoria_gb(row, status) {
}

function displayChange_field_almacenamiento_gb(row, status) {
}

function displayChange_field_id_tipocomputadora(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_tipocomputadora__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_tipocomputadora" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_tipocomputadora");
	}
}

function scRecreateSelect2() {
	displayChange_field_id_tipocomputadora("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_f_computadora_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "id_tipocomputadora" == specificField) {
    scJQSelect2Add_id_tipocomputadora(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_tipocomputadora(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_tipocomputadora_obj" : "#id_sc_field_id_tipocomputadora" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_tipocomputadora_obj',
      dropdownCssClass: 'css_id_tipocomputadora_obj',
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
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

