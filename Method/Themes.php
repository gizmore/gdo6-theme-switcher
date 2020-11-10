<?php
namespace GDO\ThemeSwitcher\Method;

use GDO\Table\MethodQueryList;
use GDO\ThemeSwitcher\GDO_Theme;
use GDO\ThemeSwitcher\Module_ThemeSwitcher;
use GDO\Core\MethodAdmin;

final class Themes extends MethodQueryList
{
    use MethodAdmin;
    
    public function beforeExecute()
    {
        $this->renderNavBar();
        Module_ThemeSwitcher::instance()->renderAdminTabs();
    }
    
    public function gdoTable()
    {
        return GDO_Theme::table();
    }
    
}
