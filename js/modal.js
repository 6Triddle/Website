var userId = '<?php echo $uID ?>';
console.log(userId);
$(document).ready(function(){
$('#editUser'+'<?php echo $uID ?>').modal('show');
});