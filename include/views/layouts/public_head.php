<!--Header-part-->
<style>
    .head-box{width: 219px;background: #fff;}
    .head-logo{width: 125px;margin-left: 40px;}
</style>
<div id="header">
    <div  class = "head-box">
        <img id="logo" width='220px' src="<?php echo FF_STATIC_BASE_URL; ?>/images/com_logo.jpg" class="animated fadeInRight head-logo" />
    </div>
</div>
<!--close-Header-part--> 
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a><i class="icon icon-user"></i><span class="text">&nbsp;<?php echo $this->user->name; ?>，你好</span></a></li>
    <li class=""><a href=""><i class="icon icon-time"></i>&nbsp;<span class="text" id="Timer"></span></a>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search" class="navbar navbar-inverse">
	<ul class="nav">
     <a title="" href="<?php echo FF_DOMAIN.'/login/logout';?>"><i class="icon icon-share-alt"></i> <span class="text">[退出系统]</span></a>
    </ul>
</div>
<!--close-top-serch-->
<script type="text/javascript">
$('#logo').addClass('animated fadeInRight ');
</script>


