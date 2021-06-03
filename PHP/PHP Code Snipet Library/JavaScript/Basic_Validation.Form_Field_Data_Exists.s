<script language="javascript">
function checkform() {
 var field1 = document.forms[0].fields[0].value;
 if(field1 == "") { 
    alert("Please complete field1.");
    return false;
  }
}
</script>

-- usage --
<input type="text" name="field">
<input type="submit" value="submit" OnClick="return:checkform();">