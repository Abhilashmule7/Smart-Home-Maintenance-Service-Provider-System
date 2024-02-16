<?php
session_start();
//include('include/config.php');
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="../index.php";
</script>
