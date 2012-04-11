<style type="text/css">
        * { margin: 0; padding: 0; }
        #page-wrap { width: 960px; margin: 100px auto; }
        h1 { font: 36px Georgia, Serif; margin: 20px 0; }
        .group:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
        p { margin: 0 0 10px 0; }
        
        .tabs { list-style: none; }
        .tabs li { display: inline; }
        .tabs li a { color: black; float: left; display: block; padding: 4px 10px; margin-left: -1px; position: relative; left: 1px; background: white; text-decoration: none; }
        .tabs li a:hover { background: #ccc; }
        
        
        /* Generic styles & example one */
        
        .tabbed-area { margin: 0 0 120px 0; }
        .box-wrap { position: relative; min-height: 250px; }
        .tabbed-area div div { background: white; padding: 20px; min-height: 250px; position: absolute; top: -1px; left: 0; width: 100%; }
        .tabbed-area div div, .tabs li a { border: 1px solid #ccc; }
        #box-one:target, #box-two:target, #box-three:target { z-index: 1; }
        
        
        
        /* Stuff for example two */
        
        .cur-nav-fix { margin-top: 60px; }
        .cur-nav-fix .tabs { position: absolute; bottom: 100%; left: -1px; }
        .cur-nav-fix .tabs li a { background: -moz-linear-gradient(top, white, #eee); }
        #schedule { z-index: 1; }
        #schedule:target .tabs,
        #search:target .tabs,
        #add:target .tabs { z-index: 3; }
        #schedule:target, #search:target, #add:target { z-index: 2; }
        .cur-nav-fix .tabs li.cur a { border-bottom: 1px solid white; background: white; }
        
        
        /* Stuff for example three */
        
        .cur-nav-fix-2 .tabs li a { background: -moz-linear-gradient(top, white, #eee); }
        .cur-nav-fix-2 .tabs { z-index: 2; position: relative; }
        #box-seven:target .box-seven,
        #box-eight:target .box-eight,
        #box-nine:target .box-nine { z-index: 1; }
        #box-seven:target a[href="#box-seven"],
        #box-eight:target a[href="#box-eight"],
        #box-nine:target a[href="#box-nine"] { border-bottom: 1px solid white; background: white; }
<![endif]-->
</style>
    <!--[if IE]>
    <style type="text/css">
        .box { display: block; }
        #box { overflow: hidden;position: relative; }
        b { position: absolute; top: 0px; right: 0px; width:1px; height: 251px; overflow: hidden; text-indent: -9999px; }
    </style>
    <![endif]-->
<?php
$first_name = $this->session->userdata('first_name');
$euid = $this->session->userdata('euid');
//echo $schedule[4]['name'];
?>

<h3><?php echo "<span style='text-transform:capitalize'>Hello, ".$first_name."!</span>";?></h3>
    		
    		<div class="tabbed-area cur-nav-fix">
        		
                <div class="box-wrap">
                
                	<div id="schedule">
                     <? $this->load->view('registration/schedule'); ?>  
                 		<ul class="tabs group">
							<li class="cur"><a href="#schedule">Schedule</a></li>
							<li><a href="#search">Add</a></li>
							<li><a href="/index.php/users/logout">Logout</a></li>
						</ul>
                	</div>
                	
                	<div id="search">
                	    <? $this->load->view('registration/search'); ?>
                 		<ul class="tabs group">
							<li><a href="#schedule">Schedule</a></li>
							<li class="cur"><a href="#search">Add</a></li>
							<li><a href="/index.php/users/logout">Logout</a></li>
						</ul>
                	</div>
                	
                	<div id="add">
                 		<ul class="tabs group">
							<li><a href="#schedule">Schedule</a></li>
							<li><a href="#search">Add</a></li>
							<li class="cur"><a href="/index.php/users/logout">Logout</a></li>
						</ul>
                	</div>
                
                </div>
    		
    		</div>