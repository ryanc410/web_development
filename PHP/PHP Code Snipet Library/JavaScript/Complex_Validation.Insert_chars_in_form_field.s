<script language="javascript">
function testit(pass) {
	var valid = "1234567890:"
	var k = "y";
	var temp;
	for (var i=0; i<pass.value.length; i++) {
		temp = "" + pass.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") {
			k = "n";
		}
	}
	if (k == "n") {
		alert("Only numerical or : chars in this field please!");
		pass.focus();
		pass.select();
	}

	if(pass.value.length == 2) {
		pass.value = pass.value + ":";
		pass.focus();
	}
	if(pass.value.length == 4) {
		if(pass.value.substring(3,4) == ":") {
			pass.value = pass.value.substring(0,3);
			pass.focus();
		}
	}
}
</script>

-- usage --

<input type="text" name="test" onkeyup="testit(this);">