<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
<div class="iq-sidebar">
   <div id="sidebar-scrollbar">
      <nav class="iq-sidebar-menu">
         <ul id="iq-sidebar-toggle" class="iq-menu">
            <li <?php if ($uriSegments[1]=='feed') echo 'class="active"' ?> >
               <a href="/feed" class="iq-waves-effect"><i class="las la-newspaper"></i><span>Feed</span></a>
            </li>
            <li <?php if ($uriSegments[1]=='profile') echo 'class="active"' ?> >
               <a href="/profile/{{Auth::id()}}" class="iq-waves-effect"><i class="las la-user"></i><span>Profile</span></a>
            </li>
            <li <?php if ($uriSegments[1]=='find') echo 'class="active"' ?> >
               <a href="/find" class="iq-waves-effect"><i class="las la-user-friends"></i><span>Find People</span></a>
            </li>
         </ul>
      </nav>
      <div class="p-3"></div>
   </div>
</div>