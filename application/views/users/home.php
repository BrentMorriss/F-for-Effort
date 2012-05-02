<?php
        $first_name = $this->session->userdata('first_name');
        $euid = $this->session->userdata('euid');
?>
<!-- Title -->
<h3><?php echo "<span style='text-transform:capitalize'>Hello, ".$first_name."!</span>";?></h3>

<!-- Tabs -->
<div class="homeTab" onclick="$('#homeSchedule').show('fast');$('#homeSearch').hide('fast')">
        Schedule
</div>
<div class="homeTab" onclick="$('#homeSchedule').hide('fast');$('#homeSearch').show('fast')">
        Search
</div>
<a href="index.php/users/logout"><div class="homeTab">Logout</div></a>

<!-- Content -->
<div style="clear:both"/>
<div id="homeContentFrame">           
        <div id="homeSchedule" class="homeTabBody">
                <?php $this->load->view('registration/schedule'); ?>
        </div>
        <div id="homeSearch" class="homeTabBody"> 
                <?php $this->load->view('registration/search'); ?>
        </div>
        <script>$('#homeSearch').hide();</script>
</div>