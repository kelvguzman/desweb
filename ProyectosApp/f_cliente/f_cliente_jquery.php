
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
  scEventControl_data["id_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_contacto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo_electronico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_contacto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_contacto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo_electronico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo_electronico" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_id_cliente' + iSeqRow).bind('blur', function() { sc_f_cliente_id_cliente_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_f_cliente_id_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_empresa' + iSeqRow).bind('blur', function() { sc_f_cliente_empresa_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_f_cliente_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_contacto' + iSeqRow).bind('blur', function() { sc_f_cliente_nombre_contacto_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_f_cliente_nombre_contacto_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_f_cliente_telefono_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_f_cliente_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo_electronico' + iSeqRow).bind('blur', function() { sc_f_cliente_correo_electronico_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_f_cliente_correo_electronico_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_f_cliente_id_cliente_onblur(oThis, iSeqRow) {
  do_ajax_f_cliente_validate_id_cliente();
  scCssBlur(oThis);
}

function sc_f_cliente_id_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_cliente_empresa_onblur(oThis, iSeqRow) {
  do_ajax_f_cliente_validate_empresa();
  scCssBlur(oThis);
}

function sc_f_cliente_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_cliente_nombre_contacto_onblur(oThis, iSeqRow) {
  do_ajax_f_cliente_validate_nombre_contacto();
  scCssBlur(oThis);
}

function sc_f_cliente_nombre_contacto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_cliente_telefono_onblur(oThis, iSeqRow) {
  do_ajax_f_cliente_validate_telefono();
  scCssBlur(oThis);
}

function sc_f_cliente_telefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_f_cliente_correo_electronico_onblur(oThis, iSeqRow) {
  do_ajax_f_cliente_validate_correo_electronico();
  scCssBlur(oThis);
}

function sc_f_cliente_correo_electronico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_cliente", "", status);
	displayChange_field("empresa", "", status);
	displayChange_field("nombre_contacto", "", status);
	displayChange_field("telefono", "", status);
	displayChange_field("correo_electronico", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_cliente(row, status);
	displayChange_field_empresa(row, status);
	displayChange_field_nombre_contacto(row, status);
	displayChange_field_telefono(row, status);
	displayChange_field_correo_electronico(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_cliente" == field) {
		displayChange_field_id_cliente(row, status);
	}
	if ("empresa" == field) {
		displayChange_field_empresa(row, status);
	}
	if ("nombre_contacto" == field) {
		displayChange_field_nombre_contacto(row, status);
	}
	if ("telefono" == field) {
		displayChange_field_telefono(row, status);
	}
	if ("correo_electronico" == field) {
		displayChange_field_correo_electronico(row, status);
	}
}

function displayChange_field_id_cliente(row, status) {
}

function displayChange_field_empresa(row, status) {
}

function displayChange_field_nombre_contacto(row, status) {
}

function displayChange_field_telefono(row, status) {
}

function displayChange_field_correo_electronico(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_f_cliente_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(17);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

