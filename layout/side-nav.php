<?php
$user = null; 
$reports = '';
if(isset($_SESSION['Username'])){
    $user = $_SESSION['Username'];
    $role = $_SESSION['Role'];

    
    if($role == "Technician"){
        $reports = '<li><a href="profile-documents.php">Reports </a></li>';
    }
}
echo 
'
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Mani Menu</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer" style="color: #e0e0e0"></i><span class="hide-menu">Dashboard</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.php">Summary </a></li>
                                <li><a href="profile.php?user='.$user.'">Profile </a></li>
                                <li><a href="email-inbox.php?user='.$user.'">Mail Box </a></li>
                                <li><a href="chat-section.php?user='.$user.'">Chatbot </a></li>
                                '.$reports.'
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-map-marker" style="color: #e0e0e0"></i><span class="hide-menu">Auto Parts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="items.php">All Items</a></li>
                                <li><a href="items-catelog.php?item=Products">Products</a></li>
                                <li><a href="items-catelog.php?item=Supplies">Suppliers</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-level-down" style="color: #e0e0e0"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.1</a></li>
                                <li><a href="#">item 1.2</a></li>
                                
                                <li><a href="#">item 1.4</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
';

?>