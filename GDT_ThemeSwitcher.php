<?php
namespace GDO\ThemeSwitcher;

use GDO\Core\GDT;
use GDO\Core\GDT_Template;

final class GDT_ThemeSwitcher extends GDT
{
    public function renderCell()
    {
        return GDT_Template::php('ThemeSwitcher', 'cell/theme_switcher.php', ['field' => $this]);
    }
    
}
