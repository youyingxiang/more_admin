<?php

namespace Agent\Extensions\Nav;


class Links
{
    public function __toString()
    {
        return <<<HTML
<li>
    <a href="/">
        <i class="fa fa-play-circle-o"></i> 当前活动：<span class="text-green">''</span>（点击切换活动）
    </a>
</li>
HTML;
    }
}
