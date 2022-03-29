    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/sb-admin-2.js"></script>
    <script src="./js/sweetalert.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
       <?php if($_SESSION["message"]!= ""){ ?>
            swal("<?php echo $_SESSION["message"]; ?>", "", "<?php echo $_SESSION["status"]; ?>");  
            <?php $_SESSION["message"] = "";
       } ?>
    </script>
</body>
</html>