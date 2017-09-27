<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />
<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
<TABLE id="dataTable" border="1">
    <tr>
        <th>
            <INPUT type="checkbox" onchange="checkAll(this)" name="chk[]" />
        </th>
        <th>Make</th>
        <th>Model</th>
        <th>Description</th>
        <th>Start Year</th>
        <th>End Year</th>
    </tr>
</TABLE>
<script>
 function addRow(tableID) {

     var table = document.getElementById(tableID);

     var rowCount = table.rows.length;
     var row = table.insertRow(rowCount);

     var cell1 = row.insertCell(0);
     var element1 = document.createElement("input");
     element1.type = "checkbox";
     element1.name = "chkbox[]";
     cell1.appendChild(element1);

     var cell2 = row.insertCell(1);
     cell2.innerHTML = rowCount;

     var cell3 = row.insertCell(2);
     cell3.innerHTML = rowCount;

     var cell4 = row.insertCell(3);
     cell4.innerHTML = rowCount;

     var cell5 = row.insertCell(4);
     cell5.innerHTML = rowCount;

     var cell6 = row.insertCell(5);
     cell6.innerHTML = rowCount;
 }

 function deleteRow(tableID) {
     try {
         var table = document.getElementById(tableID);
         var rowCount = table.rows.length;

         for (var i = 1; i < rowCount; i++) {
             var row = table.rows[i];
             var chkbox = row.cells[0].childNodes[0];
             if (null != chkbox && true == chkbox.checked) {
                 table.deleteRow(i);
                 rowCount--;
                 i--;
             }
         }
     } catch (e) {
         alert(e);
     }
 }

 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
</script>


<?php
class baddie{
 public  $power=80;
 public function addPower(){
  $this->power = 90;

 }

}
$gannon = new baddie;
$scalders = new baddie;
$gannon-> addPower();
?>