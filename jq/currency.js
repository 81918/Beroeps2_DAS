$(function() {
	$("#currency").maskMoney({
		prefix:'€ ',
		formatOnBlur: false,
		allowZero:false,
		allowNegative:false,allowEmpty: true,
		doubleClickSelection: true,
		selectAllOnFocus: false,
		decimal: ',' ,
		precision: 2,
		affixesStay : false,
		bringCaretAtEndOnFocus: true
	});
  });