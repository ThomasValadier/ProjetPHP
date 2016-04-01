   </div>
   <script src="Assets/javascript/vendor/jquery.min.js"></script>
   <script src="Assets/javascript/vendor/bootstrap.min.js"></script>
   <script src="Assets/javascript/vendor/toastr.min.js"></script>
   <script src="Assets/javascript/global.js"></script>
   
   <?php
    queue_js($js); 
   ?>

   <script> 
    <?php
        $mesageStack = $this->session->userdata('ServiceMessage');
        if(isset($mesageStack)){
            foreach ($mesageStack as $notification) {
                echo sprintf("toastr['%s']('%s')", $notification["type"], $notification["message"]);
            }
            $this->session->unset_userdata('ServiceMessage');
        }
   ?>
   </script>
</body>
</html>
