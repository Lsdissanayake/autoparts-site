<?php

echo 
'
<div role="toolbar" class="">
<div class="btn-group">
    <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-archive font-18 vertical-middle"></i></button>
    <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-alert-octagon font-18 vertical-middle"></i></button>
    <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-delete-variant font-18 vertical-middle"></i></button>
</div>
<div class="btn-group">
    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                        <i class="mdi mdi-folder font-18 vertical-middle"></i>
                                        <b class="caret m-l-5"></b>
                                    </button>
    <div class="dropdown-menu">
        <span class="dropdown-header">Move to</span>
        <a href="javascript: void(0);" class="dropdown-item">Social</a>
        <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
        <a href="javascript: void(0);" class="dropdown-item">Updates</a>
        <a href="javascript: void(0);" class="dropdown-item">Forums</a>
    </div>
</div>
<div class="btn-group">
    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                        <i class="mdi mdi-label font-18 vertical-middle"></i>
                                        <b class="caret m-l-5"></b>
                                    </button>
    <div class="dropdown-menu">
        <span class="dropdown-header">Label as:</span>
        <a href="javascript: void(0);" class="dropdown-item">Updates</a>
        <a href="javascript: void(0);" class="dropdown-item">Social</a>
        <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
        <a href="javascript: void(0);" class="dropdown-item">Forums</a>
    </div>
</div>

<div class="btn-group">
    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                        More
                                        <span class="caret m-l-5"></span>
                                    </button>
    <div class="dropdown-menu">
        <span class="dropdown-header">More Option :</span>
        <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a>
        <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
        <a href="javascript: void(0);" class="dropdown-item">Add Star</a>
        <a href="javascript: void(0);" class="dropdown-item">Mute</a>
    </div>
</div>
</div>

'

?>