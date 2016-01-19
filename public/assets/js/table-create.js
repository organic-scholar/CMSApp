(function(){

	var fieldIndex = 0

	function getFieldHTML(){
		return `
			<div class="form-group">
	        	<label class="control-label col-sm-2">Field Name</label>
	          	<div class="col-sm-4">
	           		<input placeholder="Field Name" name="fields[${fieldIndex}][name]" type="text" class="form-control">
	          	</div>
	          	<label class="control-label col-sm-1">Field Type</label>
	          	<div class="col-sm-4">
	                <select name="fields[${fieldIndex}][type]" class="form-control">
	                  <option value="string">String</option>
	                  <option value="text">Text</option>
	                  <option value="number">Number</option>
	                </select>
	          	</div>
	      	</div>
		`;
	}
	function addField(e){
		e.preventDefault();
		fieldIndex = fieldIndex + 1;
		$(getFieldHTML()).appendTo($('form#create-table .box-body'))
	}
	$(document).ready(function(e){
		$('#add-table-field').on('click', addField);
	});
}());